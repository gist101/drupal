<?php

dsm(node_type_get_base(node_load(10)));
dsm(node_load(10));
dsm(_node_types_build());

// @see node_save().
// @see node_invoke().
// @see hook_node_info().


// ----------------------------------------------------------------------------
// Use hook_node_info_alter() provided by features.module to change base to the feature module.

