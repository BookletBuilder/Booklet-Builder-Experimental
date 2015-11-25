<?php

$EOL = PHP_EOL;

$section_type = $variables['section_type'];

$section_title = _olctex_first_second(
  $variables['heading_text'],
  $variables['subheading_text']
);

if(!empty($section_title->first)) {
  echo '\\',$section_type,'{',$section_title->first,'}',$EOL;
}
else {
  echo '\\',$section_type,'{TITLE MISSING}',$EOL;
}

if(!empty($section_title->second)) {
  echo '{\\setlength{\\parskip}{0pt}\\textit{',$section_title->second,'}}',$EOL;
}
else {
  // leave out second title
}
