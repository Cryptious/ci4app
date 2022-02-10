<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Coba extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => "coba"
        ];

        return view('cobacoba', $data);
    }
}
