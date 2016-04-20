<?php

/// @link https://www.drupal.org/node/2078241

class CreateFieldInCode {

  public function basic($entity_type, $field_name, $field_type) {
    // field.storage.ENTITY.FIELD
    $field_storage_values = [
      'field_name' => $field_name,
      'entity_type' => $entity_type,
      'type' => $field_type,
      'translatable' => FALSE,
    ];
    // field.field.ENTITY.BUNDLE.FIELD
    $field_values = [
      'field_name' => $field_name,
      'entity_type' => $entity_type,
      'bundle' => 'term',
      'label' => 'ABC',
      // Field translatability should be explicitly enabled by the users.
      'translatable' => FALSE,
    ];
    $widget_id = $formatter_id = NULL;

    //
    $this->entityTypeManager()->getStorage('field_storage_config')->create($field_storage_values)->save();
    $field = $this->entityTypeManager()->getStorage('field_config')->create($field_values);
    $field->save();
  }
}

// @see \Drupal\field_ui\Form\FieldStorageAddForm::submitForm()

$error = FALSE;
$values = $form_state->getValues();
$destinations = array();
$entity_type = $this->entityManager->getDefinition($this->entityTypeId);

// Create new field.
if ($values['new_storage_type']) {
  // field.storage.ENTITY.FIELD
  $field_storage_values = [
    'field_name' => $values['field_name'],
    'entity_type' => $this->entityTypeId,
    'type' => $values['new_storage_type'],
    'translatable' => $values['translatable'],
  ];
  // field.field.ENTITY.BUNDLE.FIELD
  $field_values = [
    'field_name' => $values['field_name'],
    'entity_type' => $this->entityTypeId,
    'bundle' => $this->bundle,
    'label' => $values['label'],
    // Field translatability should be explicitly enabled by the users.
    'translatable' => FALSE,
  ];
  $widget_id = $formatter_id = NULL;

  // Check if we're dealing with a preconfigured field.
  if (strpos($field_storage_values['type'], 'field_ui:') !== FALSE) {
    list(, $field_type, $option_key) = explode(':', $field_storage_values['type'], 3);
    $field_storage_values['type'] = $field_type;

    $field_type_class = $this->fieldTypePluginManager->getDefinition($field_type)['class'];
    $field_options = $field_type_class::getPreconfiguredOptions()[$option_key];

    // Merge in preconfigured field storage options.
    if (isset($field_options['field_storage_config'])) {
      foreach (array('cardinality', 'settings') as $key) {
        if (isset($field_options['field_storage_config'][$key])) {
          $field_storage_values[$key] = $field_options['field_storage_config'][$key];
        }
      }
    }

    // Merge in preconfigured field options.
    if (isset($field_options['field_config'])) {
      foreach (array('required', 'settings') as $key) {
        if (isset($field_options['field_config'][$key])) {
          $field_values[$key] = $field_options['field_config'][$key];
        }
      }
    }

    $widget_id = isset($field_options['entity_form_display']['type']) ? $field_options['entity_form_display']['type'] : NULL;
    $formatter_id = isset($field_options['entity_view_display']['type']) ? $field_options['entity_view_display']['type'] : NULL;
  }

  // Create the field storage and field.
  try {
    $this->entityManager->getStorage('field_storage_config')->create($field_storage_values)->save();
    $field = $this->entityManager->getStorage('field_config')->create($field_values);
    $field->save();

    $this->configureEntityFormDisplay($values['field_name'], $widget_id);
    $this->configureEntityViewDisplay($values['field_name'], $formatter_id);

    // Always show the field settings step, as the cardinality needs to be
    // configured for new fields.
    $route_parameters = array(
        'field_config' => $field->id(),
      ) + FieldUI::getRouteBundleParameter($entity_type, $this->bundle);
    $destinations[] = array('route_name' => "entity.field_config.{$this->entityTypeId}_storage_edit_form", 'route_parameters' => $route_parameters);
    $destinations[] = array('route_name' => "entity.field_config.{$this->entityTypeId}_field_edit_form", 'route_parameters' => $route_parameters);
    $destinations[] = array('route_name' => "entity.{$this->entityTypeId}.field_ui_fields", 'route_parameters' => $route_parameters);

    // Store new field information for any additional submit handlers.
    $form_state->set(['fields_added', '_add_new_field'], $values['field_name']);
  }
  catch (\Exception $e) {
    $error = TRUE;
    drupal_set_message($this->t('There was a problem creating field %label: @message', array('%label' => $values['label'], '@message' => $e->getMessage())), 'error');
  }
}
