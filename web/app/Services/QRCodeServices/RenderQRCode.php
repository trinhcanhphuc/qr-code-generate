<?php

namespace App\Services\QRCodeServices;

use App\Services\ServiceInterface;
use App\Services\QRCodeService;

class RenderQRCode extends QRCodeService implements ServiceInterface
{
  public function __construct(
    string $type,
    array $data,
    string $format = 'png'
  ) {
    $this->type = $type;
    $this->data = $data;
    $this->format = $format;
  }

  public function execute()
  {
    return $this->format;
  }
}
