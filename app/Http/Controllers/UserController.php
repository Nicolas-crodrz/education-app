<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('adminPanel.users');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $roleOptions = [
            1 => 'student',
            2 => 'teacher',
            3 => 'admin',
        ];

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
            'role' => $roleOptions[$request->role]
        ]);

        return redirect('/adminPanel');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('adminPanel.editUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $roleOptions = [
            1 => 'student',
            2 => 'teacher',
            3 => 'admin',
        ];

        $user = User::find($id);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = bcrypt($request->password);
        $user->role = $roleOptions[$request->role];
        $user->save();

        return redirect('/userList');
    }

    public function deleteConfirmation($id)
    {
        $user = User::find($id);
        return view('adminPanel.deleteUser', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/userList');
    }
}
