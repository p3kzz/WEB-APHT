<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class DataPengajuanTenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = Pengajuan::all();
        return view('admin.dataPengajuan', compact('pengajuan'));
    }


    public function editStatus($id)
    {
        $editPengajuan = Pengajuan::findOrFail($id);
        return view('admin.editPengajuan', compact('editPengajuan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $editPengajuan = [
            'status'=>$request->status,
            'komentar'=>$request->komentar,
        ];

        Pengajuan::where('id', $id)->update($editPengajuan);
        return redirect('/PengajuanTenant');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
