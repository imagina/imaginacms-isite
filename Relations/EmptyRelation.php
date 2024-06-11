<?php

namespace Modules\Isite\Relations;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * 1. Define relation method in your model:
 *  > public function foo()
 *  > {
 *  >    return new EmptyRelation();
 *  > }
 *
 * 2. Create file app/Relations/EmptyRelation.php and paste code from this gist.
 *
 * 3. Do not forget to run artisan dump-autoload
 */
class EmptyRelation extends Relation
{
  public function __construct()
  {
  }

  /**
   * Set the base constraints on the relation query.
   *
   * @return void
   */
  public function addConstraints()
  {
  }

  /**
   * Add the constraints for a relationship count query.
   *
   * @param Builder $query
   * @param Builder $parent
   *
   * @return Builder
   */
  public function getRelationCountQuery(Builder $query, Builder $parent)
  {
    return $query;
  }

  /**
   * Set the constraints for an eager load of the relation.
   *
   * @param array $models
   *
   * @return void
   */
  public function addEagerConstraints(array $models)
  {
  }

  /**
   * Initialize the relation on a set of models.
   *
   * @param array $models
   * @param string $relation
   *
   * @return array
   */
  public function initRelation(array $models, $relation)
  {
    foreach ($models as $model) {
      $model->setRelation($relation, null);
    }

    return $models;
  }

  /**
   * Match the eagerly loaded results to their parents.
   *
   * @param array $models
   * @param Collection $results
   * @param string $relation
   *
   * @return array
   */
  public function match(array $models, Collection $results, $relation)
  {
    return $models;
  }

  /**
   * Get the results of the relationship.
   *
   * @return mixed
   */
  public function getResults()
  {
    return $this->get();
  }

  /**
   * Execute the query as a "select" statement.
   *
   * @param array $columns
   *
   * @return Collection
   */
  public function get($columns = ['*'])
  {
    return new Collection();
    #return $this->related->newCollection([]);
  }
}