<?php

// @file /includes/token.inc
// @doc http://drupal7.api/api/drupal/includes%21token.inc/7.x
// @doc https://www.drupal.org/documentation/modules/token
// @module token


// =============================================================================
// Definition

hook_token_info();
hook_token_info_alter(&$data);
hook_tokens($type, $tokens, array $data = array(), array $options = array());
hook_tokens_alter(array &$replacements, array $context);


// =============================================================================
// Utility

token_info();

token_replace($text, array $data = array(), array $options = array());


// =============================================================================
// token.module

// Theme registries
// - 'tree_table'
// - 'token_tree'
// - 'token_tree_link'

// Simplest Token Dialog
// @issue I don't see this work with '#token_types', seems only inline theme() call works.
$form['token_help'] = array(
  '#theme' => 'token_tree_link',
  '#token_types' => array('user', 'node'),
);

// Print to description
// These work like a champ
$form['archive_fieldset']['archive_directory'] = array(
  '#type' => 'textfield',
  '#title' => t('Directory'),
  '#default_value' => $settings['archive_directory'],
  '#description' => theme('token_tree_link', array('token_types' => array('file', 'user', $instance['entity_type']))),
);

$form['instance']['settings']['filefield_paths']['token_tree'] = array(
  '#type' => 'fieldset',
  '#title' => t('Replacement patterns'),
  '#collapsible' => TRUE,
  '#collapsed' => TRUE,
  '#description' => theme('token_tree', array('token_types' => array('file', $entity_info['token type']))),
  '#weight' => 10,
);

// Element validate
$form['databasics_message'] = array(
  '#type' => 'textarea',
  '#title' => t('Message'),
  '#default_value' => variable_get('databasics_message', ''),
  '#element_validate' => array('token_element_validate'),
  '#token_types' => array('user', 'node'),
);
