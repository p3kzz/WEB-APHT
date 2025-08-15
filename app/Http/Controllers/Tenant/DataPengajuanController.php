<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\TenantModel; // Pastikan ini di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Support\Facades\Storage;

class DataPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $tenant = TenantModel::where('users_id', $userId)->first();
        $pengajuan = collect();
        $unreadNotifications = collect();

        if ($tenant) {
            $pengajuan = Pengajuan::where('tenant_id', $tenant->id)->paginate(10);
            $user = Auth::user();
            $unreadNotifications = $user->unreadNotifications;
        } else {
            return redirect()->back()->withErrors(['error' => 'Data tenant tidak ditemukan untuk pengguna ini.']);
        }

        $pengajuan = Pengajuan::where('tenant_id', $tenant->id)
            ->paginate(10);

        return view('tenan.dataUnitUsaha', compact('pengajuan', 'unreadNotifications'));
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
        $pengajuan = Pengajuan::find($id);
        if (!$pengajuan) {
            return redirect()->route('tenant.dataPengajuan.index')->withErrors(['error' => 'Pengajuan tidak ditemukan.']);
        }

        // Memeriksa status pengajuan sebelum mengizinkan edit
        if ($pengajuan->status === 'direview' || $pengajuan->status === 'disetujui') {
            return redirect()->route('tenant.dataPengajuan.index')->withErrors(['error' => 'Pengajuan tidak dapat diubah karena sudah ' . $pengajuan->status]);
        }

        return view('tenan.update-dataPengajuan', compact('pengajuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengajuan = Pengajuan::find($id);
        if (!$pengajuan) {
            return redirect()->route('tenant.dataPengajuan.index')->withErrors(['error' => 'Pengajuan tidak ditemukan']);
        }

        $userId = Auth::id();
        $tenant = TenantModel::where('users_id', $userId)->first();
        if (!$tenant || $pengajuan->tenant_id !== $tenant->id) {
            return redirect()->route('tenant.dataPengajuan.index')->withErrors(['error' => 'Anda tidak memiliki izin untuk memperbarui pengajuan ini.']);
        }

        if ($pengajuan->status === 'direview' || $pengajuan->status === 'disetujui') {
            return redirect()->route('tenant.dataPengajuan.index')->withErrors(['error' => 'Pengajuan tidak dapat diubah karena sudah ' . $pengajuan->status]);
        }

        $update = [
            'tanggal_pengajuan' => 'required|date',
            'unit_usaha' => 'required|string',
            'deskripsi' => 'required|string',
            'file_pengajuan' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ];

        $validatedData = $request->validate($update);

        if ($request->hasFile('file_pengajuan')) {
            if ($pengajuan->file_pengajuan && Storage::disk('public')->exists($pengajuan->file_pengajuan)) {
                Storage::disk('public')->delete($pengajuan->file_pengajuan);
            }

            $file = $request->file('file_pengajuan');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('pengajuan', $fileName, 'public');
            $validatedData['file_pengajuan'] = $filePath;
        }

        if ($pengajuan->status === 'ditolak') {
            $validatedData['status'] = 'pending';
            $validatedData['komentar'] = null;
        }
        $pengajuan->update($validatedData);
        return redirect()->route('tenant.dataPengajuan.index')->with('success', 'Pengajuan berhasil dikirim!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengajuan = Pengajuan::find($id);
        if (!$pengajuan) {
            return redirect()->route('tenant.dataPengajuan.index')->withErrors(['error' => 'Pengajuan tidak ditemukan.']);
        }

        $userId = Auth::id();
        $tenant = TenantModel::where('users_id', $userId)->first();
        if (!$tenant || $pengajuan->tenant_id !== $tenant->id) {
            return redirect()->route('tenant.dataPengajuan.index')->withErrors(['error' => 'Anda tidak memiliki izin untuk menghapus pengajuan ini.']);
        }

        if ($pengajuan->status === 'direview' || $pengajuan->status === 'disetujui') {
            return redirect()->route('tenant.dataPengajuan.index')->withErrors(['error' => 'Pengajuan tidak dapat dihapus karena sudah ' . $pengajuan->status]);
        }

        if ($pengajuan->file_pengajuan && Storage::disk('public')->exists($pengajuan->file_pengajuan)) {
            Storage::disk('public')->delete($pengajuan->file_pengajuan);
        }

        $pengajuan->delete();
        return redirect()->route('tenant.dataPengajuan.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
