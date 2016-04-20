<?php

$form['archive_fieldset'] = array(
  '#type' => 'fieldset',
  '#title' => t('Archive settings'),
);

// Use #parent to make your own values structure

// Archive functionality
$form['archive_fieldset'] = array(
  '#type' => 'fieldset',
  '#title' => t('Archive settings'),
  '#parents' => array('field', 'settings'),
);
// This would be field['settings']['archive']
$form['archive_fieldset']['archive'] = array(
  '#type' => 'checkbox',
  '#title' => t('Enable archive functionality'),
  '#description' => t('Archive the whole package items into an archive file.'),
  '#default_value' => $settings['archive'],
  '#disabled' => $has_data,
);
$form['archive_fieldset']['archive_scheme'] = array(
  '#type' => 'radios',
  '#title' => t('Scheme'),
  '#destination' => t('Storage destination for archive'),
  '#options' => \Drupal\ko\File::schemeOptions(),
  '#default_value' => $settings['archive_scheme'],
  '#disabled' => $has_data,
);
