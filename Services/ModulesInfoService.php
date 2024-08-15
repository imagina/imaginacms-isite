<?php

namespace Modules\Isite\Services;

use Illuminate\Support\Str;

class ModulesInfoService
{
  public $modules;

  public function __construct()
  {
    $this->modules = app('modules');
  }

  /**
   * Return the info of all enabled modules
   *
   * @return array
   */
  public function getInfo()
  {
    $response = [];
    $enabledModules = $this->modules->allEnabled();

    foreach ($enabledModules as $module) {
      $moduleName = $module->getName();
      $response[] = [
        'name' => $moduleName,
        'title' => trans($module->getLowerName() . "::" . strtolower($module->getLowerName()) . ".name"),
        'path' => "Modules\\{$moduleName}",
        'entities' => $this->getModuleEntities($moduleName)
      ];
    }

    return $response;
  }

  /**
   * Return the module's entities with its info from module name
   *
   * @param $moduleName
   * @return array
   */
  public function getModuleEntities($moduleName)
  {
    $allFiles = \File::glob(base_path("Modules/{$moduleName}/{$this->getModuleEntitiesPath($moduleName)}"));
    $entities = [];

    foreach ($allFiles as $entity) {
      $entityName = pathinfo($entity, PATHINFO_FILENAME);
      //Ignore the translation entities
      if (!$this->isTranslationEntity($entityName)) {
        $entityPath = str_replace("/", "\\", str_replace(".php", "", explode("icms/", $entity)[1]));
        $model = $this->instanceClassFormPath($entityPath);

        $entities[] = [
          "name" => $entityName,
          "pluralName" => Str::plural($entityName),
          "path" => $entityPath,
          "isSoftDeleteEnable" => $this->existTrait('softDelete', $model),
          "isRevisionableEnable" => $this->existTrait('revisionable', $model)
        ];
      }
    }

    return $entities;
  }

  /**
   * Return the entities folder path by moduleName
   *
   * @param $moduleName
   * @return string
   */
  public function getModuleEntitiesPath($moduleName)
  {
    switch (strtolower($moduleName)) {
      case 'user':
        return "Entities/Sentinel/*.php";
        break;
      default:
        return "Entities/*.php";
    }
  }

  /**
   * Validate if the className (entity) is translation entity
   *
   * @param $className
   * @return bool
   */
  public function isTranslationEntity($className)
  {
    $translationLabel = "Translation";
    return ($className != $translationLabel) && str_ends_with($className, $translationLabel) ? true : false;
  }

  /**
   * Instance and return a class from a path(string)
   *
   * @param $path
   * @return null
   */
  public function instanceClassFormPath($path)
  {
    try {
      return app($path);
    } catch (\Exception $e) {
      return null;
    }
  }

  /**
   * Validate is a trait exist in a entity
   *
   * @param $traitName
   * @param $model
   * @return bool|mixed
   */
  public function existTrait($traitName, $model)
  {
    if (!$model) return false;

    switch ($traitName) {
      case 'softDelete':
        return method_exists($model, "isSoftDeleting") ? $model->isSoftDeleting() : false;
        break;
      case 'revisionable':
        return method_exists($model, "revisions");
        break;
      default:
        return false;
    }
  }
}
