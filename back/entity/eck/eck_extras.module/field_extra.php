<?php

function eck_extras_entity_info_alter(&$entity_info) {
  $eck_entity_types = eck_extras_get_entity_types(TRUE);
  foreach ($entity_info as $entity_type => $info) {
    if (in_array($entity_type, $eck_entity_types)) {
      $entity_info[$entity_type]['extra fields controller class'] = 'EntityDefaultExtraFieldsController';
    }
  }
}
