<?php 

  $instructions = !empty($variables['data']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
      ))
    : '';

  $node = $variables['data']['node'];
  
  $title = _olctex_html2tex(
    $node->title
  );
  $body = _olctex_html2tex(
    $node->body['und'][0]['safe_value']
  );

?>

\subsection {<?php echo $title ?>}

<?php echo $instructions ?>

\paragraph {}
<?php echo $body ?>
