<?php $node = $variables['data']['node']; ?>
{\setlength{\parskip}{0pt}
<?php  
  $conjugation = isset($node->field_conjugation['und'][0]['value']) 
    ? $node->field_conjugation['und'][0]['value']
    : '';
  $translation = isset($node->field_translation['und'][0]['value']) 
    ? $node->field_translation['und'][0]['value']
    : '';
?>
\textbf{<?php echo $conjugation ?>} : <?php echo $translation ?>


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
}

<?php echo $instructions ?>
