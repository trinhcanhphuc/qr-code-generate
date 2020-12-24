<?php

namespace App\Http\Controllers\MobileApi;

use Validator;
use App\Models\User; 
use App\Services\AuthService;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\App;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth; 
use Symfony\Component\HttpFoundation\Response;


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

    $credential = [
      'email' => $request->email, 
      'password' => $request->password
    ];

    return AuthService::login(
      $credential
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