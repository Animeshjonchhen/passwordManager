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
        if (auth()->user()) {
            if (auth()->user()->name === "Example Super-Admin User") {
                return view('Password.index', [
                    'passwords' => Password::all()
                ]);
            } else {
                return view('Password.index', [
                    'passwords' => Password::where('user_id', auth()->user()->id)->get(),
                ]);
            }
        } else {
            return view('Users.login');
        }
    }

    public function show($id)
    {
        return view('Password.update', [
            'categories' => Category::all(),
            'password' => Password::find($id),
        ]);
    }

    public function create()
    {
        return view('Password.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'url' => 'required',
            'category_id' => 'required',
        ]);

        $attributes['username'] = auth()->user()->name;

        $attributes['password'] = Crypt::encryptString($attributes['password']);

        $attributes['user_id'] = auth()->user()->id;

        $attributes['remarks'] = request()->remarks;

        Password::create($attributes);

        return redirect('/password');
    }

    public function edit(Password $password)
    {
        $attributes = request()->validate([
            'password' => 'required|min:6',
            'url' => 'required',
            'category_id' => 'required',
        ]);

        $attributes['username'] = auth()->user()->name;

        $attributes['email'] = request()->email;

        $attributes['password'] = Crypt::encryptString($attributes['password']);

        $attributes['user_id'] = auth()->user()->id;

        $attributes['remarks'] = request()->remarks;

        $password->update($attributes);

        return redirect('/password');
    }

    public function destroy(Password $password)
    {
        $password->delete();

        return redirect('/password');
    }
}
