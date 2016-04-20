<?php

hook_forms($form_id, $args);

$form = array(
  'callback arguments' => array(),
  'callback' => '',
  'wrapper_callback' => '',
);

/**
 * Implements hook_form_alter().
 */
function hook_form_alter(&$form, &$form_state, $form_id) {

}

// @api http://drupal7.api/api/drupal/modules%21system%21system.api.php/function/hook_form_FORM_ID_alter/7.x
hook_form_FORM_ID_alter(&$form, &$form_state, $form_id);

// @api
hook_form_BASE_FORM_ID_alter();

