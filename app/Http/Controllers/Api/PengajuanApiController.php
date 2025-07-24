<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengajuanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = Pengajuan::get();
        return response()->json([
            'succes' => true,
            'data' => $pengajuan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pengajuan_id' => 'required|exists:users,id',
            'tanggal_pengajuan' => 'required|date',
            'unit_usaha' => 'required|string',
            'file_pengajuan' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'deskripsi' => 'required|string',
            'status' => 'required|in:pending,disetujui,tolak',
            'komentar' => 'nullable|string',
        ]);

        if ($request->hasFile('file_pengajuan')) {
            $file = $request->file('file_pengajuan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('pengajuan', $filename, 'public'); // simpan ke storage/app/public/pengajuan
        } else {
            $path = null;
        }

        $pengajuan = Pengajuan::create([
            'pengajuan_id' => $request->pengajuan_id,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'unit_usaha' => $request->unit_usaha,
            'file_pengajuan' => $path,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'komentar' => $request->komentar,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambah pengajuan',
            'data' => $pengajuan
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajuan = Pengajuan::find($id);
        return response()->json([
            'succes' => true,
            'data' => $pengajuan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengajuan = Pengajuan::find($id);

        if (!$pengajuan) {
            return response()->json([
                'success' => false,
                'message' => 'Data pengajuan tidak ditemukan.'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'pengajuan_id' => 'required|exists:users,id',
            'tanggal_pengajuan' => 'required|date',
            'unit_usaha' => 'required|string',
            'file_pengajuan' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'deskripsi' => 'required|string',
            'status' => 'required|in:pending,disetujui,tolak',
            'komentar' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        if ($request->hasFile('file_pengajuan')) {
            if ($pengajuan->file_pengajuan) {
                Storage::disk('public')->delete($pengajuan->file_pengajuan);
            }

            $file = $request->file('file_pengajuan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('pengajuan', $filename, 'public');
            $pengajuan->file_pengajuan = $path;
        }

        $pengajuan->pengajuan_id = $request->pengajuan_id;
        $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
        $pengajuan->unit_usaha = $request->unit_usaha;
        $pengajuan->deskripsi = $request->deskripsi;
        $pengajuan->status = $request->status;
        $pengajuan->komentar = $request->komentar;

        $pengajuan->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil di update',
            'data' => $pengajuan
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
