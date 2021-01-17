<?php

namespace App\Http\Controllers\WebApi;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\QrResultRepository;

class FeedbackController extends Controller
{
  public function index()
  {
    return response()->json(Response::HTTP_OK);
    return response()->json(Response::HTTP_BAD_REQUEST);
  }
}