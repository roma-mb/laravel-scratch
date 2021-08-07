<?php

namespace App\Http\Controllers;

class FetcDataVue extends Controller
{
    public function index(): array
    {
        return [
            'buttonName' => 'Name from API',
        ];
    }
}
