<?php 

  // NOTE: Instructions UNAVAILABLE on a per-root-word basis
  $root = $variables['data']['parent'];
  $root_node = $root['node'];
  
  $root_word = $root_node->field_word['und'][0]['value'];
  $root_translation = $root_node->field_translation['und'][0]['value'];
  
  $conjugations = $variables['data']['children']; 
  $conjugations_themed = theme('olctex_container', array('data' => 
    _olctex_theme_multiple('olctex_bilingual_conjugation', $conjugations) 
  ));
  

?>

\subsubsection{<?php echo $root_word ?> - <?php echo $root_translation; ?>}

<?php foreach ($conjugations as $conjugation): ?>
<?php echo theme('olctex_bilingual_conjugation', array('data' => $conjugation)) ?>
<?php endforeach ?>
