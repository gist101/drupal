<?php

// Size:
// text 	tiny 	tinytext, 256 B 	text, unlimited 	text
// text 	small 	tinytext, 256 B 	text, unlimited 	text
// text 	medium 	mediumtext, 16 MB 	text, unlimited 	text
// text 	big 	longtext, 4 GB 	text, unlimited 	text
// text 	normal 	text, 16 KB 	text, unlimited 	text

$field['body'] = array(
  'description' => 'Body content',
  'type' => 'text',
  'size' => 'big',
  'not null' => FALSE,
);

