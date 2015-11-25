<?php 

  // Get the text
  $node = $variables['node'];
  $text = $node->title;

  // Make image
  $img = 
  
  // Post image to PROXY website
  
  // Get product w/ customizations
  $url = 'PRODUCT_URL';
  

function text2image() {
  $im = imagecreatetruecolor(400, 30);
  // Create some colors
  $white = imagecolorallocate($im, 255, 255, 255);
  $grey = imagecolorallocate($im, 128, 128, 128);
  $black = imagecolorallocate($im, 0, 0, 0);
  imagefilledrectangle($im, 0, 0, 399, 29, $white);

  // The text to draw
  $text = $variables();
// Replace path by your own font path
$font = 'arial.ttf';

// Add some shadow to the text
imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

// Add the text
imagettftext($im, 20, 0, 10, 20, $black, $font, $text);  
  imagepng($im);
  imagedestroy($im);
}

?>
MUG
