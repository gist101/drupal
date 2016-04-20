<?php

// Entity class is like a client, Controller classes are like services.

// =============================================================================
// Entity info
// @see hook_entity_info().
// @see hook_entity_info_alter().
// @see entity_crud_hook_entity_info().
// @see entity_metadata_hook_entity_info().


// =============================================================================
// System + Entity API

// -----------------------------------------------------------------------------
// System API

$entity_info = array(
	'label' => t(''),
  'controller class' => 'DrupalDefaultEntityController',
  'base table' => '',
  'revision table' => '',
  'static cache' => TRUE,
  'field cache' => TRUE,
  'load hook' => '', // e.g. node_load(). @see DrupalDefaultEntityController:attachLoad().
  'uri callback' => '', // i.e. callback_entity_info_uri(). @see entity_uri().
  'label callback' => '', // i.e. callback_entity_info_label(). @see entity_label().
  'language callback' => '', // i.e. callback_entity_info_language(). @see entity_language().
  'fieldable' => FALSE,
  'translation' => array(), // ???
  'entity keys' => array(
	  'id' => '', // e.g. nid.
    'revision' => '', // e.g. vid.
    'bundle' => '', // e.g. type. Omit to be single.
    'label' => '', // e.g. title.
    'language' => '', // e.g. language.
  ),
  'bundle keys' => array(
  	'bundle' => '', // e.g. type.
  ),
  'bundles' => array(
    'BUNDLE_NAME' => array(
  	  'lable' => t(''),
  	  'uri callback' => '',
  	  'admin' => array( // ref. hook_menu().
	      'path' => '',
	      'bundle argument' => 0, // ?
	      'real path' => '',
	      'access callback' => '', // Omit to be user_access().
	      'access arguments' => array(''), 
      ),
  	),
  ),
  'view modes' => array(
    // There is always a 'default', but doesn't need to be set.
  	'VIEW_MODE' => array(
  	  'label' => t(''),
  	  'custom settings' => FALSE, // If show on Field UI Display.
    ),
  ),
);

// -----------------------------------------------------------------------------
// Entity API CRUD
// @see entity_crud_hook_entity_info().

$entity_info = array(
  'entity class' => 'Entity', // Extends it.
  // 'controller class' => 'EntityAPIController', 'EntityAPIControllerExportable'.
  'bundle of' => '',
  'module' => '',
  'exportable' => FALSE,
  'entity keys' => array(
	  'name' => '',
    'module' => 'module',
    'status' => 'status', // @see entity_has_status().
    'default revision' => 'default_revision', // ?
  ),
  // @see ctools export.
  'export' => array(
  	'default hook' => 'default_ENTITY_TYPE',
  ),
  // @see entity_ui_get_form().
  'admin ui' => array(
  	'path' => '',
    'controller class' => 'EntityDefaultUIController', // EntityContentUIController, EntityBundleableController.
    'file' => '',
    'file path' => '',
    'menu wildcard' => '%entity_object',
  ),
  // Integrate other modules.
  'rules controller class' => 'EntityDefaultRulesController', // FALSE to configuration entity.
  'metadata controller class' => 'EntityDefaultMetadataController',
  'extra fields controller class' => '', // EntityExtraFieldsControllerInterface, EntityDefaultExtraFieldsController. @see EntityAPIController::buildContent()
  'features controller class' => 'EntityDefaultFeaturesController',
  'i18n controller class' => FALSE, // EntityDefaultI18nStringController
  'views controller class' => 'EntityDefaultViewsController',
  'entity cache' => FALSE, // Should disable 'field cache' if enable this.
  // Operations: 'create', 'update', 'delete', 'view'. @see entity_metadata_hook_entity_info() for more.
  'access callback' => '', // @see entity_access(). @see entity_metadata_no_hook_node_access().
  'form callback' => '', // @see entity_form(). Or $info['admin ui']['controller class']. I think it try to backward compatible with Drupal core implementation entity
);

// -----------------------------------------------------------------------------
// Entity API Metadata
// @see entity_metadata_hook_entity_info().

$entity_info = array(
	'plural label' => t(''),
  'description' => t(''),
  'access callback' => '',
  'creation callback' => '',
  'save callback' => '',
  'deletion callback' => '',
  'revision deletion callback' => '',
  'view callback' => '', // e.g. entity_metadata_view_node().
  'form callback' => '',
  'token type' => '', // FALSE
  'configuration' => FALSE, // Export defaults TRUE.
);

// -----------------------------------------------------------------------------
// Entity API Combined

$entity_info = array(
  'label' => t(''),
  'plural label' => t(''),
  'description' => t(''),
);


// =============================================================================
// Callbacks

// -----------------------------------------------------------------------------
// Hooks

hook_entity_info();

hook_entity_info_alter(&$entity_info);

// -----------------------------------------------------------------------------
// Utility

$entity_info_all = entity_get_info();
dsm($entity_info_all);

dsm(entity_get_info());

//
$entity_info_node = entity_get_info('node');
dsm($entity_info_node);

//
dsm(entity_crud_get_info());
