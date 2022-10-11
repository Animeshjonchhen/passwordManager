<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categoryDashboard',[
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('Category.create');
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
        ]);

        Category::create($attributes);

        return redirect('/dashboard');
    }

    public function edit(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
        ]);

        Category::update($attributes);

        return redirect('/dashboard');
    }

    public function destroy($id)
    {
        dd($id);
    }
}
