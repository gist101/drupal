<?php

// -----------------------------------------------------------------------------
//

$zip_file = \Drupal\ko\File::createFile('abc.zip', NULL, 'public');
$archiver = new ArchiverZipFile($zip_file);
$archiver->addFile(1);
$archiver->addFile(2);
$archiver->save();


$zip_file = \Drupal\ko\File::loadByUri("public://abc.zip");
$archiver = new ArchiverZipFile($zip_file);
$archiver->addFile(1)
  ->addFile(2);
$archiver->save();

// -----------------------------------------------------------------------------
// Create a new file.

$archiver = new ArchiverZipFile("public://abc.zip");
$archiver->addFile(1)
  ->addFile(2);
$archiver->save();

