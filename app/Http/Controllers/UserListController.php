<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserListController extends Controller
{
    public function index()
    {
        $orderBy = request()->query('orderBy', 'name');
        $direction = request()->query('direction', 'asc');

        $users = User::orderBy($orderBy, $direction)->paginate(10);

        return view('adminPanel.userList', compact('users'));
    }
}
