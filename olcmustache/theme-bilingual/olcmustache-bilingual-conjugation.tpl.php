<?php 

  $instructions = !empty($variables['data']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
      ))
    : '';

  $node = $variables['data']['node'];
  
  $conjugation = isset($node->field_conjugation['und'][0]['value']) 
    ? $node->field_conjugation['und'][0]['value']
    : '';
  
  $translation = isset($node->field_translation['und'][0]['value']) 
    ? $node->field_translation['und'][0]['value']
    : '';

?>

\noindent
\textbf{<?php echo $conjugation ?>}

\noindent
<?php echo $translation ?>
<?php echo $instructions ?>
