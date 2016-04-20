<?php

// =============================================================================
// Hooks
// @doc http://drupal7.api/api/commerce/modules%21order%21commerce_order.api.php/7.x-1.x

hook_commerce_order_presave($order);

// State includes multiple statuses
hook_commerce_order_state_info();
hook_commerce_order_state_info_alter(&$order_states);

hook_commerce_order_status_info();
hook_commerce_order_status_info_alter(&$order_statuses);

hook_commerce_order_uri($order);

// =============================================================================
// Utility

// -----------------------------------------------------------------------------
// Price

commerce_order_calculate_total($order);

commerce_line_items_total($line_items, $types = array());

commerce_price_component_total($price, $name = NULL);

