function OLCQuizLW_onCheckRequirements_init (arg) {

  /**
   * Check requirements based on respective booklet part
   * 
   * arg.selector
   * args.app
   * arg.pathArg.bookletNID
   * arg.pathArg.bookletPartName
   * arg.pathArg.quizNID
   * arg.pathArg.appMachineName
   * arg.apiURL
   */

  // Retrieve booklet
  var bookletURL = arg.apiURL + '/section/' + arg.pathArg.bookletNID;
  jQuery.getJSON(bookletURL, {}, function(response, status, request){
  
    var booklet = response.data;
    
    // Generate content
    var partsTemplate = arg.app.step_check_requirements.js_mustache.requirements_table;
    var partsData = {
      part: booklet.section_parts[arg.pathArg.bookletPartName],
      missing: {
        url: arg.app.step_check_requirements.missing_url
      }
    };
    var content = Mustache.render(partsTemplate, partsData);
    jQuery(arg.selector).html(content);
    
  });

}
