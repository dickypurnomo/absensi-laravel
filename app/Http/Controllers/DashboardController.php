<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user_name = auth()->user()->name;

        return view('dashboard.index', [
            "title" => "Dashboard",
            'active' => 'dashboard',
            'absensis' => Absensi::all(),
            'absensi_by_name' => Absensi::where('name', $user_name)->get(),
        ]);
    }

    public function reports()
    {
        $user_name = auth()->user()->name;

        return view('dashboard.reports.index', [
            "title" => "Dashboard | Reports",
            'active' => 'dashboard',
            'absensis' => Absensi::all(),
            'absensi_by_name' => Absensi::where('name', $user_name)->get(),
        ]);
    }
}
