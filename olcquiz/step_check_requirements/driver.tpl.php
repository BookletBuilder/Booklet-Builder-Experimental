<?php

  $selector = 'step-check-requirements';

  // Retrieve hook information
  $quiz_app_machine_name = arg(3);
  $hooks = module_invoke_all('olcquiz_apps');
  $hook = $hooks[$quiz_app_machine_name];

  // Load JS file
  if (isset($hook['step_check_requirements']['js_file'])) {
    drupal_add_js($hook['step_check_requirements']['js_file']);
  }

  // Load Mustache library if required
  if (isset($hook['step_check_requirements']['js_mustache'])) {
    mustache_js_load();
  }

  // Load JS context information
  drupal_add_js(array('selector' => $selector), 'setting');
  drupal_add_js(array('quizAppHook' => $hook), 'setting');  
  drupal_add_js(array('arg' => arg()), 'setting');
  drupal_add_js(array('apiURL' => $GLOBALS['base_url'].'/api'), 'setting');

  $booklet_nid = arg(1);
  $booklet_group = og_get_group_ids('node', array($booklet_nid));
  $add_quiz_app_link = l('Continue', 'node/add/quiz-app/'.arg(1).'/'.arg(2).'/'.arg(3).'/'.arg(4), array(
    'query' => array(
      'gids_group' => array_values($booklet_group),
    )
  ));

?>
<script type="text/javascript">
  jQuery(document).ready(function($){
  
    // Run JS callback
    var callback = Drupal.settings.quizAppHook.step_check_requirements.js_callback;
    window[callback]({
      selector: '#'+Drupal.settings.selector,
      app: Drupal.settings.quizAppHook,
      pathArg: {
        bookletNID: Drupal.settings.arg[1],
        bookletPartName: Drupal.settings.arg[4],
        quizNID: Drupal.settings.arg[2],
        appMachineName: Drupal.settings.arg[3],
      },
      apiURL: Drupal.settings.apiURL
    });
    
  });
</script>
<p>Please check to make sure all the elements are available before continuing.</p>
<div id="<?php echo $selector ?>"><img src="<?php $path = drupal_get_path('module', 'olcquiz'); echo $GLOBALS['base_url'].'/'.$path ?>/media/throbber.gif" /></div>
<?php echo $add_quiz_app_link ?>
