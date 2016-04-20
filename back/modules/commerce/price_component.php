<?php


// =============================================================================
// Field: commerce_price
// * amount, currency_code, data


// =============================================================================
// Price Component

// Default Types:
// * Base price
// * Discount
// * Fee

// @api http://drupal7.api/api/commerce/modules%21price%21commerce_price.api.php/function/hook_commerce_price_component_type_info/7.x-1.x
hook_commerce_price_component_type_info();

$price_component = array(
  'name' => '',
  'title' => t(''),
  'display_title' => t(''),
  'weight' => 0,
);


// =============================================================================
// Utility
// commerce_price_component_*()

commerce_price_component_total($price, $name = NULL);

commerce_price_component_titles();

commerce_price_component_types();
