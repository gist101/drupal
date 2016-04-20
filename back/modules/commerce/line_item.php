<?php

hook_commerce_line_item_type_info();

$line_item = array(
  'type' => '', // @optional
  'name' => t(''),
  'description' => t(''),
  'product' => FALSE, // @optional
  'add_form_submit_value' => t(''),
  'base' => '', // @optional [base]_[callback]
  'callbacks' => array(),
);

// Callbacks
// * configuration
// * title
// * add_form
// * add_form_submit
