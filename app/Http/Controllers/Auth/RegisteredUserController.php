<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TenantModel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function tampilkan()
    {
        $users = User::all();
        return view('admin.datauser', compact('users'));
    }
    public function create(): View
    {
        return view('auth.register');
    }
    public function index(): View
    {
        return $this->create();
    }
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'role' => 'required|in:admin,tenant',
        ];

        if ($request->role === 'tenant') {
            $rules['alamat'] = 'required';
            $rules['no_hp'] = 'required';
        }

        $request->validate($rules);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if ($request->role === 'tenant') {
            TenantModel::create([
                'users_id' => $user->id,
                'name' => $user->name,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'status' => 'aktif',
            ]);
        }

        return redirect()->route('admin_apht.datauser.tampilkan')->with('success', 'User berhasil didaftarkan.');
    }

    public function edit_DataUser($id)
    {
        $users = User::findOrFail($id);

        // Simpan data user ke session agar bisa digunakan di view
        session()->flash('editUser', $users);

        // Redirect kembali ke halaman datauser
        return redirect()->route('admin_apht.datauser.tampilkan');
    }

    public function update_DataUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,tenant',
            // password tidak wajib diisi
            'password' => 'nullable|min:5',
        ];

        if ($request->role === 'tenant') {
            $rules['alamat'] = 'required';
            $rules['no_hp'] = 'required';
        }

        $request->validate($rules);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($user->role === 'tenant') {
            $user->tenant()->updateOrCreate(
                ['users_id' => $user->id],
                [
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'status' => 'aktif'
                ]
            );
        }

        return redirect()->route('admin_apht.datauser.tampilkan')->with('success', 'Data user berhasil diperbarui.');
    }


    public function hapus_DataUser($id)
    {
        User::where('id', $id)->delete();
        return redirect('/datauser');
    }
}
