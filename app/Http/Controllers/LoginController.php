<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('Users.login');
    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($credential)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }

        return redirect('/');
    }

    public function edit()
    {

    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
