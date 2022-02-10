<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Belajar CI',
            'yaaa' => 'yayaya'
        ];
        return view('welcome_message', $data);
    }
}
