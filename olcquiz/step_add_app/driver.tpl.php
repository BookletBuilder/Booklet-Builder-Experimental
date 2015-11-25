<?php

  // Retrieve hook data via HOOK_olcquiz_apps()
  $hooks = module_invoke_all('olcquiz_apps');

  // For instrospection purposes...
  // Load data from hooks as a JS global variable
  drupal_add_js(array('quizAppHooks' => $hooks), 'setting');
  
  // Load javascript files pointed to in the hook data
  foreach ($hooks as $hook) {
    $js_file = $hook['step_add_app']['js_file'];
    drupal_add_js($js_file);
  }

  // Load driver which runns javascript-based hook callbacks
  $path = drupal_get_path('module', 'olcquiz');
  drupal_add_js($path.'/step_add_app/driver.js');

?>

<!-- Rendered booklet -->
<?php
  dpm($booklet);
  echo theme('olcmustache_document_rendered', array(
    'data' => array(
      'booklet_nid' => $booklet->nid, 
      'booklet_classes' => array('olcquiz-step-add-app-document-rendered')
    )
  ));
?>

