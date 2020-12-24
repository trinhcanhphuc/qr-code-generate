<?php

namespace App\Http\Controllers\MobileApi;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
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

  public function profile(Request $request)
  {
    $response =  Response::HTTP_OK;

    return UserService::UpdateProfile(
      App::make(UserRepository::class),
      [
        'email' => $request['email'],
        'name' => $request['name']
      ]
    );
  }

  public function history(int $page_number)
  {
    $qr_results = UserService::GetQrResults(
      App::make(UserRepository::class),
      App::make(QrResultRepository::class),
      Auth::user()->id
    )->orderBy('updated_at', 'desc')
    ->paginate(5, ['*'], 'page', $page_number);
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