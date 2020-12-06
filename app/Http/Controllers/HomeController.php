<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */

  public function index()
  {
    $imgSrc = QRCodeService::RenderQRCode(
      'url',
      [
        'content' => 'https://www.facebook.com',
        'logo' => public_path('images/logos/fb.png')
      ],
      'png');

    return view('home', [
      'imgSrc' => $imgSrc
    ]);
  }

  public function sitemap()
  {
    return response(file_get_contents(resource_path('sitemap.xml')), 200, [
      'Content-Type' => 'application/xml'
    ]);
  }
}
