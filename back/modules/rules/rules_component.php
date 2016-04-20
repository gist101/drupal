<?php

// @doc https://www.drupal.org/node/1967786

// @func rules_invoke_event().
// @func rules_invoke_component().

/*
You have to place this code in an appropriate hook.
Eg:- If you want to schedule the rule component when cron is run, you place this code in hook_cron().
  Or if you want it when a node is insert, then in hook_node_insert()
*/

// This only get run when cron is run.
function rules_component_schedule() {
  $component = 'machine_name_of_the_component';
  $task_identifier = 'a_unique_task_identifier';
  rules_action('schedule', array('component' => $component))->executeByArgs(array(
    'date' => $timestamp,
    'identifier' => $task_identifier,
    // Add component parameters, prefixed with 'param_'
    'param_x' => $x,
    'param_y' => $y,
  ));
}

// Execute immediately.
function rules_component_invoke() {
  $component = 'rules_abc';
  rules_invoke_component($component, $arg1, $arg2, $arg3);
}
