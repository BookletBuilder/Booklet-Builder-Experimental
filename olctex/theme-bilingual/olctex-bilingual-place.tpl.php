<?php

  $node = $variables['data']['node'];

  echo '{\setlength{\parskip}{0pt}';
  
  if ($node->title) {
    echo '\textbf{',$node->title,'}';
    echo PHP_EOL . PHP_EOL;
  }
  else {
  }
  
  if ($node->field_place_name_translation['und'][0]['value']) {
    echo '\textit{',$node->field_place_name_translation['und'][0]['value'],'}';
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
    echo PHP_EOL . PHP_EOL;
  }
  else {
  }

  $instructions = !empty($variables['data']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
      ))
    : '';
  echo $instructions;
