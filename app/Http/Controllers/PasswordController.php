<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PasswordController extends Controller
{
    public function index()
    {
        return view('Password.index',[
            'passwords' => Password::all(),
        ]);
    }

    public function show()
    {
    }

    public function create()
    {
        return view('Password.create',[
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
            'url' => 'required',
            'category_id' => 'required',
        ]);

        $attributes['email'] = request()->email;

        $attributes['password'] = Crypt::encryptString($attributes['password']);

        $attributes['user_id'] = auth()->user()->id;

        $attributes['remarks'] = request()->remarks;

        Password::create($attributes);

        return redirect('/');
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
