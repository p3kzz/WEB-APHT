<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\TenantModel; // Pastikan model ini ada dan benar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade untuk kemudahan

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Hapus parameter $id di sini
    {
        // Validasi data yang masuk dari request
        $request->validate([
            'tanggal_pengajuan' => 'required|date',
            'unit_usaha' => 'required|string',
            'file_pengajuan' => 'required|file|mimes:pdf,doc,docx|max:2048', // Tambahkan max size untuk keamanan
            'deskripsi' => 'required|string',
        ]);

        // Ambil ID pengguna yang sedang login
        $userId = Auth::id(); // Menggunakan Auth::id() untuk mendapatkan ID pengguna yang login

        // Cari data tenant berdasarkan ID pengguna yang login
        $tenant = TenantModel::where('users_id', $userId)->first();

        // Jika data tenant tidak ditemukan, kembalikan error
        if (!$tenant) {
            return back()->withErrors(['error' => 'Data tenant tidak ditemukan untuk pengguna ini. Harap lengkapi profil tenant Anda terlebih dahulu.'])->withInput();
        }

        // Proses upload file
        $file = $request->file('file_pengajuan');
        // Buat nama file unik untuk menghindari konflik
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // Simpan file ke direktori 'pengajuan' di disk 'public'
        // Pastikan 'public' disk sudah dikonfigurasi dengan benar di config/filesystems.php
        $filePath = $file->storeAs('pengajuan', $fileName, 'public');

        // Buat entri baru di tabel Pengajuan
        Pengajuan::create([
            'tenant_id' => $tenant->id, // Gunakan ID tenant yang ditemukan sebagai foreign key
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'unit_usaha' => $request->unit_usaha,
            'file_pengajuan' => $filePath,
            'deskripsi' => $request->deskripsi,
            'status' => 'pending', // Set status awal
            'komentar' => null, // Komentar awal null
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('tenant.dataUsaha.index')->with('success', 'Pengajuan berhasil dikirim!');
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
