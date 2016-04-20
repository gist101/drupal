<?php

// Get reversed relationship

// Test
$query = new EntityFieldQuery();
$query->fieldCondition('field_dir_category_parent', 'target_id', 4, '=');
//$query->fieldCondition('field_dir_category_parent', 'language', 'und');
$result = $query->execute();
dsm($result);

