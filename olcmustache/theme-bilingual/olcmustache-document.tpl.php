<?php

  $id = isset($id) ? $id : '';
  $classes = isset($classes) ? $classes : '';

?>

<div id="<?php echo $id ?>" class="<?php echo $classes ?>" >
  <?php echo theme('olcmustache_bilingual_section') ?>
</div>

