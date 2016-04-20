<?php

// Create new pane and configure content and visibility settings
$new_pane = panels_new_pane('custom','custom',TRUE);
if ($new_pane) {
  // Set up content for new custom content pane
  $new_pane->configuration['admin_title'] = t(‘This is an example pane’);
  $new_pane->configuration['body'] = '<p>' . t('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') . '</p>';

  // Set up path visibility rule for new custom content pane
  ctools_include('context');
  $plugin = ctools_get_access_plugin('path_visibility');
  $plugin = ctools_access_new_test($plugin);
  $plugin['settings']['paths'] = 'example-page';
  $new_pane->access['plugins'][] = $plugin;

  $query = db_select('page_manager_handlers', 'pmh')
    ->fields('pmh', array('conf'))
    ->condition('pmh.name', 'site_template_panel_context_N');
  $result = $query->execute()->fetchColumn();
  $conf = unserialize($result);

  // Load the panel display to add the new pane.
  $did = $conf['did'];
  if (is_numeric($did)) {
    $display = panels_load_display($did);
    if($display) {
      $display->add_pane($new_pane, 'sidebar_blocks');
      panels_save_display($display);
    }
  }
  else {
    drupal_set_message(t('Incorrect reference to panels display'), 'warning', FALSE);
    watchdog('hcl_campaign', 'did passed to panels_load_display is not int - @did.', array('@did' => $did));
  }
}
else {
  drupal_set_message(t('Failed to create new pane.'), 'warning', FALSE);
}
