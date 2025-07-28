<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Produksi;
use App\Models\TenantModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class laporanProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenan.laporanproduksi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenan.laporanProduksi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'biaya_produksi' => 'required|integer',
            'tanggal_produksi' => 'required|date',
            'jumlah' => 'required|integer'
        ]);
        $userId = Auth::id();
        $tenant = TenantModel::where('users_id', $userId)->first();
        if (!$tenant) {
            return back()->withErrors(['error' => 'Data tenant tidak ditemukan untuk pengguna ini. Harap lengkapi profil tenant Anda terlebih dahulu.'])->withInput();
        }
        Produksi::create([
            'tenant_id' => $tenant->id,
            'nama_produk' => $request->nama_produk,
            'biaya_produksi' => $request->biaya_produksi,
            'tanggal_produksi' => $request->tanggal_produksi,
            'jumlah' => $request->jumlah,
            'deskripsi' => null,
        ]);
        return redirect()->route('tenant.laporanproduksi.index')->with('success', 'Pengajuan berhasil dikirim!');
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
