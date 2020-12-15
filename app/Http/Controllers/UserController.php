<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Services\UserService;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Repositories\QrResultRepository;

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
  }

  public function history()
  {
    $qr_results = UserService::GetQrResults(
      App::make(UserRepository::class),
      App::make(QrResultRepository::class),
      Auth::user()->id
    );
    return [
      'qr_results' => $qr_results
    ];
  }

  public function delete_qr_result(int $qr_result_id)
  {
    UserService::DeleteQrResult(
      App::make(UserRepository::class),
      App::make(QrResultRepository::class),
      Auth::user()->id,
      $qr_result_id
    );
    return true;
  }
}