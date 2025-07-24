<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TenantModel;


class tenantControllers extends Controller
{
    public function index()
    {
        $tenants = TenantModel::all();
        return view('tenan.dataUnitUsaha', compact('tenants'));
    }

    public function hapusTenant($id)
    {
    $tenant = TenantModel::findOrFail($id);
    $tenant->delete();

    return redirect()->back()->with('success', 'Data tenant berhasil dihapus.');
    }

   
}
