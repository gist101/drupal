<?php

$caption = $item;
$icon = '';
$url = '';
$new_name = '';
if (strpos($caption, ':')) {
  list($url, $caption) = explode(':', $caption);
}
if (strpos($caption, ',')) {
  list($caption, $icon) = explode(',', $caption);
}
if (strpos($caption, '|')) {
  list($caption, $new_name) = explode('|', check_plain($caption));
}

// Format
// URL:CAPTION|NEW_NAME,ICON
