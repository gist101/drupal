<?php

// ----------------------------------------------------------------------------
// Path Alias

// Go through this function to match a existing menu routing item.
drupal_get_normal_path($path = NULL, $path_language = NULL); // Get the source path by input alias
drupal_get_path_alias($path = NULL, $path_language = NULL); // Get the alias path by input source

// Parse income url to be drupal usable path.
hook_url_inbound_alter(&$path, $original_path, $path_language);
// Prepare the web page link to match the designed IA url that would be
// input/display/click and pass to hook_url_inbound_alter() in new request.
// @see url().
// @see l().
hook_url_outbound_alter();

// Question:
// Which is better:
// * Provide generic url then use url().
// * Provide the product url in theme directly.


// ----------------------------------------------------------------------------
// Advanced

// Only show one return even there are more than one alias to the source.
dsm(drupal_get_path_alias('node/23'));

// Query the database directly.
$result= db_query('SELECT * FROM {url_alias} ua WHERE source = :source', array(':source' => 'node/23'));
dsm($result);
foreach($result as $value) {
  dsm($value);
}

$query = db_select('url_alias');
$query->addField('url_alias', 'alias');
$query->condition('source', 'node/23', '=');
$result = $query->execute();
dsm($result);