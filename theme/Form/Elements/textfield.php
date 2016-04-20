<?php

// All
$form['ALL'] = array(
  '#type' => 'textfield',
  '#access' => TRUE,
  '#after_build' => array(),
  '#ajax' => array(),
  '#array_parents' => array(), // The real form structure parents array.
  '#attached' => array(),
  '#attributes' => array(),
  '#autocomplete_path' => '',
  '#description' => t(''),
  '#disabled' => FALSE,
  '#element_validate' => array(),
  '#field_prefix' => '',
  '#field_suffix' => '',
  '#maxlength' => 255,
  '#parents' => array(), // Affect $form_state['values'] structure
  '#post_render' => array(),
  '#prefix' => '',
  '#pre_render' => array(),
  '#process' => array(),
  '#required' => FALSE,
  '#size' => 80,
  '#states' => array(),
  '#suffix' => '',
  '#theme' => '',
  '#theme_wrappers' => array(),
  '#title' => t(''),
  '#title_display' => 'before', // before, after, invisible, attribute
  '#tree' => FALSE,
  '#value_callback' => 'CALLBACK',
  '#weight' => 0,
);

$form['EXAMPLE'] = array(
  '#type' => 'textfield',
  '#title' => t(''),
  '#description' => t(''),
);

$form['EXAMPLE'] = array(
  '#type' => 'textfield',
  '#title' => t(''),
  '#description' => t(''),
  '#size' => 10,
);
