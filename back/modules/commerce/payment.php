<?php

// @topic http://drupal7.api/api/commerce/modules%21payment%21commerce_payment.api.php/group/commerce_payment_method/7.x-1.x

// -----------------------------------------------------------------------------
// Hook

// hook_commerce_payment_method_info().
// @api http://drupal7.api/api/commerce/modules%21payment%21commerce_payment.api.php/function/hook_commerce_payment_method_info/7.x-1.x

function hook_commerce_payment_method_info() {
  $payment_methods = array();

  $payment_methods['METHOD'] = array(
    'title' => t(''),
    'description' => t(''),
    'active' => TRUE,
  );

  return $payment_methods;
}

// -----------------------------------------------------------------------------
// Definition

$payment_methods['METHOD'];

$payment_method = array(
  'method_id' => 'METHOD', // @optional
  'base' => 'METHOD', // @optional Custom callbacks prefix [base]_[callback], default to method_id.
  'title' => t(''),
  'display_title' => t(''), // @optional ???
  'short_title' => t(''), // @optional
  'description' => t(''), // @optional
  'active' => TRUE, // @optional
  'checkout' => TRUE, // @optional
  'terminal' => TRUE, // @optional
  'offsite' => FALSE, // @optional
  'offsite_autoredirect' => FALSE, // @optional
  'callbacks' => array(), // @optional
  'file' => '', // @optional path to include file
);

// Simple
$payment_method = array(
  'title' => t(''),
  'description' => t(''),
  'active' => TRUE,
);

// -----------------------------------------------------------------------------
// Callbacks

// METHOD-ID_settings_form().
// METHOD-ID_submit_form().

// * settings_form
BASE_settings_form($settings = NULL);

// * submit_form
// * submit_form_validate
// * submit_form_submit
BASE_submit_form($payment_method, $pane_values, $checkout_pane, $order);
BASE_submit_form_validate($payment_method, $pane_form, $pane_values, $order, $form_parents = array());
BASE_submit_form_submit($payment_method, $pane_form, $pane_values, $order, $charge);

// * redirect_form
// * redirect_form_validate
// * redirect_form_submit
BASE_redirect_form($form, &$form_state, $order, $payment_method);
BASE_redirect_form_validate($order, $payment_method);
BASE_redirect_form_submit($order, $payment_method);


// Debug

function BASE_settings_form($settings = NULL) {
  dsm($setting, '$settings');
}

function BASE_submit_form($payment_method, $pane_values, $checkout_pane, $order) {
  dsm($payment_method, '$payment_method'); // The payment method definition
  dsm($pane_values, '$pane_values'); //
  dsm($checkout_pane, '$checkout_pane'); //
  dsm($order, '$order'); // The order object stdClass
}

// Need form_set_error() and return FALSE at the same time.
// @see commerce_payment_example_submit_form_validate().
function BASE_submit_form_validate($payment_method, $pane_form, $pane_values, $order, $form_parents = array()) {
  dsm($payment_method, '$payment_method'); // The payment method definition
  dsm($pane_form, '$pane_form'); //
  dsm($pane_values, '$pane_values'); //
  dsm($order, '$order'); // The order object stdClass
  dsm($form_parents, '$form_parents'); // ????

  return FALSE;
}

// Need to use terminal payment form?
// Does checkout form work?
function BASE_submit_form_submit($payment_method, $pane_form, $pane_values, $order, $charge) {
  dsm($payment_method, '$payment_method'); // The payment method definition
  dsm($pane_form, '$pane_form'); //
  dsm($pane_values, '$pane_values'); //
  dsm($order, '$order'); // The order object stdClass
  dsm($charge, '$charge'); //
}
