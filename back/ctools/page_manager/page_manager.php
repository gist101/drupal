<?php

// ============================================================================
// Utility

// @api http://drupal7.api/api/ctools/page_manager%21page_manager.module/function/page_manager_get_current_page/7.x-1.x
page_manager_get_current_page($page = NULL);

$page = array(
  'name',
  'task',
  'subtask',
  'handler',
  'contexts',
  'arguments',
);

page_manager_page_get_arguments();
page_manager_page_get_contexts();
page_manager_page_get_named_arguments();
