<?php

// =============================================================================
// Utility

commerce_product_calculate_sell_price($product);

// =============================================================================
//

// Rules Event
// commerce_product_calculate_sell_price


//

hook_commerce_product_calculate_sell_price_line_item_alter();


// =============================================================================
// Snippets

$product = commerce_product_load(1);
dsm($product);
$sell_price = commerce_product_calculate_sell_price($product);
dsm($sell_price);
