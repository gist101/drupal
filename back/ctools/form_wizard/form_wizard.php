<?php

// $form_state only pass to its own form_submit???
// Any rule about it???


$form_info = array(
  'id' => 'delegator_page',
  'path' => "admin/structure/pages/edit/$page_name/%step",
  'show trail' => TRUE,
  'show back' => TRUE,
  'show return' => FALSE,
  'next callback' => 'delegator_page_add_subtask_next',
  'finish callback' => 'delegator_page_add_subtask_finish',
  'return callback' => 'delegator_page_add_subtask_finish',
  'cancel callback' => 'delegator_page_add_subtask_cancel',
  'order' => array(
    'basic' => t('Basic settings'),
    'argument' => t('Argument settings'),
    'access' => t('Access control'),
    'menu' => t('Menu settings'),
    'multiple' => t('Task handlers'),
  ),
  'forms' => array(
    'basic' => array(
      'form id' => 'delegator_page_form_basic'
    ),
    'access' => array(
      'form id' => 'delegator_page_form_access'
    ),
    'menu' => array(
      'form id' => 'delegator_page_form_menu'
    ),
    'argument' => array(
      'form id' => 'delegator_page_form_argument'
    ),
    'multiple' => array(
      'form id' => 'delegator_page_argument_form_multiple'
    ),
  ),
);
