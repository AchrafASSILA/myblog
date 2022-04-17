<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Profile extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }
}
