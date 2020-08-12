<?php

namespace App\Services;

use App\Exceptions\ServiceException;

class Service
{
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
    
    \Log::info(sprintf('[Start Service] %s', $class), $params);
    
    $result = $service->newInstanceArgs($arguments)->execute();
    
    \Log::info(sprintf('[End Service] %s', $class));
    
    return $result;
  }
}
