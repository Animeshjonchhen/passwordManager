<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('Users.signup');
    }

    public function index()
    {
        return view('Users.index');
    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);
        
        $attributes['password'] = Hash::make($attributes['password']);
        
        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/');
    }

    public function edit()
    {

    }

    public function destroy(User $user)
    {
        User::destroy($user);

        return redirect('/');
    }
}