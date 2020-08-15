<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QRCodeService;
use App\Services\QRCodeServices\RenderQRCode;

class QRController extends Controller
{
  public function render(Request $request)
  {
    $imgSrc = QRCodeService::RenderQRCode(
      $request['type'],
      $request['data'],
      'png');

    return $imgSrc;
  }
}
