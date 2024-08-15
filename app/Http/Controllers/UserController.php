<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $users = User::all();

    if ($users->isEmpty()) {
        return redirect()->back()->with('error', 'No users found.');
    }

    return view('users.index', compact('users'));
}

}
