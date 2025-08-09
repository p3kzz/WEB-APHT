<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\LaporanKeuangan;
use App\Models\Produksi;
use App\Models\TenantModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class laporanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $tenant = TenantModel::where('users_id', $userId)->first();

        if (!$tenant) {
            return back()->withErrors(['error' => 'Data tenant tidak ditemukan.']);
        }

        $produksiList = Produksi::where('tenant_id', $tenant->id)
            ->with('laporanKeuangan') // Eager load laporan keuangan
            ->orderBy('tanggal_produksi', 'desc')
            ->get();

        return view('tenan.laporanKeuangan', compact('produksiList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();
        $tenant = TenantModel::where('users_id', $userId)->first();

        if (!$tenant) {
            return back()->withErrors(['error' => 'Data tenant tidak ditemukan.']);
        }

        // Mengambil semua produksi untuk tenant saat ini
        $produksiList = Produksi::where('tenant_id', $tenant->id)
            ->orderBy('tanggal_produksi', 'desc')
            ->get();

        return view('tenan.laporanKeuangan', compact('produksiList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produksi_id' => 'required|exists:produksi,id', // Validasi untuk memastikan produksi_id ada
            'keterangan' => 'required|in:Pemasukan,pengeluaran,labarugi',
            'jumlah' => 'required|integer|min:0',
            'deskripsi' => 'required|string|max:500',
        ]);

        $userId = Auth::id();
        $tenant = TenantModel::where('users_id', $userId)->first();
        if (!$tenant) {
            return back()->withErrors(['error' => 'Data tenant tidak ditemukan untuk pengguna ini. Harap lengkapi profil tenant Anda terlebih dahulu.'])->withInput();
        }

        // Temukan produksi berdasarkan ID yang dikirim dari form
        $produksi = Produksi::where('id', $request->produksi_id)
            ->where('tenant_id', $tenant->id)
            ->first();

        if (!$produksi) {
            return back()->withErrors(['error' => 'Produksi tidak ditemukan atau tidak valid.'])->withInput();
        }

        LaporanKeuangan::create([
            'tenant_id' => $tenant->id,
            'produksi_id' => $produksi->id,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'tanggal_produksi' => $produksi->tanggal_produksi,
        ]);

        return redirect()->route('tenant.laporankeuangan.index')->with('success', 'Laporan keuangan berhasil ditambahkan!');
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
