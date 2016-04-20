<?php

views_get_view($name, $reset = FALSE);

// Hooks

// @api http://drupal7.api/api/views/views.api.php/function/hook_views_post_execute/7.x-3.x
hook_views_post_execute(&$view);


// @howto http://mydrupalblog.lhmdesign.com/embed-drupal-views-using-php

$view = views_get_view('VIEWNAME');
$args = array(ARGUMENTS);
print $view->preview('block_1', $args);

