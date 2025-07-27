<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\TenantModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
     @param  \Illuminate\Http\Request  $request
    @return \Illuminate\Http\Response
 */

class DataUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenan.add-DataUsaha');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenan.add-DataUsaha');
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pengajuan' => 'required|date',
            'unit_usaha' => 'required|string',
            'file_pengajuan' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $userId = Auth::id();
        $tenant = TenantModel::where('users_id', $userId)->first();
        if (!$tenant) {
            return back()->withErrors(['error' => 'Data tenant tidak ditemukan untuk pengguna ini. Harap lengkapi profil tenant Anda terlebih dahulu.'])->withInput();
        }

        // Proses upload file
        $file = $request->file('file_pengajuan');
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('pengajuan', $fileName, 'public');

        Pengajuan::create([
            'tenant_id' => $tenant->id,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'unit_usaha' => $request->unit_usaha,
            'file_pengajuan' => $filePath,
            'deskripsi' => $request->deskripsi,
            'status' => 'pending',
            'komentar' => null,
        ]);

        return redirect()->route('tenant.dataPengajuan.index')->with('success', 'Pengajuan berhasil dikirim!');
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
