<?php 

  $instructions = !empty($variables['data']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
      ))
    : '';

  $turn_number = $variables['data']['turn_number'];
  $node = $variables['data']['node'];
  
  $sentence = isset($node->field_sentence['und'][0]['value']) ? $node->field_sentence['und'][0]['value'] : '';
  $translation = isset($node->field_translation['und'][0]['value']) ? $node->field_translation['und'][0]['value'] : '';

?>

\noindent
<?php echo $turn_number ?> 
\textbf{<?php echo $sentence ?>}

\noindent
<?php echo $translation ?>
<?php echo $instructions ?>
