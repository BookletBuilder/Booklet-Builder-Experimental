<?php 

$items = $variables['data'];
foreach ($items as &$item) {
  $item .= PHP_EOL;
}

$separator = $variables['separator'] . PHP_EOL;
echo implode($separator, $items);
