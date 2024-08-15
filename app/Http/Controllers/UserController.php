<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Ambil semua pengguna dari database
        return view('users.index', compact('users')); // Kirim variabel $users ke view
    }
}
