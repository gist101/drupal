<?php

use Drupal\Core\Menu\LocalTaskManagerInterface;

/**
 * @var LocalTaskManagerInterface
 */
$manager = \Drupal::service('plugin.manager.menu.local_task');
$manager->getLocalTasks('system.admin_content');
// dpm($manager->getLocalTasks('system.admin_content'));

