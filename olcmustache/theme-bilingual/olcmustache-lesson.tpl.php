<?php 

  $node = $variables['data']['node'];

  $lesson = _olctex_html2tex(
    $node->body['und'][0]['safe_value']
  );
  
  $picture_file = isset($node->field_picture['und'][0])
    ? $node->field_picture['und'][0]
    : array();
  
  
?>

\subsection {Lesson}

<?php if (!empty($picture_file)): ?>
<?php echo theme('olctex_picture', array('data' => array(
  'file' => $picture_file,
  'style_name' => 'thumbnail',
))) ?>
<?php endif; ?>

\paragraph {}
<?php echo $lesson ?>
