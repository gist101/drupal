<?php


/**
 *  Implements hook_block_info().
 */
function HOOK_block_info() {
  $blocks = array();

  $blocks['user_password_request'] = array(
    'info' => t('Request new password form'),
    'cache' => DRUPAL_NO_CACHE,
  );

  return $blocks;
}

function HOOK_block_view($delta = '') {

  $block = array();

  $block['subject'];
  $block['content'];
  $block['content']['child1'];
  $block['content']['child2'];
  $block['content']['form'];

  return $block;
}
