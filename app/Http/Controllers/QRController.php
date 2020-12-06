<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QRCodeService;
use App\Services\QRCodeServices\RenderQRCode;

class QRController extends Controller
{
  public function render(Request $request)
  {
    return QRCodeService::RenderQRCode(
      $request['type'],
      $request['form_data'],
      $request['fore_color'],
      $request['back_color'],
      $request['logo'],
      $request['format']);
  }
}
