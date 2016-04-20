<?php

// For inline links:

// .inline.operations
// This will give inline operation links better style.

// .container-inline

$form['thumbnail']['grid'] = array(
  '#type' => 'fieldset',
  '#title' => t('Grid'),
  '#description' => t('Display how many items in one row.'),
  '#collapsible' => TRUE,
  '#collapsed' => TRUE,
  '#attributes' => array('class' => array('container-inline')),
);

$grids = array('lg', 'md', 'sm', 'xs');
// Full, Wide: 4, 4, 2, 1.
// 3/4, Narrow: 3, 3, 1, 1.
$settings_grid = kpane_settings_default_value($context, array('thumbnail', 'grid'), array(
  'lg' => 4,
  'md' => 4,
  'sm' => 2,
  'xs' => 1,
));
foreach ($grids as $size) {
  $form['thumbnail']['grid'][$size] = array(
    '#type' => 'textfield',
    '#title' => $size,
    '#size' => 2,
    '#default_value' => $settings_grid[$size],
  );
}
