<?php

// =============================================================================
// Workflow

// Call the node specific callback (if any). This can be
// node_invoke($node, 'insert') or
// node_invoke($node, 'update').
node_invoke($node, $op);

// Save fields.
$function = "field_attach_$op";
$function('node', $node);

module_invoke_all('node_' . $op, $node);
module_invoke_all('entity_' . $op, $node, 'node');

