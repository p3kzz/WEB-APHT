<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\TenantModel; // Pastikan ini di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class DataPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        // Cari data tenant berdasarkan ID pengguna yang login
        $tenant = TenantModel::where('users_id', $userId)->first();

        // Inisialisasi koleksi pengajuan kosong
        $pengajuan = collect();

        // Jika tenant ditemukan, ambil data pengajuan yang terkait dengan tenant tersebut
        if ($tenant) {
            $pengajuan = Pengajuan::where('tenant_id', $tenant->id)->get();
        } else {
            // Opsional: Anda bisa menambahkan logika untuk menangani jika tenant tidak ditemukan
            // Misalnya, redirect atau tampilkan pesan error
            // return redirect()->back()->withErrors(['error' => 'Data tenant tidak ditemukan untuk pengguna ini.']);
        }

        // Teruskan data pengajuan ke view
        return view('tenan.dataUnitUsaha', compact('pengajuan'));
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
