<?php

// List of field types
dsm(field_info_field_types());

// Add field to entity bundle

Drupal\ko\Field\Helper::addField('FIELD_TYPE', 'ENTITY_TYPE', 'BUNDLE', 'FIELD_NAME', 'LABEL');

Drupal\ko\Field\Helper::addField('uiid', 'node', 'kware', 'kware_uiid', 'UIID');

// Common Fields
// text
// text_long
// text_with_summary
// entityreference
