<?php

namespace App\Http\Controllers;

use App\Charts\JumlahBarangChart;
use App\Models\Toko;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(JumlahBarangChart $jumlahBarangChart)
    {
        $data = Toko::all();
        return view('dashboard', compact('data'), ['jumlahBarangChart' => $jumlahBarangChart->build()]);
    }
}
