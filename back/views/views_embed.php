<?php

// @module https://www.drupal.org/project/embed_views
// @doc https://www.drupal.org/node/1655012
// @doc https://www.drupal.org/node/1655014



// @qa http://drupal.stackexchange.com/questions/14103/how-do-i-embed-a-view-inside-a-node

// load the view
$view = views_get_view('machine_name_of_view');
// set active display on the view
$view->set_display('your_view_display_name');
// set any needed arguments
$view->set_arguments(array(arg(0),arg(1)));
// execute the view
$view->execute();
// display the results
print $view->render();

