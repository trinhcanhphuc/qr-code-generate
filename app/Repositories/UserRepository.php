<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  public function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
    ]);
  }

  /**
   * Update an exist user instance
   *
   * @param  int $user_id
   * @param  array  $data
   * @return \App\Models\User
   */
  public function updateById(int $user_id, array $data)
  {
    return User::find($user_id)->update($data);
  }
}
