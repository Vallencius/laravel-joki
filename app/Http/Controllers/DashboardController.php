<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Siswa;

class DashboardController extends Controller
{
    public function index(){
        $jml_siswa = Siswa::getJumlahSiswaPerTahun();
        return view('dashboards.index', compact('jml_siswa'));
    }
} 
