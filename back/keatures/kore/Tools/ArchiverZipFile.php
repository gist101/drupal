<?php

$archive_file = $field['settings']['archive_scheme'] . '://' . $dir . '/' . $item['title'] . '.zip';

$archiver = new \ArchiverZipFile($archive_file);
$archiver->removeAll();
foreach ($item['package'] as $fid => $package_item) {
  $archiver->addFile($fid);
}
$archive_file = $archiver->save();
// New archive file
if (!isset($item['archive']) && $archive_file) {
  $items[$delta]['archive'] = $archive_file->fid;
}