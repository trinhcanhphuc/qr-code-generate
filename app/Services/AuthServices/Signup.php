<?php

namespace App\Services\AuthServices;

use App\Models\User;
use App\Services\AuthService;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * @property array register_profile
 */
class Signup extends AuthService implements ServiceInterface
{
  public function __construct(
    UserRepositoryInterface $repo,
    array $register_profile
    ) {
      $this->repo = $repo;
      $this->register_profile = $register_profile;
  }

  public function execute()
  {
    $user = $this->repo->create($this->register_profile); 
    $success = [
      'token' => $this->get_user_token($user, 'TestToken'),
      'name' => $user->name
    ];

    return $this->get_http_response(
      'success',
      $success,
      Response::HTTP_CREATED );
  }
}