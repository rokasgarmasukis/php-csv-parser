<?php
declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;

class Router
{

  private array $routes;

  private function register(string $method, string $route, string $controller, string $action)
  {
    $this->routes[$route][$method] = [$controller, $action];
  }

  public function get($route, $controller, $action): self
  {
    $this->register('get', $route, $controller, $action);

    return $this;
  }

  public function post($route, $controller, $action): self
  {
    $this->register('post', $route, $controller, $action);

    return $this;
  }

  public function resolve($method, $route)
  {
    if (!key_exists($route, $this->routes)){
      throw new RouteNotFoundException();
    }

    if (!key_exists($method, $this->routes[$route])){
      throw new RouteNotFoundException();
    }

    [$class, $action] = $this->routes[$route][$method];
    
    echo call_user_func_array([new $class(), $action], []);
  }
}
