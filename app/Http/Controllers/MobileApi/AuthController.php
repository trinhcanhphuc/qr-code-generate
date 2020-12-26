<?php

namespace App\Http\Controllers\MobileApi;

use Validator;
use App\Services\AuthService;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\App;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller; 


class AuthController extends Controller 
{
  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [ 
      'email' => 'required|email', 
      'password' => 'required'
    ]);

    if ($validator->fails()) { 
      return response()->json([ 'error'=> $validator->errors() ]);
    }

    return AuthService::login(
      $request->email,
      $request->password
    );
  }

  public function signup(Request $request) 
  { 
    $validator = Validator::make($request->all(), [ 
      'name' => 'required', 
      'email' => 'required|email', 
      'password' => 'required', 
      'password_confirmation' => 'required|same:password', 
    ]);

    if ($validator->fails()) { 
      return response()->json([ 'error'=> $validator->errors() ]);
    }

    return AuthService::signup(
      App::make(UserRepository::class),
      $request->all()
    );
  }
}