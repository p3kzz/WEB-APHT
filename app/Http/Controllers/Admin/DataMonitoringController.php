<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanKeuangan;
use App\Models\Produksi;
use App\Models\TenantModel;
use Illuminate\Http\Request;

class DataMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = TenantModel::with('user')->get();
        return view('admin.dataMonitoring', compact('tenants'));
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
        $tenant = TenantModel::findOrFail($id);
        $produksis = Produksi::where('tenant_id', $tenant->id)
            ->with('laporanKeuangan')
            ->get();
        $tenant->load('user');

        return view('admin.grafikKeuangan', compact('produksis', 'tenant'));
    }
    public function showFinancialChart(string $id)
    {
        $tenant = TenantModel::findOrFail($id);
        $produksis = Produksi::where('tenant_id', $tenant->id)
            ->with('laporanKeuangan')
            ->get();
        $tenant->load('user');

        return view('admin.grafikKeuangan', compact('produksis', 'tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tenant = TenantModel::findOrFail($id);
        $produksis = Produksi::where('tenant_id', $tenant->id)
            ->with('laporanKeuangan')
            ->get();
        return view('admin.monitoringLaporan', compact('produksis', 'tenant'));
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
