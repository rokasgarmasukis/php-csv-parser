<?php

declare(strict_types=1);

namespace App;

class View
{
  public static function make(string $view): void
  {
    $viewPath = VIEW_PATH . '/' . $view . '.php';

    ob_start();
    include $viewPath;
    echo ob_get_clean();
  }
}
