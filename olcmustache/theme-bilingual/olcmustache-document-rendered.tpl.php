<?php 

  // Generate random booklet ID
  $booklet_id = 'olcmustache-document-'.rand();

  // Generate random template ID
  $booklet_template_id = 'olcmustache-document-template-'.rand();

  // Prepare booklet classes
  $booklet_classes = isset($data['booklet_classes']) ? implode(' ', $data['booklet_classes']) : '';

  // Retrieve mustache template
  $booklet_mustache_template = theme('mustache_js_template', array(
    'template' => theme('olcmustache_document', array('data' => $data)),
    'template_id' => $booklet_template_id,
  ));
  
?>

<script type="text/javascript">
  jQuery(document).ready(function($){

    //
    // Show throbber
    //

    // Place booklet ID in javascript variable
    var bookletID = '<?php echo $booklet_id ?>';    

    // Show throbber
    var bookletSelector = '#' + bookletID;
    $(bookletSelector).html($('<img>').attr('src', '/media/throbber.gif'));

    //
    // Get template
    //

    // Place template ID in javascript variable
    var bookletTemplateID = '<?php echo $booklet_template_id ?>';

    // Get mustache template using template ID
    var bookletTemplate = $('#' + bookletTemplateID).html();

    //
    // Render HTML from template
    //

    // Place booklet NID in javascript variable
    var bookletNID = <?php echo $data['booklet_nid'] ?>;

    // Prepare booklet API URL 
    var bookletUrl = 'http://textbook.olc.edu/api/section/' + bookletNID;

    // Retrieve booklet data
    var bookletRequest = $.getJSON(bookletUrl, {}, function(response, status, request){

      //
      // Render the HTML from the data and template
      //

      // Place special indicators in the booklet data
      var bookletData = OLCMustacheZen(response.data);
      
      // Use mustache to render booklet HTML
      var bookletRendered = Mustache.render(bookletTemplate, bookletData);

      // Place booklet HTML on to the page
      $(bookletSelector).html(bookletRendered);

      //
      // Trigger ready message
      //

      $(bookletSelector).trigger('olcmustache-document-ready');
      
    });

    bookletRequest.onerror = function(event){
      alert('Problem loading booklet');
    };
    
  });
  
  function OLCMustacheZen(booklet) {

    //
    // This function places special markers in the booklet data returned by the API
    //
    
    // Make sure _mz variable exists
    if (!booklet.section_parts._mz) {
      booklet.section_parts._mz = {};
    }
    else {
      // No need to add it
    }
    
    var sectionTypeKeys = [
      'lesson', 
      'article',
      'narrative',
      'conversation_turn',
      'sentence',
      'phrase',
      'conjugation',
      'word',
      'name',
      'morpheme'
    ];
    for (sectionTypeIndex in sectionTypeKeys) {
    
      var sectionTypeKey = sectionTypeKeys[sectionTypeIndex];

      // Make sure _mz[sectionTypeKey] variable exists
      if (!booklet.section_parts._mz[sectionTypeKey]) {
        booklet.section_parts._mz[sectionTypeKey] = {};
      }
      else {
        // No need to add it
      }
      
      // Mark whether section exists
      var sectionFound = booklet.section_parts[sectionTypeKey] ? true : false;
      booklet.section_parts._mz[sectionTypeKey].isDefined = sectionFound;

    }
    
    return booklet;
    
  }
</script>

<!-- This is the rendered content -->
<div id="<?php echo $booklet_id ?>" class="olcmustache-document-rendered <?php echo $booklet_classes ?>"></div>

<!-- This is the mustache template -->
<?php echo $booklet_mustache_template ?>

