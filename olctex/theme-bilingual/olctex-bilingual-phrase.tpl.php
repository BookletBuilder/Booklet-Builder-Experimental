<?php $node = $variables['data']['node']; ?>
<?php
  $phrase = isset($node->field_phrase['und'][0]['safe_value']) ? $node->field_phrase['und'][0]['safe_value'] : '';
  $translation = isset($node->field_translation['und'][0]['safe_value']) ? $node->field_translation['und'][0]['safe_value'] : '';
?>
\textbf{<?php echo $phrase ?>} : <?php echo $translation ?>


<?php 
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
?>


<?php
  $instructions = !empty($variables['data']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
      ))
    : '';
?>
<?php echo $instructions ?>
