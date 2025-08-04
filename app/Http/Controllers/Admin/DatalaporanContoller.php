<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tenant\laporanKeuanganController;
use App\Models\LaporanKeuangan;
use App\Models\Produksi;
use Illuminate\Http\Request;

class DatalaporanContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporanProduksi = Produksi::with('tenant.user')->get();
        $laporanKeuangan = LaporanKeuangan::with('tenant.user', 'produksi')->get();
        return view('admin.dataLaporan', compact('laporanProduksi', 'laporanKeuangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
