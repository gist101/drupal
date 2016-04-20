<?php

dsm(module_invoke_all('rules_data_info'));

hook_rules_data_info();
hook_rules_data_info_alter();
hook_rules_data_processor_info();
hook_rules_data_processor_info_alter();

