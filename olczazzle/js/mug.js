$(document).ready(function() {

  $.ajax({
    url: '/_custom/jfeed_proxy.php',
    data: {url:'http://www.zazzle.com/itbcshop/feed'},
    dataType: 'xml',
    success: function(feed_xml){
      product_catalog_build(feed_xml);
      product_catalog_display();
    }
  });
  
  function product_catalog_display() {
    for (product_index in $.product_catalog) {
      var product = $.product_catalog[product_index];
      product_html = theme_zazzle_product(product);
      print_r(product_html);
    }
  }
  
  function product_catalog_build (feed_xml) {
    // Initialize the product catalog variable
    $.product_catalog = [];
    // Go through each feed item
    $(feed_xml).find('item').each( function(item_index, item){
      // Get the relevant variables
      var product = {};
      product['title'] = $(item).children('media\\:title').text();
      product['description'] = $(item).children('media\\:description').text();
      product['thumbnail'] = $(item).children('media\\:thumbnail').attr('url');
      product['link'] = $(item).children('link').text();
      // Append the product to the catalog
      $.product_catalog.push(product);
    });
  }
  
  function print_r(data) {
    $('#swag').append(data);
  }
  
});










function theme_zazzle_product(product) {
  var content = $('<div class="product-zazzle" />');
  var anchor = $('<a />').attr('href', product['link']).text('Go to product page');
  content.append(
    $('<img class="thumbnail" />').attr('src', product['thumbnail']),
    $('<h3 class="title" />').append(product['title']),
    $('<div class="description" />').append(product['description']),
    $('<div class="purchase_link" />').append(anchor)
  );
  return content;
}


function theme_list(items) {
  var list = $('<ul>').append()
  for (item_index in items) {
      $('<li>').append(items[item_index]).appendTo(list);
  }
  return list;
}

function theme_div(content) {
  return $(content).wrap('<div>').html();
}