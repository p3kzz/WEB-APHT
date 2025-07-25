<?php

namespace Database\Seeders;

use App\Models\TenantModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'tenant@gmail.com')->first();
        TenantModel::create([
            'users_id' => $user->id,
            'name' => $user->name,
            'alamat' => 'jl. mawar',
            'no_hp' => '08123797187',
            'status' => 'aktif',
        ]);
    }
}
