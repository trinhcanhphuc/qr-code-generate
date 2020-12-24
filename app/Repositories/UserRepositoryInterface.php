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

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  public function create(array $data);
}
