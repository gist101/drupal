<?php

// @doc http://kalaxy7.api/api/kalaxy/includes!theme.inc/function/theme_table/kalaxy-7.x
// @see theme_table().

$vars = array(
  'header' => array(
    array(
      'data' => t(''),
      'field' => '',
      'sort' => '',
      'HTML Attributes' => '',
    ),
    array()
  ),
  'rows' => array(
    array(
      'data' =>
    ),
  ),
  'attributes' => array(),
  'caption' => t(''),
  'colgroups' => array(),
);

$rows = array(
  // Simple row
  array(
    'Cell 1', 'Cell 2', 'Cell 3'
  ),
  // Row with attributes on the row and some of its cells.
  array(
    'data' => array('Cell 1', array('data' => 'Cell 2', 'colspan' => 2)), 'class' => array('funky')
  )
);

$output = theme('table', $vars);

