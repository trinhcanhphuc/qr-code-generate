<?php

namespace App\Services\UserServices;

use App\Services\UserService;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\QrResultRepositoryInterface;

/**
 * @property int user_id
 */
class DeleteQrResult extends UserService implements ServiceInterface
{
  public function __construct(
    UserRepositoryInterface $user_repo,
    QrResultRepositoryInterface $qr_result_repo,
    int $user_id,
    int $qr_result_id
    ) {
      $this->user_repo = $user_repo;
      $this->qr_result_repo = $qr_result_repo;
      $this->user_id = $user_id;
      $this->qr_result_id = $qr_result_id;
  }

  public function execute()
  {
    DB::beginTransaction();
    $execute_result = $this->qr_result_repo->deleteByIdAndUserId($this->qr_result_id, $this->user_id);
    DB::commit();
    return $execute_result;
  }
}
