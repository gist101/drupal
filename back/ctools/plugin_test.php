<?php

ctools_include('plugins');
dsm(ctools_get_plugins('kpane', 'kpane'));
$function = ctools_plugin_load_function('kpane', 'kpane', 'heading', 'bundle info');
dsm($function());
