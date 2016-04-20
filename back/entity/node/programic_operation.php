<?php

// ============================================================================
// Creation

$node = new stdClass(); // We create a new node object
$node->type = 'page'; // Or any other content type you want
$node->title = 'Page Placeholder';
$node->language = 'und';
$node->uid = 1;
$node->status = NODE_NOT_PUBLISHED;
$node = node_submit($node); // Prepare node for a submit
node_save($node); // After this call we'll get a nid

