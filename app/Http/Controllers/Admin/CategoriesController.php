<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


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
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $parentcategories  = categories::all();
        return view('admin.categories.create', compact('parentcategories'));
    }

    public function store(Request $request)
    {
        categories::create($request->validate([
            'title' => 'required',
            "description" => "nullable",
        ]));
        return redirect('admin/categories');
    }

    public function show(categories $categories)
    {

        return view('admin.categories.show', compact('categories'));
    }


    public function edit(categories $categories)
    {
        $parentcategories  = categories::all();
        return view('admin.categories.edit', compact('categories', 'parentcategories'));
    }

    public function update(Request $request, categories $categories)
    {

        $categories->update($request->validate([
            'title' => 'required',
            "description" => "nullable",
        ]));
        return redirect('admin/categories/show/' . $categories->id);
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
        return redirect('admin/categories');
    }
}
