<?php

namespace App\Repositories;

use App\Models\QrResult;

class QrResultRepository implements QrResultRepositoryInterface
{
  protected $model;

  public function __construct(QrResult $model)
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

  /**
   * getByUserId.
   *
   * @param int $user_id
   *
   * @return array objects
   */
  public function getByUserId(int $user_id)
  {
    return $this->model->where('user_id', $user_id)->get();
  }

  /**
   * create.
   *
   * @param array $param
   *
   * @return object
   */
  public function create(array $params)
  {
    return $this->model->create($params);
  }
}
