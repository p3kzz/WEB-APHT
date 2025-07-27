<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    $request->validate([
         'name' => 'required',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|min:5',
         'role' => 'required|in:admin,tenant',
      ]);
      $data_user['name'] = $request->name;
      $data_user['email'] = $request->email;
      $data_user['password'] = Hash::make($request->password);
    User::create($data_user);
    $register = [
         'email' => $request->email,
         'password' => $request->password
      ];
    
    return redirect()->route('admin.datauser.tampilkan')->with('success', 'User berhasil didaftarkan.');
    }

   public function edit_DataUser($id) {
   $users = User::findOrFail($id);
   return view('admin.edit_dataUser', compact('users'));
}

// Proses update data_user
   public function update_DataUser(Request $request, $id) {
      $request->validate([
         'name' => 'required',
         'email' => 'required|email|unique:users,email,' . $id,
         'password' => 'nullable|min:5',
         'role' => 'required|in:admin,tenant',
      ]);

      $Data_User = User::findOrFail($id);
      $Data_User->name = $request->name;
      $Data_User->email = $request->email;
      $Data_User->role = $request->role;

      if ($request->filled('password')) {
         $Data_User->password = Hash::make($request->password);
      }

      $Data_User->save();

      return redirect('/datauser')->with('success', 'Data operator berhasil diperbarui');
   }
   public function hapus_DataUser($id){
      User::where('id', $id)->delete();
      return redirect('/datauser');
  }

}


    
   

