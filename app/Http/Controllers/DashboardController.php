<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\User;
use App\Parkir;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function counter()
    {
        $mahasiswa_counts = Mahasiswa::count();
        $user_counts = User::count();
        $parkir_counts = Parkir::count();
        return view('dashboard', compact('mahasiswa_counts','user_counts','parkir_counts'));
    }
}
