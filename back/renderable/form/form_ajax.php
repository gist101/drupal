<?php

// Drupal built-in ajax feature just intend to do simple job only.
// For complex job, consider using .js file.
// But the Drupal ajax can degrade nicely, remember that.

// @doc https://www.drupal.org/node/752056

// @issue triggering_element:
// https://www.drupal.org/node/1342066
// https://www.drupal.org/node/1342066#comment-7251470
// https://www.drupal.org/node/1346626

/**
 * Ajax callback for settings[theme][display], to replace the style options.
 */
function kpane_plugin_settings_theme_display_ajax($form, $form_state) {
  $entity = $form_state['entity'];
  $plugin = kpane_plugin_get_plugins($entity->bundle);
  $form['settings']['theme']['style']['#options'] = kpane_plugin_theme_style_options($plugin, $form_state['values']['settings']['theme']['display']);
  $form['settings']['theme']['style']['#default_value'] = 'none';

  return $form['settings']['theme']['style'];
}

// =============================================================================
// Unique ID for ajax wrapper

function uiid_element_process($element, $form_state, $complete_form) {
  $id = 'uiid-' . sha1(implode('-', $element['#parents']));
  $element['value'] = array(
    '#type' => 'textfield',
    //'#required' => $element['#required'],
    '#title' => t('UIID'),
    '#title_display' => 'invisible',
    '#theme_wrappers' => array(),
    '#prefix' => '<span id="' . $id . '">',
    '#suffix' => "</span>",
  );

  if (isset($element['#default_value'])) {
    $element['value']['#default_value'] = $element['#default_value'];
  }

  $element['generate'] = array(
    '#type' => 'button',
    '#name' => $id . '-generate',
    '#value' => t('Generate'),
    '#ajax' => array(
      'callback' => 'uiid_generate_ajax',
      'wrapper' => $id,
    ),
    '#limit_validation_errors' => array(), // Useful to suppress error fire for other elements that are not ready to check yet.
  );

  return $element;
}

/**
 * Ajax callback.
 */
function uiid_generate_ajax($form, $form_state) {
  $element = uiid_form_get_element($form, $form_state);
  $element['#value'] = uniqid();

  return $element;
}

/**
 * Helper function to get the element for ajax callback.
 */
function uiid_form_get_element($form, $form_state) {
  $element = array();
  $array_parents = $form_state['triggering_element']['#array_parents'];
  // Remove the action and the actions container.
  $array_parents = array_slice($array_parents, 0, -1);
  $array_parents[] = 'value';
  $element = drupal_array_get_nested_value($form, $array_parents);

  return $element;
}
