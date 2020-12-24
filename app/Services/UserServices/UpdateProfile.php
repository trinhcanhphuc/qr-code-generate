<?php

namespace App\Services\UserServices;

use App\Models\User;
use App\Services\UserService;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * @property array user_profile
 */
class UpdateProfile extends UserService implements ServiceInterface
{
  public function __construct(
    UserRepositoryInterface $repo,
    array $user_profile
    ) {
      $this->repo = $repo;
      $this->user_profile = $user_profile;
  }

  public function execute()
  {
    $res = $this->repo->updateById(Auth::user()->id, $this->user_profile);

    if ($res) {
      return $this->get_http_response(
        'success',
        null,
        Response::HTTP_OK
      );
    }
    else {
      return $this->get_http_response(
        'success',
        null,
        Response::HTTP_UNAUTHORIZED
      );
    }
  }
}
