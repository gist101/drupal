<?php

// @doc http://drupalmotion.com/article/time-ago-date-format-drupal
// @jquery-plugin http://timeago.yarp.com/
// @module https://www.drupal.org/project/timeago
// @js-lib http://momentjs.com/
// @module https://www.drupal.org/project/moment

// @see format_interval().


$timeago = format_interval(time() - $node->created, 1) . ' ' . t('ago');

