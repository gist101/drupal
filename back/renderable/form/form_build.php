<?php

// @api http://drupal7.api/api/drupal/includes%21form.inc/function/drupal_build_form/7.x

drupal_get_form($form_id);

drupal_build_form($form_id, &$form_state);

drupal_rebuild_form($form_id, &$form_state, $old_form = NULL);

// @api http://drupal7.api/api/drupal/includes%21form.inc/function/drupal_retrieve_form/7.x
// Prepare the $form from form callback.
drupal_retrieve_form($form_id, &$form_state);

// Add basic properties to $form element structure like #form_id, #build_id, #token, #theme.
// drupal_alter(), allow to modify form elements before drupal_process_form().
drupal_prepare_form($form_id, &$form, &$form_state);


drupal_process_form($form_id, &$form, &$form_state);

form_builder($form_id, &$element, &$form_state);

drupal_validate_form($form_id, &$form, &$form_state);

_form_validate(&$elements, &$form_state, $form_id = NULL);

drupal_render(&$elements);

// form_builder(), _form_validate(), drupal_render().

form_execute_handlers($type, &$form, &$form_state);

drupal_redirect_form($form_state);



// -----------------------------------------------------------------------------
//

hook_forms($form_id, $args);
// @see drupal_retrieve_form().
// $forms[$form_id]
$form = array(
  'callback' => '',
  'callback arguments' => array(),
  'wrapper_callback' => '',
);

// 'form_' . $base_form_id
// 'form_' . $form_id
drupal_alter($hooks, $form, $form_state, $form_id);

form_get_cache($form_build_id, &$form_state);

drupal_get_token();
drupal_html_id($id);

$form = array(
  '#type' => 'form',
  '#form_id' => '',
  '#build_id' => '', // 'form-' . drupal_random_key()
  '#token' => $form_id, // or FALSE, protect from cross sites request
  '#id' => drupal_html_id($form_id),
  '#programmed' => FALSE,
  '#method' => 'post',
  '#https' => FALSE,
  '#action' => '',
  '#tree' => FALSE,
  '#parents' => array(),
  '#array_parents' => array(),
  '#validate' => array(), // $form_id . '_validate', or $base_form_id . '_validate'
  '#submit' => array(), // $form_id . '_submit', or $base_form_id . '_submit'
  '#theme' => array(), // $form_id, or $base_form_id
  '#processed' => FALSE,
  '#defaults_loaded' => TRUE,
  '#required' => FALSE,
  '#attributes' => array(),
  '#title_display' => 'before',
  '#sorted' => TRUE,
  '#after_build' => array(),
  '#after_build_done' => TRUE,
  '#submitted' => TRUE,
  'form_build_id' => array(
    '#type' => 'hidden',
    '#value' => $form['#build_id'],
    '#id' => $form['#build_id'],
    '#name' => 'form_build_id',
    '#parents' => array('form_build_id'),
  ),
  'form_token' => array(
    '#id' => drupal_html_id('edit-' . $form_id . '-form-token'),
    '#type' => 'token',
    '#default_value' => drupal_get_token($form['#token']),
    '#parents' => array('form_token'),
  ),
  'form_id' => array(
    '#type' => 'hidden',
    '#value' => $form_id,
    '#id' => drupal_html_id("edit-$form_id"),
    '#parents' => array('form_id'),
  ),
);

$form_state = array(
  'method' => 'post', // post/get
  'wrapper_callback' => '',
  'build_info' => array(
    'base_form_id' => '',
    'form_id' => '',
    'files' => array(
      'menu' => '',
    ),
    'args' => array(),
  ),
  'input' => array(
    'form_id' => '',
  ),
  'process_input' => TRUE, // TRUE if correct form submission
  'submitted' => TRUE,
  'rebuild' => FALSE,
  'executed' => FALSE,
  'complete form' => &$element,
  'programmed' => FALSE,
  'redirect' => '',
);
