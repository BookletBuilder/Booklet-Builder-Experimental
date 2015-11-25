<?php 

  $instructions = !empty($variables['data']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
      ))
    : '';

  $node = $variables['data']['node'];
  
  $name = $node->field_name['und'][0]['value'];
  $translation = $node->field_translation['und'][0]['value'];

?>

\noindent
\textbf{<?php echo $name ?>} - <?php echo $translation ?>
<?php echo $instructions ?>
