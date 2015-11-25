<?php 
  $dependencies = $variables['dependencies'];
?>
digraph prereqs {
  rankdir="LR";
  charset="UTF-8";
  <?php foreach ($dependencies as $dependency): ?>
    <?php echo theme('olcdep_dependency', array(
      'dependency' => $dependency
    )) ?>
  <?php endforeach ?>
}
