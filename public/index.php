<?php

declare(strict_types=1);


use App\Controllers\HomeController;
use App\Exceptions\RouteNotFoundException;
use App\Router;

require __DIR__ . '/../vendor/autoload.php';

define('ROOT_DIR', dirname(__DIR__));
define('VIEW_PATH', __DIR__ . '/../views');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();
$router->get("/", HomeController::class, 'index')
  ->post("/", HomeController::class, "upload");

$requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
$requestUri = $_SERVER['REQUEST_URI'];

try {
  $router->resolve($requestMethod, $requestUri);
} catch (RouteNotFoundException $e) {
  echo $e->getMessage();
}
