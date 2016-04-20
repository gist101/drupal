<?php

// =============================================================================


// -----------------------------------------------------------------------------
//

$element_info = array(
  '#input' => TRUE,
  '#tree' => TRUE,
  '#package' => package_element_default_settings(TRUE),
  //'#value_callback' => 'form_type_package_dev_value', // Set by default
  '#process' => array('form_process_package'),
  '#pre_render' => array('package_pre_render'),
  '#default_value' => array(),
);

function package_element_default_settings($info = FALSE) {
  return array(
    'id' => $info ? NULL : drupal_html_id('package'),
    'wrapper_id' => $info ? NULL : drupal_html_id('package-wrapper'),
    'table_id' => $info ? NULL : drupal_html_id('package-table-id'),
    // For 'pack'
    'max_delta' => 100,
    'item_value' => 'package_item_file_value', // Callback of the format of single item value in pack is saved.
    'item_construct' => 'package_item_file_construct', // Callback to construct item into the package table row
    // For 'attach'
    'options_list' => NULL, // The source list of items to attach to the package
  );
}

// Create an element

$element = array(
  '#type' => 'package',
  '#package' => package_element_default_settings(),
  '#default_value' => array(),
);

// #value_callback
// Turn #default_value or $input into the proper value
// $input value is from HTML form post request, so it contains the format that is totally built and rendered.

// #process

$element['pack'] = array(

);

$element['attach']['add'] = array(

);

$element['attach']['value'] = array(

);
