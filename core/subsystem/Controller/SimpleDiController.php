<?php namespace Gist\Core\SubSystem;

// Depends on ::create() factory method to apply DependencyInjection.

//
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
//
use Drupal\Core\Field\FieldTypePluginManagerInterface;

class SimpleDiController extends ControllerBase {

  protected $fieldTypePluginManager;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.manager.field.field_type')
    );
  }

  public function __construct(FieldTypePluginManagerInterface $field_type_plugin_manager) {
    $this->fieldTypePluginManager = $field_type_plugin_manager;
  }

}
