<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\QrCodeService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Repositories\QrResultRepository;


class QrController extends Controller
{
  public function render(Request $request)
  {
    $image_name = Str::random(128);

    $render_status = QrCodeService::RenderQrCode(
      $image_name,
      $request['type'],
      $request['form_data'],
      $request['fore_color'],
      $request['back_color'],
      $request['logo'],
      $request['format']);

    if ($render_status) {
      if (Auth::user()) {
        QrCodeService::SaveUserQrResult(
          App::make(QrResultRepository::class),
          Auth::user()->id,
          $image_name,
          $request['format'],
          $request['form_data']);
      }
      return '/qr_images/' . $image_name . '.' . $request['format'];
    }
  }
}
