<?php

// -----------------------------------------------------------------------------
// Hook
// @link http://drupal7.api:8082/api/ds/ds.api.php/7.x-2.x


// ---------------------
// hook_ds_fields_info()
// @file MODULE.ds_fields_info.inc

$info['ENTITY']['FIELD'] = array(
	
);

// Utility
ds_get_fields($entity_type, $cache);

ds_render_field($field);
