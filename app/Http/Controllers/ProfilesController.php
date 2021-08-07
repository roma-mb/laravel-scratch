<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class ProfilesController extends Controller
{
    public function show(Profile $profile): Profile
    {
        return $profile;
    }
}
