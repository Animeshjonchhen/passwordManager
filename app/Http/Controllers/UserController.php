<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            return view('Users.index', [
                'users' => User::where('name','<>','Example Super-Admin User')->get()
            ]);
        } else {
            return view('home');
        }
    }

    public function create()
    {
        return view('Users.signup', [
            'roles' => Role::where('name','<>','Super-Admin')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create($attributes);

        $role = request()->role;
        $user->assignRole($role);

        auth()->login($user);

        return redirect('/users');
    }


    public function show(User $user)
    {
        return view('Users.update', [
            'users' => User::find($user->id),
            'roles' => Role::where('name', '<>', 'Super-Admin')->get(),
        ]);
    }

    public function edit(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user->update($attributes);

        $role = request()->role;
        $user->assignRole($role);

        auth()->login($user);

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users');
    }
}
