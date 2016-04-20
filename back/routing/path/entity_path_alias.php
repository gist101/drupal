<?php

$node = node_load(10);
$uri = entity_uri('node', $node);
dsm(drupal_get_path_alias($uri['path']));