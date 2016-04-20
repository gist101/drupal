<?php

$theme ['panels_pane'] = array(
  'variables' => array('output' => array(), 'pane' => array(), 'display' => array()),
  'path' => drupal_get_path('module', 'panels') . '/templates',
  'template' => 'panels-pane',
);

// Styles Plugin 'render pane'

/**
 * Implements hook_preprocess_REGISTRY().
 */
function hook_preprocess_panels_pane(&$vars) {
  dpm($vars);
}

$vars = array(

);

// CSS Classes
//
// panel-pane
// pane-[plugin]
// pane-[subtype]

// 'theme_hook_suggestions'

// panels_pane__[Plugin Name]__[Subtype]

panels_pane__field_item
panels_pane__field_item__field_item_ware_heading

panels_pane__field_item
panels_pane__field_item__node_ware_heading

panels_pane__entity_field
panels_pane__entity_field__node_ware_uiid


panels_pane__panels_ipe
panels_pane__panels_ipe__panels_ipe
