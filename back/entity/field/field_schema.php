<?php

function uiid_field_field_schema($field) {
  $schema['columns']['value'] = array(
    'description' => 'The uiid value.',
    'type' => 'varchar',
    'length' => 32,
    'not null' => TRUE,
    'default' => '',
  );

  $schema['unique keys'] = array(
    'uiid' => array('value'),
  );

  return $schema;
}

function sheetnode_update_7002(&$sandbox) {
  $fields = field_info_fields();
  foreach ($fields as $field_name => $field) {
    if ($field['type'] == 'sheetfield' && $field['storage']['type'] == 'field_sql_storage') {
      $schema = sheetnode_field_schema_7002($field);
      foreach ($field['storage']['details']['sql'] as $type => $table_info) {
        foreach ($table_info as $table_name => $columns) {
          $column_name = _field_sql_storage_columnname($field_name, 'name');
          db_add_field($table_name, $column_name, $schema['columns']['name']);
          db_add_index($table_name, $column_name, array($column_name));
        }
      }
    }
  }
  field_cache_clear();
}