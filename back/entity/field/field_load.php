<?php

// @see field_attach_load().
// @doc http://drupal7.api/api/drupal/modules%21field%21field.attach.inc/function/field_attach_load/7.x

// The invoke order is:
// - hook_field_storage_pre_load()
// - storage backend's hook_field_storage_load()
// - field-type module's hook_field_load()
// - hook_field_attach_load()
