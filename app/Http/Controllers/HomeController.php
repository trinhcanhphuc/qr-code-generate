<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QRCodeService;
use App\Services\QRCodeServices\RenderQRCode;

class HomeController extends Controller
{
  public function index()
  {
    $imgSrc = QRCodeService::RenderQRCode(
      'url',
      [
        'content' => request()->getHttpHost(),
        'back_color' => 1,
        'fore_color' => 1
      ],
      'png');

    return view('home.index', [
      'imgSrc' => $imgSrc
    ]);
  }
}
