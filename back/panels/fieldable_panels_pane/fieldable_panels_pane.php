<?php

// !!! When I try to look render info on panels page.

// MODULE_preprocess_panels_pane().
// MODULE_preprocess_fieldable_panels_pane().

// Known Pane Types:
// * entity_field
// * fieldable_panels_pane
$vars['pane']->type;


function kpane_preprocess_fieldable_panels_pane(&$vars) {
  // Same object
  dsm($vars['elements']['#element']);
  dsm($vars['elements']['#fieldable_panels_pane']);


}


// Theme Hook

'panels_pane';
'panels_pane__fieldable_panels_pane';

'fieldable_panels_pane';
'fieldable_panels_pane__BUNDLE';


//


// =============================================================================
// Bundle in Code

function MODULE_entity_info_alter(&$entity_info) {
  $entity_info['fieldable_panels_pane']['bundles']['my_bundle_name'] = array(
    'label' => t('My bundle name'),
    'pane category' => t('My category name'),
    'pane top level' => FALSE, // set to true to make this show as a top level icon
    'pane icon' => '/path/to/custom/icon/for/this/pane.png',
    'admin' => array(
      'path' => 'admin/structure/fieldable-panels-panes/manage/%fieldable_panels_pane_type',
      'bundle argument' => 4,
// Note that this has all _ replaced with - from the bundle name.
      'real path' => 'admin/structure/fieldable-panels-panes/manage/my-bundle-name',
      'access arguments' => array('administer fieldable panels panes'),
    ),
  );
}
