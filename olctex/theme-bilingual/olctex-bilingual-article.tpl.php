<?php $node = $variables['data']['node']; ?>
\textbf{<?php echo $node->title ?>}

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


<?php 
  $body = _olctex_html2tex(
      $node->body['und'][0]['safe_value']
  );
?>
<?php echo $body ?>
\bigskip
