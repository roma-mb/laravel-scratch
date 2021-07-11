<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FetcDataVue extends Controller
{
    public function index(): array
    {
        return [
            'buttonName' => 'Name from API'
        ];
    }
}
