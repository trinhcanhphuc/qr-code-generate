<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
  protected $model;

  public function __construct(User $model)
  {
    $this->model = $model;
  }

  /**
   * getById.
   *
   * @param int $id
   *
   * @return object
   */
  public function getById(int $id)
  {
    return $this->model->find($id);
  }
}
