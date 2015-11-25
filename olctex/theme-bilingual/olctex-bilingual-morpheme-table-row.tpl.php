<?php
  
  $instructions = !empty($variables['data']['instructions']) 
    ? theme('olctex_container', array('data' => 
        _olctex_theme_multiple('olctex_instruction', $variables['data']['instructions'])
      ))
    : '';

  $node = $variables['data']['node'];
  
  $morpheme = !empty($node->field_morpheme)
    ? _olctex_html2tex($node->field_morpheme['und'][0]['value'])
    : '';

  $example_word = !empty($node->field_word)
    ? _olctex_html2tex($node->field_word['und'][0]['value'])
    : '';
    
  $example_word_translation = !empty($node->field_translation)
    ? _olctex_html2tex($node->field_translation['und'][0]['value'])
    : '';

  $description_in_language_studied = !empty($node->field_morpheme_desc_lang_studied)
    ? _olctex_html2tex($node->field_morpheme_desc_lang_studied['und'][0]['value'])
    : '';
    
  $description = !empty($node->field_morpheme_description)
    ? _olctex_html2tex($node->field_morpheme_description['und'][0]['value'])
    : '';

?>

<?php if(!empty($morpheme)): ?>
<?php echo $morpheme ?>
<?php endif ?>
 & <?php if(!empty($example_word)): ?>
<?php echo $example_word ?>
<?php endif ?>
 & <?php if(!empty($example_word_translation)): ?>
<?php echo $example_word_translation ?>
<?php endif ?>
 & <?php if(!empty($description_in_language_studied)): ?>
<?php echo $description_in_language_studied ?>
<?php endif ?>
 & <?php if(!empty($description)): ?>
<?php echo $description ?>
<?php endif ?>
 \\ \hline
