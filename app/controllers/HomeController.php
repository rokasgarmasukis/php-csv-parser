<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class HomeController
{

  public function index(): void
  {
    View::make('home/index');
  }

  public function upload(): string
  {
    return "upload";
  }
}
