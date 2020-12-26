<?php

namespace App\Services\AuthServices;

use App\Services\Service;
use App\Services\AuthService;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * @property string email
 * @property string password
 */
class Login extends AuthService implements ServiceInterface
{
  public function __construct(
    string $email,
    string $password
    ) {
      $this->email = $email;
      $this->password = $password;
  }

  public function execute()
  {
    $auth = auth()->attempt(
      [
        'email' => $this->email,
        'password' => $this->password
      ]
    );

    if (!$auth)
      return $this->get_http_response(
        Service::STATUSES['failed'],
        null,
        Response::HTTP_UNAUTHORIZED
      );

    $user = Auth::user(); 
    $token['token'] = $this->get_user_token($user, 'TestToken');
    return $this->get_http_response(
      Service::STATUSES['success'],
      $token,
      Response::HTTP_OK
    );
  }
}
