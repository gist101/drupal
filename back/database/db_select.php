<?php

// SelectQuery

// @api http://drupal7.api/api/drupal/includes%21database%21database.inc/function/db_select/7.x

$arguments = array(':name' => 'John', ':uid' => 0);
db_select('dbtng_example')
  ->fields('dbtng_example')
  ->where('uid = :uid AND name = :name', $arguments)
  ->execute();

// -----------------------------------------------------------------------------
// Statement Conditions

// @issue condition only can be used once.
$query = db_select('filehash', 'fh')
  ->fields('fh', array('fid'))
  ->condition($algo, hash_file($algo, $file->uri))
  ->condition('filesize', $file->filesize);

// Need to use db_or(), db_and() to chain conditions.
$and_1 = db_and()->condition('b.date' , $date, '=')->condition('b.time', $begin_time, '>');
$and_2 = db_and()->condition('b.date' , $tomorrow, '=')->condition('b.time', '00:00', '>=');

$query->condition(db_or()->condition($and_1)->condition($and_2));

// @pass
$query = db_select('filehash', 'fh')
  ->fields('fh', array('fid'));
$query->join('file_managed', 'fm', 'fh.fid = fm.fid');
$db_condition = db_and()->condition('fh.' . $algo, hash_file($algo, $file->uri))->condition('fm.filesize', $file->filesize);
$query->condition($db_condition);
$fid = $query->execute()->fetchField();

// -----------------------------------------------------------------------------
// Join database
//

