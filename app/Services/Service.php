<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Exceptions\ServiceException;
use Symfony\Component\HttpFoundation\Response;

class Service
{
  const STATUSES = [
    'success' => 'SUCCESS',
    'failed' => 'FAILED'
  ];

  protected static $namespace = '\\App\\Services';
  protected static $service = null;

  public static function __callstatic($function, $arguments)
  {
    $class = sprintf(
      '%s\\%s\\%s',
      self::$namespace,
      static::$service,
      ucfirst($function)
    );

    try {
      $service = new \ReflectionClass($class);
    } catch (\Exception $e) {
      report($e);
      throw new ServiceException('not found service', 9999);
    }

    $params = [];
    foreach ($arguments as $arg) {
      if ($arg instanceof ServiceInterface) {
        $params[] = get_class($arg);
      } else {
        $params[] = $arg;
      }
    }

    Log::info(sprintf('[Start Service] %s', $class), $params);

    try {
      $result = $service->newInstanceArgs($arguments)->execute();
    } catch (\Exception $e) {
      $result = Service::get_http_response(
        SERVICE::STATUSES['failed'],
        $e->getMessage(),
        Response::HTTP_EXPECTATION_FAILED
      );
    }

    Log::info(sprintf('[End Service] %s', $class));

    return $result;
  }

  public static function get_http_response(string $status = null, $data = null, $response){
    return response()->json([
      'status' => $status, 
      'data' => $data,
    ], $response);
  }

  public static function get_user_token($user, string $token_name = null) {
    return $user->createToken($token_name)->accessToken; 
  }
}
