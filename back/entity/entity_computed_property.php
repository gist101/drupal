<?php

// @see entity_property_verbatim_get().


function miiniu_publisher_entity_property_info() {
  $info = array();
  $properties = &$info['node']['bundles']['publish']['properties'];

  $properties['publish_status'] = array(
      'label' => t('Publish status'),
      'description' => t('The processing status of this publication.'),
      'type' => 'text',
      'getter callback' => 'miiniu_publisher_publish_get_properties',
      // Indicates it's not schema field direct load
      'computed' => TRUE,
      // Ask it to expose as views field
      'entity views field' => TRUE,
  );

  return $info;
}

// entity_property_verbatim_get($data, array $options, $name, $type, $info)
function entity_property_verbatim_get($data, array $options, $name, $type, $info) {
  dsm($data, 'data');
  dsm($options, 'options');
  dsm($name, 'name');
  dsm($type, 'type');
  dsm($info, 'info');
}

/**
 * Getter callback for node-publish.
 *
 * @todo This may have some performance issue.
 */
function miiniu_pub_publish_get_properties($publish, array $options, $name, $type, $info) {
  $pubform = miiniu_pub_publish_pubform($publish, 'new');
  if ($pubform) {
    $pubform_wrapper = entity_metadata_wrapper('entityform', $pubform);
    return $pubform_wrapper->field_pubform_status->value();
  }

  return NULL;
}
