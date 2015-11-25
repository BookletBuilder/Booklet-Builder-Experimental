<?php 
  $subject = $variables['dependency']['subject']['nid'];
  $label = $variables['dependency']['subject']['label'];
  $requirement = isset($variables['dependency']['requirement']) 
    ? $variables['dependency']['requirement']
    : NULL;
?>
<?php echo $subject ?> [
  label="<?php echo $label?>", 
  width=5, height=2, 
  fontname="Aboriginal Sans"
];
<?php if(!empty($requirement)): ?>
  <?php echo $requirement ?> -> <?php echo $subject ?>;
<?php else: ?>
  <?php echo $subject ?>;
<?php endif; ?>
