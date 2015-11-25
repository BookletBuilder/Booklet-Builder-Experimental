jQuery(document).ready(function($){

  var callback = Drupal.settings.quizAppHook.step_content_app_options.js_callback;
  window[callback]({
    app: Drupal.settings.quizAppHook,
    settings: Drupal.settings.quizAppSettings,
    quizAppFieldSelector: '#edit-field-quiz-app-data',
    quizAppDataSelector: '#edit-field-quiz-app-data-und-0-value',
    submitSelector: '#edit-submit'
  });

});

