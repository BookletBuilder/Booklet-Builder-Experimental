<?php $node = $variables['data']; ?>

<?php 
  $instruction = _olctex_html2tex($node->field_instruction['und'][0]['safe_value']);
?>
<?php echo $instruction ?>
