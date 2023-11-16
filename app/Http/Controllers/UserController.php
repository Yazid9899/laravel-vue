<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['getAllUsers']]);
    }
    public function getAllUsers()
    {
        $users = User::all();
        return Inertia::render('Home', [
            $users
        ]);
    }
}
