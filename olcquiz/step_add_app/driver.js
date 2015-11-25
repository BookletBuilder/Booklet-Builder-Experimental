
jQuery(document).ready(function($){

  // Starting at the rendered booklet
  var docSelector = '.olcquiz-step-add-app-document-rendered';
  $(docSelector).bind('olcmustache-document-ready', function(event){

    // Add a menu
    $('.booklet-part .heading').after($('<div class="menu">'));

    // Process javascript hook callbacks
    var quizAppHooks = Drupal.settings.quizAppHooks;
    for (appIdx in quizAppHooks) {
      var app = quizAppHooks[appIdx];
      app.machineName = appIdx;
      var appCallback = app.step_add_app.js_callback;
      window[appCallback](app);
    }

  });

});

