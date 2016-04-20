<?php

// -----------------------------------------------------------------------------
// Globals

// Array of persistent variables stored in 'variable' table.
$conf;


// -----------------------------------------------------------------------------
// Utilities

variable_get($name, $defualt = NULL);
variable_set($name, $value);
variable_del($name);

conf_path();
