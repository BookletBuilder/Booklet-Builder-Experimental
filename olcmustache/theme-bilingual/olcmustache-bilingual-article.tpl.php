<?php

  $instructions = !empty($variables['data']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
      ))
    : '';
 
  $node = $variables['data']['node'];
  
  $body = _olctex_html2tex(
    $node->body['und'][0]['safe_value']
  );
  $title = _olctex_html2tex(
    $node->title
  );
  
?>

\subsection {<?php echo $title ?>}

<?php echo $instructions ?>

<?php echo $body ?>
