<?php

// $node has nid, but no other hook_node_load() data.
// This hook is within DB transaction, so nid is just a pseudo number.
function hook_node_insert($node) {

}

// $node has updated form input data.
// hook_node_load() data kept the old status.
// It's within DB transaction, so use node_load() wont' help to get the new attached data.
function hook_node_update($node) {
  $node_new = node_load($node->nid, NULL, TRUE);
}
