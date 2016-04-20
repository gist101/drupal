<?php

// -----------------------------------------------------------------------------
// $plugin
// @trace
// @see ctools_context_get_context_from_relationship().
// @see ctools_context_get_context_from_relationships().
// @see ctools_context_load_contexts().

$plugin = array(
	'title' => t(''),
  'description' => t(''),
  'keyword' => '',
  'required context' => new ctools_context_required(t(''), ''),
  'context' => 'MODULE_PLUGIN_context',
  'edit form' => '',
  'edit form validate' => '',
  'edit form submit' => '',
  'defaults' => array(),
);

/**
 * Return a new context based on an existing context.
 */
function MODULE_PLUGIN_context($context, $conf) {
  
}

// -----------------------------------------------------------------------------
// Simplest implementation

$plugin = array(
  'title' => t(''),
  'description' => t(''),
  'keyword' => '',
  'required context' => new ctools_context_required(t(''), ''),
  'context' => 'MODULE_PLUGIN_context',
);

/**
 * Return a new context based on an existing context.
 */
function MODULE_PLUGIN_context($context, $conf) {
  dsm($context, 'context');
  dsm($conf, 'conf');
  // If unset it wants a generic, unfilled context, which is just NULL.
  if (empty($context->data)) {
    return ctools_context_create_empty('entity:test_entity', NULL);
  }

  return FALSE;
}

/**
 * According to ctools_context_get_context_from_relationship(), the function signature may look like this.
 */
function Module_Plugin_context($source_context, $relationship, $placeholders) {
  dsm($source_context, 'source_context');
  dsm($relationship, 'relationship');
  dsm($placeholders, 'placeholders');
  // If unset it wants a generic, unfilled context, which is just NULL.
  if (empty($source_context->data)) {
    return ctools_context_create_empty('entity:test_entity');
  }

  return FALSE;
}

// -------
// Example
// @issue This maybe not so updated.

/**
 * @file
 * ctools relationships plugin: Get Product Display from Product.
 */

$plugin = array(
  'title' => t('Product Display from Product'),
  'description' => t('Get Product Display from Product.'),
  'keyword' => 'product_display',
  'required context' => new ctools_context_required(t('Commerce Product'), 'entity:commerce_product'),
  'context' => 'miiniu_biz_pd_from_product_context',
);

/**
 * Return a new context based on an existing context.
 */
function miiniu_biz_pd_from_product_context($context, $conf) {
  // If unset it wants a generic, unfilled context, which is just NULL.
  if (empty($context->data)) {
    return ctools_context_create_empty('entity:product_display');
  }

  if (isset($context->data->product_id)) {
    $pd = miiniu_biz_product_get_pd($context->data);
    if ($pd) {
      return ctools_context_create('entity:product_display', $pd);
    }
  }

  return FALSE;
}

// -----------------------------------------------------------------------------
// edit form

$plugin = array(
	'edit form' => 'Module_Plugin_edit_form',
  'defaults' => array(), // Need to set the key in order for later $conf to have.
);

function Module_Plugin_edit_form($form, &$form_state) {
  $conf = $form_state['conf'];
  
  return $form;
}

// -------
// Example

$plugin = array(
  'title' => t('Book parent'),
  'keyword' => 'book_parent',
  'description' => t('Adds a book parent from a node context.'),
  'required context' => new ctools_context_required(t('Node'), 'node'),
  'context' => 'ctools_book_parent_context',
  'edit form' => 'ctools_book_parent_settings_form',
  'defaults' => array('type' => 'top'),
);

function ctools_book_parent_settings_form($form, &$form_state) {
  $conf = $form_state['conf'];
  $form['type'] = array(
    '#type' => 'select',
    '#title' => t('Relationship type'),
    '#options' => array('parent' => t('Immediate parent'), 'top' => t('Top level book')),
    '#default_value' => $conf['type'],
  );

  return $form;
}
