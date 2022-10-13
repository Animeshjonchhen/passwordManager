<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        if (auth()->user()) {

            return view('categoryDashboard', [
                'categories' => Category::all()
            ]);
        } else {
            return view('home');
        }
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

        return redirect('/category');
    }

    public function show(Category $category)
    {
        return view('Category.update',[
            'category' => Category::find($category->id)
        ]);
    }

    public function edit(Category $category,Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
        ]);

       $category->update($attributes);

       return redirect('/category');

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/category');
    }
}
