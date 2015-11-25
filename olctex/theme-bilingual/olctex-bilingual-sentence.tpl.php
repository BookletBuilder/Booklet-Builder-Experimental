<?php

  $node = $variables['data']['node'];
  
  if ($node->field_sentence['und'][0]['safe_value']) {
    echo '\textbf{',$node->field_sentence['und'][0]['safe_value'],'}';
    echo PHP_EOL . PHP_EOL;
  }
  else {
  }
  
  if ($node->field_translation['und'][0]['safe_value']){
    echo '{\setlength{\parskip}{0pt}';
    echo '\textit{',$node->field_translation['und'][0]['safe_value'],'}';
    echo '}';
    echo PHP_EOL . PHP_EOL;
  }
  else {
  }

  $picture_file = isset($node->field_picture['und'][0])
    ? $node->field_picture['und'][0]
    : array();
  if (!empty($picture_file)) {
    echo theme('olctex_picture', array('data' => array(
        'file' => $picture_file,
        'style_name' => 'thumbnail',
    )));
    echo PHP_EOL . PHP_EOL;
  }
  else {
  }
  
  $instructions = !empty($variables['data']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
      ))
    : '';
  if ($instructions) {
    echo $instructions;
    echo PHP_EOL . PHP_EOL;
  }
  else {
  }
  