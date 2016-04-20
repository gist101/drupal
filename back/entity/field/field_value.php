<?php

// @thread https://www.drupal.org/node/1877354
// @see field_attach_submit().
// @see field_default_extract_form_values().
// @see field_default_submit().
// @see drupal_array_get_nested_value().
// @see field_form_get_state().
// @see field_form_set_state().

/*
You could compare the fid on:

$node->file_field[LANGUAGE_NONE][0]['fid']
against:

$node->original->file_field[LANGUAGE_NONE][0]['fid']
*/

// Form context
// Compare '#default_value' and '#value'
