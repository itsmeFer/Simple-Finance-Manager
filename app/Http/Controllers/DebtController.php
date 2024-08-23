<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DebtController extends Controller
{
    // Tambahkan metode index
    public function index()
    {
        // Kode untuk mengambil data hutang
        $debts = []; // Contoh array kosong, Anda bisa mengganti ini dengan query ke database

        return view('debts.index', compact('debts'));
    }
}
