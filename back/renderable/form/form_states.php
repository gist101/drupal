<?php

// @doc http://drupal7.api/api/drupal/includes%21common.inc/function/drupal_process_states/7.x

// It supports or/xor, but haven't been documented.
// @doc https://www.drupal.org/node/735528

// States
/*
The following states may be applied to an element:
enabled
disabled
required
optional
visible
invisible
checked
unchecked
expanded
collapsed

The following states may be used in remote conditions:
empty
filled
checked
unchecked
expanded
collapsed
value

The following states exist for both elements and remote conditions, but are not fully implemented and may not change anything on the element:
relevant
irrelevant
valid
invalid
touched
untouched
readwrite
readonly
*/


// -----------------------------------------------------------------------------
// Simple Example

$form['toggle_me'] = array(
  '#type' => 'checkbox',
  '#title' => t('Tick this box to type'),
);
$form['settings'] = array(
  '#type' => 'textfield',
  '#states' => array(
    // Only show this field when the 'toggle_me' checkbox is enabled.
    'visible' => array(
      ':input[name="toggle_me"]' => array('checked' => TRUE),
    ),
  ),
);

// -----------------------------------------------------------------------------
// Or Example ???

// Display Style
$style_options = array(
  'media' => t('Media'),
  'thumbnail' => t('Thumbnail'),
);
$form['style'] = array(
  '#type' => 'select',
  '#options' => $style_options,
  '#default_value' => kpane_settings_default_value($entity, 'style', array()),
);

// Grid Type Style
$form['grid'] = array(
  '#type' => 'fieldset',
  '#title' => t('Grid'),
  '#collapsible' => TRUE,
  '#collapsed' => TRUE,
  '#states' => array(
    'visible' => array(
      ':input[name="settings[posts][style]"]' => array(
        array('value' => 'thumbnail'),
        array('value' => 'media'),
      ),
    ),
  ),
);
