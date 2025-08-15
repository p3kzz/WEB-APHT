<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Notifications\PengajuanStatusNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;

class DataPengajuanTenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = Pengajuan::paginate(10);
        return view('admin.dataPengajuan', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

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
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('admin.editPengajuan', compact('pengajuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $request->validate([
            'status' => 'required|in:direview,disetujui,ditolak',
            'komentar' => 'nullable|string'
        ]);

        $oldStatus = $pengajuan->status;
        $pengajuan->status = $request->status;
        $pengajuan->komentar = $request->komentar;
        $pengajuan->save();

        $tenantUser = $pengajuan->tenant->user;

        if ($tenantUser && $oldStatus !== $pengajuan->status) {
            try {
                Notification::send($tenantUser, new PengajuanStatusNotification($pengajuan));
            } catch (\Exception $e) {
                Log::error('Gagal mengirim notifikasi email untuk Pengajuan ' . $pengajuan->id . ': ' . $e->getMessage());
            }
        }
        return redirect()->route('admin_apht.PengajuanTenant.index')->with('success', 'Pengajuan berhasil dikirim!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
