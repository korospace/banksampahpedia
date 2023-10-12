<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Banksampah extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Selamat Datang di Website Banksampah Pedia',
      'baseUrl' => base_url(),
    ];

    return view('Banksampah/index', $data);
  }
}
