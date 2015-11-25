<?php

// Load OLC TeX API
module_load_include('inc', 'olctex', 'olctex.olcapi');

function _olcapi_section_pdf($node) {

  // Make sure cache path exists
  $path = drupal_get_path('module', 'olcpdf');
  $cache_path = getcwd().'/'.$path.'/cache';
  file_prepare_directory($cache_path, FILE_CREATE_DIRECTORY || FILE_MODIFY_PERMISSIONS);
  
  // Generate TeX file
  $tex = _olcapi_xetex($node);
  
  // Cache TeX file
  $tex_destination = $cache_path.'/'.$node->nid.'.tex';
  file_put_contents($tex_destination, $tex);
  
  // Provision graphics
  _olcpdf_provision_graphics($tex, $cache_path);
  
  // Remove PDF file if it exists
  $pdf_filepath = $cache_path.'/'.$node->nid.'.pdf';
  if (file_exists($pdf_filepath)) {
    unlink($pdf_filepath);
  }
  else {
    // continue
  }
  
  // Generate PDF file
  $drupal_cwd = getcwd();
  chdir($cache_path);
  $cmd = "xelatex \"$tex_destination\" -output-directory=\"$cache_path\"";
  $result = shell_exec($cmd);
  $result = shell_exec($cmd);
  chdir($drupal_cwd);

  if (file_exists($pdf_filepath)) {
    
    // Return PDF file data
    $content = file_get_contents($pdf_filepath);
    return $content;
    
  }
  else {
    
    // Print error message
    _olcpdf_print_error_log($cache_path.'/'.$node->nid.'.log');
    
  }
  
}

function _olcapi_term_pdf($term) {

  // Create cache path, if it doesn't already exist
  $path = drupal_get_path('module', 'olcpdf');
  $cache_path = getcwd().'/'.$path.'/cache';
  file_prepare_directory($cache_path, FILE_CREATE_DIRECTORY || FILE_MODIFY_PERMISSIONS);

  // Load API (FOR CONSTANT)
  module_load_include('inc', 'olcapi', 'olcapi'); // For CONSTANT
  $io_filepath = $cache_path.'/chapter-'.CHAPTER_TAXONOMY_NAME.'-'.$term->tid;

  // Load chapter tree
  $tree = _olcpdf_get_chapter_tree($term);

  $tex = '';
  $tex .= '\\title{'.$term->name.'}'."\n";
  $tex .= '\\maketitle'."\n";
  // FOR SOME REASON TOC SHOWS UP ONLY AFTER SECOND PAGE LOAD 
  $tex .= '\\renewcommand\\contentsname{}'."\n";
  $tex .= '\\tableofcontents'."\n";
  $tex .= '\\newpage'."\n";
  $tex .= _olcpdf_term_xetex($tree);
  
  // Prepare XeTeX document
  $tex_document = theme('olctex_document', array('data' => array($tex)));
  
  // Save XeTeX document
  file_put_contents($io_filepath.'.tex', $tex_document);
  
  // Provision graphics
  _olcpdf_provision_graphics($tex_document, $cache_path);
  
  // Generate PDF file
  $drupal_cwd = getcwd();
  chdir($cache_path);
  $cmd = "xelatex \"$io_filepath.tex\" -output-directory=\"$cache_path\"";
  $result = shell_exec($cmd);
  $result = shell_exec($cmd);
  chdir($drupal_cwd);
  
  // Return PDF file data
  $content = file_get_contents($io_filepath.'.pdf');
  return $content;
  
}

function _olcpdf_term_xetex($term) {

  // Run through the tree and collect the themed LATEX content
  
  $tex = '';
  
  // CONTENT
  
  if (!empty($term->sections) || !(!isset($term->children) || empty($term->children))) {
    // Prepare term and section xetex
    
    // Load OLC API
    module_load_include('inc', 'olcapi', 'olcapi');

    // Prepare section term
    $tex .= '\\part{'.$term->name.'}'."\n";
    
    foreach ($term->sections as $section) {

      // Load section, theme it, and append to result
      $section = node_load($section);
      $tex .= theme('olctex_bilingual_section', array('data' => _olcapi_section($section)));
      
    }
    
  }
  else {
    
    // No sections, to don't theme the term
    
  }
  
  // RECURSIVE PART
  
  if (!isset($term->children) || empty($term->children)) {
    
    // Basis: Term has no children
    
  }
  else {
    
    // Run through children of term
    foreach ($term->children as $child) {
      
      
      // Append XeTeX from child nodes
      $tex .= _olcpdf_term_xetex($child);
      
    }
    
    
  }
  
  return $tex;
  
}
