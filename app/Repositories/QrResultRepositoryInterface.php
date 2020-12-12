<?php

namespace App\Repositories;

interface QrResultRepositoryInterface
{
  /**
   * getById.
   *
   * @param int $id
   *
   * @return object
   */
  public function getById(int $id);

  /**
   * getByUserId.
   *
   * @param int $user_id
   *
   * @return object
   */
  public function getByUserId(int $user_id);
}
