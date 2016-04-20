<?php

/*-----
breadcrumb:
class: Drupal\Core\Breadcrumb\BreadcrumbManager
    arguments: ['@module_handler']
    tags:
      - { name: service_collector, tag: breadcrumb_builder, call: addBuilder }
---*/

/*----
string_translation:
  class: Drupal\Core\StringTranslation\TranslationManager
  arguments: ['@language.default']
  tags:
    - { name: service_collector, tag: string_translator, call: addTranslator }
----*/