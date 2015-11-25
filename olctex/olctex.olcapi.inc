<?php

function _olcapi_xetex ($node) {
  
  // Get section data from the api
  module_load_include('inc', 'olcapi', 'olcapi');
  $section_api_data = _olcapi_section($node);

  // Prepare section's TeX content
  $section_tex = theme('olctex_bilingual_section', array(
      'data' => $section_api_data
  ));

  // Prepare TeX document
  $result_tex_doc =  theme('olctex_document', array(
      'data' => array($section_tex)
  ));

  // Return TeX document
  return $result_tex_doc;
  
}
