<?php

// @file /includes/file.inc
// @api https://api.drupal.org/api/drupal/includes%21file.inc/group/file/7
// @file /includes/stream_wrappers.inc


// ============================================================================
// Basic Info

file_default_scheme();


// Simple Save
$url = 'http://pic.tingbuxia.com/121212/9432_0031355327196.jpg';
$filename = basename($url);
$image_data = file_get_contents($url);
$file = file_save_data($image_data, 'public://' . $filename);



$uri = file_build_uri($path);
// Test
$path = '13_3.jpg';
$uri = file_build_uri($path);
dsm($uri);
$file = KtoolsFile::loadByURI($uri);
dsm($file);


// ============================================================================
// Hooks

hook_file_copy();
hook_file_move();
hook_file_insert();
hook_file_update();
hook_file_delete();


// ============================================================================
// Operations

file_save_data($data, $destination = NULL, $replace = FILE_EXISTS_RENAME);
file_unmanaged_save_data($data, $destination = NULL, $replace = FILE_EXISTS_RENAME);

// Insert, Create a new file
$file = new stdClass();
$file->uri = '';
$file->filename = drupal_basename($file->uri);
$file->name =
$file->status = FILE_STATUS_PERMANENT;
file_save($file);



