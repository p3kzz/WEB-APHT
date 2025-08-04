<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\LaporanKeuangan;
use App\Models\Produksi;
use App\Models\TenantModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dataLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $tenant = TenantModel::where('users_id', $userId)->first();

        $laporanProduksi = collect();
        $laporanKeuangan = collect();

        if (!$tenant) {
            return redirect()->back()->withErrors(['error' => 'Data tenant tidak ditemukan untuk pengguna ini.']);
        }
        $laporanProduksi = Produksi::where('tenant_id', $tenant->id)->get();
        $laporanKeuangan = LaporanKeuangan::where('tenant_id', $tenant->id)
            ->with('produksi')
            ->get();

        return view('tenan.dataLaporan', compact('laporanProduksi', 'laporanKeuangan'));
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
