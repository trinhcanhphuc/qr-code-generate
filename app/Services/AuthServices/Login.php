<?php

namespace App\Services\AuthServices;

use App\Services\AuthService;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * @property array credential
 */
class Login extends AuthService implements ServiceInterface
{
  public function __construct(
    array $credential
    ) {
      $this->credential = $credential;
  }

  public function execute()
  {
    if( auth()->attempt($this->credential) ){ 
      $user = Auth::user(); 
      $token['token'] = $this->get_user_token($user, 'TestToken');
      return $this->get_http_response(
        $token,
        Response::HTTP_OK
      );
    } else {
      return $this->get_http_response(
        Response::HTTP_UNAUTHORIZED
      );
    }
  }
}
