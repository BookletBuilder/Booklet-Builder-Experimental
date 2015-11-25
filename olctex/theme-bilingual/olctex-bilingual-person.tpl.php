<?php

  $node = $variables['data']['node'];

  echo '{\setlength{\parskip}{0pt}';

  if ($node->field_first_name['und'][0]['value']) {
    echo '\textbf{',$node->field_first_name['und'][0]['value'],'}';
    echo PHP_EOL . PHP_EOL;
  }
  else {
  }
  
  if ($node->field_first_name_translation['und'][0]['value']) {
    echo '\textit{',$node->field_first_name_translation['und'][0]['value'],'}';
    echo PHP_EOL . PHP_EOL;
  }
  else {
  }
  
  if ($node->field_last_name['und'][0]['value']) {
    echo '\textbf{',$node->field_last_name['und'][0]['value'],'}';
    echo PHP_EOL . PHP_EOL;
  }
  else {
  }
  
  if ($node->field_last_name_translation['und'][0]['value']) {
    echo '\textit{',$node->field_last_name_translation['und'][0]['value'],'}';
  }
  else {
  }
  
  echo '}';
  echo PHP_EOL . PHP_EOL;

  $picture_file = isset($node->field_picture['und'][0])
    ? $node->field_picture['und'][0]
    : array();
  if (!empty($picture_file)) {
    echo theme('olctex_picture', array('data' => array(
        'file' => $picture_file,
        'style_name' => 'thumbnail',
    )));
  }
  else {
  }
    
  if ($node->body['und'][0]['value']) {
    echo _olctex_html2tex($node->body['und'][0]['value']);
  }
  else {
  }

  echo PHP_EOL . PHP_EOL;
  
  if ($node->field_body_translation['und'][0]['value']) {
    echo _olctex_html2tex($node->field_body_translation['und'][0]['value']);
  }
  else {
  }

  echo PHP_EOL . PHP_EOL;
    
  $instructions = !empty($variables['data']['instructions'])
  ? theme('olctex_container', array('data' =>
      _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
  ))
  : '';
  
  echo $instructions;
