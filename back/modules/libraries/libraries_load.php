<?php

// @doc https://www.drupal.org/node/1342238

libraries_load($name);

// Try to load the library and check if that worked.
if (($library = libraries_load($name)) && !empty($library['loaded'])) {
  // Do something with the library here.
}

if (($library = libraries_detect($name)) && !empty($library['installed'])) {
  // The library is installed. Awesome!
}
else {
  // Something went wrong. :(
  // This contains a short status code of what went wrong, such as 'not found'.
  $error = $library['error'];
  // This contains a detailed (localized) error message.
  $error_message = $library['error message'];
}

// Form #attached
$form['myelement']['#attached']['libraries_load'][] = array('myAwesomeLibrary');
