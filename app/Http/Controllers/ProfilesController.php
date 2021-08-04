<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(Profile $profile): Profile
    {
        return $profile;
    }
}
