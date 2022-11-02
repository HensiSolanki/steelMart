<?php

namespace App\Http\Controllers\Admin;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    public function index()
    {
        $categories = categories::all();
        return view('admin.categories.categorieslist', compact('categories'));
    }

    public function create()
    {
        $addForm = true;
        $categories = null;
        $parentcategories  = categories::all();
        return view('admin.categories.categoriesform', compact('addForm', 'categories', 'parentcategories'));
    }

    public function store(Request $request)
    {
        categories::create($request->validate([
            'title' => 'required',
            "description" => "nullable",
            "parentcategory" => "nullable",
        ]));
        return redirect('admin/categories');
    }

    public function edit(categories $categories)
    {
        $addForm = false;
        $parentcategories  = categories::all();
        return view('admin.categories.categoriesform', compact('categories', 'addForm', 'parentcategories'));
    }

    public function update(Request $request, categories $categories)
    {
        $categories->update($request->validate([
            'title' => 'required',
            "description" => "nullable",
            "parentcategory" => "nullable",
        ]));
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories)
    {
        $categories->delete();
        return redirect('admin.categories');
    }
}
