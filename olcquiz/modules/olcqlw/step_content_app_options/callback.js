
function OLCQuizLW_onContentAppOptions_init (arg) {

  var appID = 'content-app-options-' + Math.floor(Math.random()*4);
  var appPlaceholder = jQuery('<div><img src="'+arg.app.step_content_app_options.throbber_url+'"/></div>');
  appPlaceholder.attr('id', appID);
  jQuery(arg.quizAppFieldSelector).after(appPlaceholder);

  /**
   * var appData = {
   *   items: [nid, nid, nid, ...]
   * }
   */
  var appData = jQuery.parseJSON(jQuery(arg.quizAppDataSelector).val());
  if (!appData) {
    appData = {items: []};
  }
  else {
    // continue
  }

  // Retrieve booklet
  var bookletURL = Drupal.settings.apiURL + '/section/' + arg.settings.bookletNID;
  jQuery.getJSON(bookletURL, {}, function(response, status, request){

    // Display quiz app form elements
    var partTemplate = arg.app.step_content_app_options.js_mustache.pick_items;
    var partData = {
      part: response.data.section_parts[arg.settings.bookletPart],
      missing: {
        url: arg.app.step_content_app_options.missing_url
      }
    };
    var content = Mustache.render(partTemplate, partData);
    jQuery('#' + appID).html(content);

    // Populate form selections
    if (appData.items) {
      for (itemIndex in appData.items) {
        var nid = appData.items[itemIndex];
        jQuery('#' + appID + ' input[type=checkbox]#' + nid).attr('checked', true);
      }
    }
    else {
      // Nothing to populate
    }

  });

  // Handle clicking of submit button
  jQuery(arg.submitSelector).click(function(event){
   
    //   Save app data to form
    appData.items = [];
    var appFormElementsSelector = '#' + appID + ' input';
    jQuery(appFormElementsSelector).each(function(index, element){
      if (element.checked) {
        appData.items.push(element.id);
      }
      else {
        // skip
      } 
    });
    jQuery(arg.quizAppDataSelector).val(JSON.stringify(appData));

    //   Clear special quiz app form elements 
    jQuery('#' + appID).remove();
    
  });

}

