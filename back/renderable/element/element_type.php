<?php

// @api http://drupal7.api/api/drupal/modules%21system%21system.api.php/function/hook_element_info/7.x
// @doc https://www.drupal.org/node/169815
// @tutorial https://www.silviogutierrez.com/blog/custom-drupal-elements-forms/

// =============================================================================
// Definition

function example_element_info() {
  $elements['gitbucket'] = array(
    '#input' => TRUE,
    '#default_value' => '',
    '#process' => array('example_gitbucket_element_process'),
    '#theme_wrappers' => array('form_element'),
    '#tree' => TRUE,
    //'#theme' => array('gitbucket_field'),
    //'#value_callback' => 'example_gitbucket_element_value_callback', // Default: form_type_{$element['#type']}_value
  );
  return $elements;
}

function example_gitbucket_element_process($element, $form_state, $complete_form) {

  $element['gitbucket']['source'] = array(
    '#type' => 'select',
    '#empty_option' => '- ' . t('Source') . ' -',
    '#options' => array(
      'github' => 'github://',
      'bitbucket' => 'bitbucket://',
    ),
    '#required' => $element['#required'],
    '#title' => t('Repository Source'),
    '#title_display' => 'invisible',
    '#theme_wrappers' => array(),
  );

  if (isset($element['#default_value']['gitbucket']['source'])) {
    $element['gitbucket']['source']['#default_value'] = $element['#default_value']['gitbucket']['source'];
  }

  $element['gitbucket']['address'] = array(
    '#type' => 'textfield',
    '#size' => 50,
    '#required' => $element['#required'],
    '#title' => t('Repository Name'),
    '#title_display' => 'invisible',
    '#theme_wrappers' => array(),
    '#attributes' => array('placeholder' => 'username/repository'),
  );

  if (isset($element['#default_value']['gitbucket']['address'])) {
    $element['gitbucket']['address']['#default_value'] = $element['#default_value']['gitbucket']['address'];
  }

  return $element;
}

function example_theme() {
  return array(
    'gitbucket_field' => array(
      'render element' => 'element',
    ),
  );
}

function theme_select($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array('id', 'name', 'size'));
  _form_set_class($element, array('form-select'));

  return '<select' . drupal_attributes($element['#attributes']) . '>' . form_select_options($element) . '</select>';
}

/**
 * Value callbacks should be divided into three conditions:
 * - Input is being provided directly. This happens when a form is submitted.
 * - No input is provided, but the field definition has a default value.
 * - No input is provided and there is no default value.
 */

function theme_gitbucket_field($variables) {
  $element = $variables['element'];
  $output = '';
  $output .= drupal_render($element['gitbucket']['source']);
  $output .= " "; // This space forces our fields to have a little room in between.
  $output .= drupal_render($element['gitbucket']['address']);
  return $output;
}

// Specifies the name of a custom value function that implements how user input is mapped to an element's #value property.

function example_gitbucket_element_value_callback($element, $input = FALSE, &$form_state) {
  if ($input !== FALSE) {
    if ($input['gitbucket']['source'] && !$input['gitbucket']['address']) {
      $input['gitbucket']['source'] = '';
    }
    if ($input['gitbucket']['address'] && !$input['gitbucket']['source']) {
      $input['gitbucket']['address'] = '';
    }
    return $input;
  }
  elseif (!empty($element['#default_value'])) {
    return $element['#default_value'];
  }

  return;
}

// =============================================================================
// Usage

function example_form() {
  $form = array();
  $form['required_field'] = array(
    '#type' => 'gitbucket',
    '#title' => t('Your favorite repository'),
    '#required' => TRUE,
    '#default_value' => variable_get('required_field', array()),
  );
  $form['optional_field'] = array(
    '#type' => 'gitbucket',
    '#title' => t('Your least favorite repository'),
    '#default_value' => variable_get('optional_field', array()),
  );
  return system_settings_form($form);
}
