<?php

// ----------------------------------------------------------------------------
// Load Tree

// Load terms in a vocabulary.
$vocab = taxonomy_vocabulary_machine_name_load('ktype');
//dsm($vocab);
$types = taxonomy_get_tree($vocab->vid);
//dsm($types);


// ----------------------------------------------------------------------------
//


