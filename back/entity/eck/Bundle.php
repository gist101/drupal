<?php

// Create new bundle for a eck entity type in code.
$bundle = new Bundle();
$bundle->name = 'store';
$bundle->label = 'Store';
$bundle->entity_type = 'commerce_store';
$bundle->save();
