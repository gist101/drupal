<?php

/// @link https://www.drupal.org/node/2078241

/// After setting info, update the database.
\Drupal::entityTypeManager()->clearCachedDefinitions();
\Drupal::service('entity.definition_update_manager')->applyUpdates();
