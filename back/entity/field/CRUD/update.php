<?php

// Update Instance
$instance = field_info_instance('fieldable_panels_pane', 'kpane_longtext', 'longtext');
$instance['settings']['text_processing'] = TRUE;
$instance['display']['default']['label'] = 'hidden';
field_update_instance($instance);
