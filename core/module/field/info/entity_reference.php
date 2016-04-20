<?php
/**
 * Implements hook_entity_base_field_info().
 */
function ko_core_entity_base_field_info(EntityTypeInterface $entity_type) {
  $fields = array();

  /*
  if ($entity_type->id() === 'intro') {
    // Add 'nid' field to it
    $fields['nid'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Node id'))
      ->setDescription(t('The host node id.'))
      ->setSetting('target_type', 'node')
      ->setSetting('handler', 'default')
      ->setTranslatable(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 5,
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => 60,
          'placeholder' => '',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
  }
  */

  return $fields;
}