<?php

namespace App\Services\QrCodeServices;

use App\Services\QrCodeService;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\DB;
use App\Repositories\QrResultRepositoryInterface;

/**
 * @property string image_name
 * @property string format
 */
class SaveUserQrResult extends QrCodeService implements ServiceInterface
{
  public function __construct(
    QrResultRepositoryInterface $repo,
    int $user_id,
    string $image_name,
    string $image_format,
    array $form_data
    ) {
      $this->repo = $repo;
      $this->user_id = $user_id;
      $this->image_name = $image_name;
      $this->image_format = $image_format;
      $this->form_data = $form_data;
  }

  public function execute()
  {
    DB::beginTransaction();
    $execute_result = $this->repo->create([
      'user_id' => $this->user_id,
      'name' => $this->image_name,
      'type' => $this->image_format,
      'form_data' => json_encode($this->form_data)
    ]);
    DB::commit();
    return $execute_result;
  }
}
