<?php

// ============================================================================
// @see hook_views_data().
// @link http://drupal7.api/api/views/views.api.php/group/views_handlers/7.x-3.x
// Each data can be used as different kinds of handler.

// Name Convention
// [module]_handler_[type]_[tablename]_[fieldname].inc


// Define Data
// @api http://drupal7.api/api/views/views.api.php/function/hook_views_data/7.x-3.x
hook_views_data();
// @api
hook_views_data_alter(&$data);

hook_field_views_data($field);
hook_field_views_data_alter(&$result, $field, $module);
hook_field_views_data_views_data_alter(&$data, $field);


// Get Data Definition
views_fetch_data($table = NULL, $move = TRUE, $reset = FALSE);

_views_fetch_data($table = NULL, $move = TRUE, $reset = FALSE);
_views_fetch_data_build();

// ----------------------------------------------------------------------------
// Data Definition

$table = array(
  'table' => array(
    'entity_type' => '',
    'group' => t(''),
    'base' => array(
      'field' => '',
      'title' => t(''),
      'help' => t(''),
      'weight' => 10,
    ),
    // Make this table fields automated available to base table.
    'join' => array(
      'LEFT TABLE' => array(
        'left_field' => '',
        //'table' => '',
        'field' => '',
        'extra' => array(
          array(
            'field' => '',
            'value' => '',
          ),
        ),
      ),
    ),
    'default_relationship' => array(

    ),
    'moved to' => 'TABLE',
  ),
);

$field = array(
  'title' => t(''),
  'help' => t(''),
  'group' => t(''),
  'real field' => array(),
  // @api http://drupal7.api/api/views/handlers%21views_handler_field.inc/class/views_handler_field/7.x-3.x
  'field' => array(
    'handler' => 'HANDLER',
    'additional fields' => array(
      array(
        'IDENTIFIER' => array(
          'table' => 'TABLE',
          'field' => 'FIELD',
        ),
      ),
    ),
    'click sortable' => FALSE,
  ),
  // @api http://drupal7.api/api/views/handlers%21views_handler_sort.inc/group/views_sort_handlers/7.x-3.x
  'sort' => array(
    'handler' => 'HANDLER',
  ),
  // @api http://drupal7.api/api/views/handlers%21views_handler_filter.inc/group/views_filter_handlers/7.x-3.x
  'filter' => array(
    'handler' => 'HANDLER',
    'allow empty' => FALSE,
  ),
  // @api
  'argument' => array(
    'handler' => 'HANDLER',
    'name field' => '',
    'name table' => '',
    'empty field name' => '',
    'validate type' => '',
    'numeric' => FALSE,
  ),
  // @api http://drupal7.api/api/views/handlers%21views_handler_relationship.inc/class/views_handler_relationship/7.x-3.x
  'relationship' => array(
    'handler' => 'HANDLER',
    'label' => t(''),
    'base' => '', // New Table
    'base field' => '',
    'relationship table' => '', // Base Table
    'relationship field' => '',
  ),
);

// ----------------------------------------------------------------------------
// Utility

// @trace
//   hook_views_data().
//   _views_fetch_data_build().
//   _views_fetch_data().
//   views_fetch_data().

//$data = views_fetch_data($table = NULL, $move = TRUE, $reset = FALSE);
$data = views_fetch_data();
dsm($data);


// ----------------------------------------------------------------------------
// Class
//
// views_handler
// views_join
