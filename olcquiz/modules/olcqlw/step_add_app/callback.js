function OLCQuizLW_onAddApp_init(app) {
  
  var args = window.location.pathname.split('/');
  args.shift();
  
  jQuery('.booklet-part').each(function(index, element){
  
    var bookletGID = args[1];
    var quizNID = args[2];
    var bookletPart = jQuery(element).attr('id');
    
    if (jQuery.inArray(bookletPart, app['applies to']) > -1) {
		    
      var addAppButton = jQuery('<a>Add "' + app.name + '" section</a>').attr('href', '/olcquiz-step-check-requirements/'+bookletGID+'/'+quizNID+'/'+app.machineName+'/'+bookletPart);
      addAppButton.wrap('<div>');
      
      jQuery(element).find('.menu').append(addAppButton);
    
    }
  
  });
  
}
