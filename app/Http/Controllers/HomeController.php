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
        'content' => 'https://www.facebook.com',
        'logo' => public_path('images/logos/fb.png')
      ],
      'png');

    return view('home.index', [
      'imgSrc' => $imgSrc
    ]);
  }
}
