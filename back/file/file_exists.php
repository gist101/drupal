<?php

You could just use the old bog standard PHP function file_exists() if I understand you right:

$uri = 'public://images/an-image.jpg';
if (file_exists($uri)) {
  // Do something
}
This also works for normal (absolute) paths as well, e.g.:

$path = '/var/www/drupal/sites/default/files/images/an-image.jpg';
if (file_exists($path)) {
  // Do something
}
