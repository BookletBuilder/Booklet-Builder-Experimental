<?php 

  $instructions = !empty($variables['data']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
      ))
    : '';
  
  $node = $variables['data']['node'];
  
  $word = $node->field_word['und'][0]['value'];
  $translation = $node->field_translation['und'][0]['value'];

?>

\par \noindent
\textbf{<?php echo $word ?>} - <?php echo $translation ?>

<?php echo $instructions ?>
