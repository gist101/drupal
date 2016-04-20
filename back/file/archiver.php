<?php

// @doc https://api.drupal.org/api/drupal/modules%21system%21system.api.php/function/hook_archiver_info/7

hook_archiver_info();
hook_archiver_info_alter(&$info);

ArchiverZip;
ArchiverTar;

$filename = 'archive.zip';
fopen($filename, 'w');
$zip = new ArchiverZip($filename);
foreach ($_POST['img'] as $fid) {
  $query = db_select('file_managed', 'fn')
    ->condition('fid', $fid)
    ->fields('fn', array('filename'));
  $result = $query->execute();

  foreach ($result as $row) {
    if (file_exists('sites/default/files/'.$row->filename)){
      var_dump($zip->add($base_path.'sites/default/files/'.$row->filename));
    }
  }
}
