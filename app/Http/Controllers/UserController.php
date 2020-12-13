<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function auth() {
    return Auth::user();
  }

  public function profile()
  {
    $user = Auth::user();
    $qr_results = $user->qr_results();

    return [
      'user' => $user,
      'qr_results' => $qr_results
    ];
  }
}