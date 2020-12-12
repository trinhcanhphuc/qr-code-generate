<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
  /**
   * getById.
   *
   * @param int $id
   *
   * @return object
   */
  public function getById(int $id);
}
