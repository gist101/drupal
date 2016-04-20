<?php

// http://drupal.stackexchange.com/questions/164612/how-do-i-remove-a-configuration-object-from-the-active-configuration

// Delete an active config object
Drupal::configFactory()->getEditable('field.storage.node.your_field_name')->delete();

