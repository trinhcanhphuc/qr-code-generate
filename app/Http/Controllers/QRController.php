<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QRCodeService;
use App\Services\QRCodeServices\RenderQRCode;
use Illuminate\Support\Str;

class QRController extends Controller
{
  public function render(Request $request)
  {
    $image_name = Str::random(128);
    return QRCodeService::RenderQRCode(
      $image_name,
      $request['type'],
      $request['form_data'],
      $request['fore_color'],
      $request['back_color'],
      $request['logo'],
      $request['format']);
  }
}
