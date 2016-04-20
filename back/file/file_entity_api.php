<?php

function file_entity_hook_info_alter(&$info) {
  $hooks = array(
    // File API hooks
    'file_copy',
    'file_move',
    'file_validate',
    // File access
    'file_download',
    'file_download_access',
    'file_download_access_alter',
    // File entity hooks
    'file_load',
    'file_presave',
    'file_insert',
    'file_update',
    'file_delete',
    // Miscellaneous hooks
    'file_mimetype_mapping_alter',
    'file_url_alter',
  );
  $info += array_fill_keys($hooks, array('group' => 'file'));
}
