<?php 
/**
 * OLC TeX Picture 
 * @style_name The name of the Drupal image style
 * @file The file object
 * @ppi The pixels per inch (default is 300 ppi)
 */

  $p_style = $variables['data']['style_name'];
  
  $file = $variables['data']['file'];
  $p_fid = $file['fid'];
  $p_filename = $file['filename'];
  $p_path = 'picture/'.$p_fid.'-'.$p_style.'-'.$p_filename;
  
  image_style_transform_dimensions($p_style, $file);
  $p_ppi = isset($variables['ppi']) ? $variables['data']['ppi'] : 72;
  $p_width = round($file['width'] / $p_ppi, 2);
  $p_height = round($file['height'] / $p_ppi, 2);
  
?>
\includegraphics
  [
    width=<?php echo $p_width ?>in,
    height=<?php echo $p_height ?>in
  ]{<?php echo $p_path ?>}
