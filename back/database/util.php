<?php

//

drupal_write_record($table, &$record, $primary_keys = array());

db_insert($table, array $options = array());

db_update($table, array $options = array());

db_delete($table, array $options = array());


// Get future id, @see drupal_write_record().
// https://www.drupal.org/node/729970 Only in Drupal 6
$last_id = db_last_insert_id($table, $field);
// Drupal 7
// @issue Only work if the last serial is not deleted
$last_id = db_query('SELECT MAX(id_col) FROM {table}')->fetchField();
// SELECT LAST_INSERT_ID();
// @issue Has same issue as the previous one.
$last_id = db_query('SELECT LAST_INSERT_ID() FROM {table}')->fetchField();

// MySQL
// @link http://stackoverflow.com/questions/15821532/get-current-auto-increment-value-for-any-table

// SELECT `AUTO_INCREMENT`
// FROM  INFORMATION_SCHEMA.TABLES
// WHERE TABLE_SCHEMA = 'DatabaseName'
// AND   TABLE_NAME   = 'TableName';
