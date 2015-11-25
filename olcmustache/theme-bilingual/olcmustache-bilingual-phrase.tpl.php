<?php

  $instructions = !empty($variables['data']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
      ))
    : '';
    
  $node = $variables['data']['node'];
  
  $phrase = isset($node->field_phrase['und'][0]['safe_value']) ? $node->field_phrase['und'][0]['safe_value'] : '';
  $translation = isset($node->field_translation['und'][0]['safe_value']) ? $node->field_translation['und'][0]['safe_value'] : '';
  
?>

\noindent
\textbf{<?php echo $phrase ?>}

\noindent
<?php echo $translation ?>
<?php echo $instructions ?>
