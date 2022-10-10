<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index()
    {

    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
            'category_id' => 'required'
        ]);

        $attributes['user_id'] = auth()->user()->id;

        Password::create($attributes);
    }

    public function edit()
    {

    }

    public function destroy(Password $password)
    {
        Password::destroy($password);

        return redirect('/');
    }
}