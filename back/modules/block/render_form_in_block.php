<?php

// ----------------------------------------------------------------------------
// Block

/**
 *  Implements hook_block_info().
 */
function fxpp_block_info() {
  $blocks = array();

  $blocks['redirect_edit_form'] = array(
    'info' => t('Redirect Edit Form'),
    'cache' => DRUPAL_NO_CACHE,
  );

  return $blocks;
}

/**
 *  Implements hook_block_view().
 */
function fxpp_block_view($delta = '') {
  $block = array();

  if ($delta == 'redirect_edit_form') {
    module_load_include('inc', 'redirect', 'redirect.admin');
    $block['subject'] = t('Add new affiliate link');
    $form = drupal_get_form('redirect_edit_form');
    $block['content']['form'] = $form;
  }

  return $block;
}
