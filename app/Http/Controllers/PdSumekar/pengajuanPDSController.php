<?php

namespace App\Http\Controllers\PdSumekar;

use App\Models\Pengajuan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pengajuanPDSController extends Controller
{
    public function index(){
        $pengajuan = Pengajuan::all();
        return view('pdSumekar.dataPengajuan', compact('pengajuan'));
    }
}
