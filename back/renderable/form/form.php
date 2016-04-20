<?php

// ============================================================================
// Workflow

// @api http://drupal7.api/api/drupal/includes%21form.inc/group/form_api/7.x
// @api http://drupal7.api/api/drupal/includes%21form.inc/function/drupal_build_form/7.x

$form = drupal_get_form('my_module_example_form');

...
function my_module_example_form($form, &$form_state) {
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Submit'),
  );
  return $form;
}
function my_module_example_form_validate($form, &$form_state) {
  // Validation logic.
}
function my_module_example_form_submit($form, &$form_state) {
  // Submission logic.
}

// ----------------------------------------------------------------------------
// Special Usage

$form['#validate'];

$form['#submit'];

$form_state['redirect'] = '';
