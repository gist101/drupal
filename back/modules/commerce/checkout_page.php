<?php

// @api http://drupal7.api/api/commerce/modules%21checkout%21commerce_checkout.api.php/function/hook_commerce_checkout_page_info/7.x-1.x
hook_commerce_checkout_page_info();

$checkout_page = array(
  'page_id' => '',
  'title' => t(''),
  'name' => t(''),
  'help' => t(''),
  'weight' => 0,
  'status_cart' => TRUE, // ???
  'buttons' => TRUE, // If display Back, Submit buttons
  'back_value' => 'Go back',
  'submit_value' => 'Continue',
  'prev_page' => '', // @runtime
  'next_page' => '', // @runtime
);
