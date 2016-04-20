<?php

// @api
// hook_url_inbound_alter(&$path, $original_path, $path_language)
//   @see drupal_get_normal_path().
// hook_url_outbound_alter(&$path, &$options, $original_path)
//   @see url().

// @note
// Usually I just need to use path alias.

/**
 * @Implements hook_url_inbound_alter().
 */
function hook_url_inbound_alter(&$path, $original_path, $path_language) {

}

/**
 * @Implements hook_url_outbound_alter().
 */
function hook_url_outbound_alter(&$path, &$options, $original_path) {

}
