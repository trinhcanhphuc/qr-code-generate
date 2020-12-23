<?php

namespace App\Services\SessionServices;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\ApiTokenCookieFactory;

class LoginService
{
  public function __construct(
    Auth $auth,
    Validator $validator,
    UserRepositoryInterface $repo,
    ApiTokenCookieFactory $cookie,
    Response $response,
    string $login_info,
    string $csrf_token
  ) {
    $this->auth = $auth;
    $this->cookie = $cookie;
    $this->response = $response;
    $this->validator = $validator;
    $this->repository = $repo;
    $this->login_info = $login_info;
    $this->csrf_token = $csrf_token;
  }

  public function validateLoginInfo($data)
  {
    return $this->validator->make($data, [
      'email' => 'required|email',
      'password' => 'required'
    ]);
  }

  public function execute()
  {
    try {
      $attempt = $this->attemptLogin($this->login_info, $this->csrf_token);

      if ($attempt) {
        $api_cookie = $this->cookie->make($this->auth->user()->getKey(), $this->csrf_token);

        return $this->response->success(
          $this->repository->skipPresenter(false)->currentUser()
        )->withCookie($api_cookie);
      } else {
        return $this->response->unauthorized('Incorrect login details');
      }
    } catch (ValidationException $e) {
      return $this->response->validateError($e->errors());
    }
  }

  public function attemptLogin($login_info, $csrf_token)
  {
    $validator = $this->validateLoginInfo($login_info);

    if ($validator->fails()) {
      throw new ValidationException($validator);
    }

    return $this->auth->attempt($login_info);
  }
}
