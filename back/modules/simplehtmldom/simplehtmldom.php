<?php

// @project https://www.drupal.org/project/simplehtmldom
// @link http://simplehtmldom.sourceforge.net/index.htm
// @doc http://simplehtmldom.sourceforge.net/manual.htm
// @api http://simplehtmldom.sourceforge.net/manual_api.htm

// ----------------------------------------------------------------------------
// Example

// Create a DOM object.
$html_obj = new simple_html_dom();
// Load HTML from a string.
$html_obj->load($node->body[LANGUAGE_NONE][0]['value']);
// Remove all plain text fragments.
foreach ($html_obj->find('text') as $plain_text_obj ) {
  $plain_text_obj->innertext = "";
}
// Display the results.
echo $html_obj;
// Release resources to avoid memory leak in some versions.
$html_obj->clear();
unset($html_obj);

//
$html = new simple_html_dom();
$tag_a_all = $html->find('a');
dsm($tag_a_all);


// ----------------------------------------------------------------------------
// Test

$url = "http://www.morazzia.com/galleries/kristine-simmons";
$html = new simple_html_dom(file_get_html($url));
$tag_a_all = $html->find('a');
dsm($tag_a_all);
