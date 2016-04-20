<?php

// @api Advanced Help Document

// 'table'

// entity.views.inc
// Auto add views field, relationship if it's

// 'base' new table
// 'base field' field in new table

// 'relationship table'
// 'relationship field' field in left join table

// 'extra'
// join ON conditions


// entity/views combo
// @see ktopic_entity_property_info().
// @see ktopic_views_data_alter().


// Add all kdata bundles as standard property to the node<ktopic>.
// @see ktopic_views_data_alter().
function ktopic_entity_property_info() {
  $info = array();
  $kdata_bundles = kdata_get_bundles();
  if (empty($kdata_bundles)) {
    return $info;
  }
  $properties = &$info['node']['bundles']['ktopic']['properties'];
  foreach ($kdata_bundles as $kdata_bundle) {
    $properties[$kdata_bundle] = array(
      'label' => t('kdata<@kdata_type>', array('@kdata_type' => $kdata_bundle)),
      'type' => 'kdata',
      'getter callback' => 'ktopic_entity_metadata_kdata_getter_callback',
      'computed' => TRUE,
      'entity views field' => TRUE,
    );
  }

  return $info;
}

/**
 * @implements hook_views_data_alter().
 */
function ktopic_views_data_alter(&$data) {
  $data_tmp = &$data['views_entity_node'];
  $kdata_bundles = kdata_get_bundles();
  foreach ($kdata_bundles as $bundle) {
    $data_tmp[$bundle]['relationship']['group'] = t('Ktopic');
    $data_tmp[$bundle]['relationship']['handler'] = 'views_handler_relationship';
    // @tips If need more complex situation, add 'join handler' to it.
    //   Like when multiple kdata attached to the same node and need to figure out
    //   which one is the right data to display.
    $data_tmp[$bundle]['relationship']['base'] = 'eck_kdata';
    $data_tmp[$bundle]['relationship']['base field'] = 'nid';
    $data_tmp[$bundle]['relationship']['relationship table'] = 'node';
    $data_tmp[$bundle]['relationship']['relationship field'] = 'nid';
    $data_tmp[$bundle]['relationship']['extra'][] = array(
      'field' => 'type',
      'value' => $bundle,
    );
  }
}
