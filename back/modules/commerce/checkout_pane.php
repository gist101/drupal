<?php

// @api http://drupal7.api/api/commerce/modules%21checkout%21commerce_checkout.api.php/function/hook_commerce_checkout_pane_info/7.x-1.x
hook_commerce_checkout_pane_info();

$checkout_pane = array(
  'pane_id' => 'COPANE',
  'title' => t(''),
  'name' => t(''),
  'page' => 'checkout',
  'locked' => FALSE,
  'collapsible' => FALSE,
  'collapsed' => FALSE,
  'weight' => 0,
  'enabled' => TRUE,
  'review' => TRUE,
  'module' => '', // @auto
  'file' => '',
  'base' => 'COPANE', //
  'callbacks' => array(),
);

// Callbacks:
function COPANE_settings_form($checkout_pane);
function COPANE_checkout_form($form, &$form_state, $checkout_pane, $order);
function COPANE_checkout_form_validate($form, &$form_state, $checkout_pane, $order);
function COPANE_checkout_form_submit($form, &$form_state, $checkout_pane, $order);
function COPANE_review($form, $form_state, $checkout_pane, $order);


// -----------------------------------------------------------------------------
// Utility

commerce_checkout_pane_callback($checkout_pane, $callback);
