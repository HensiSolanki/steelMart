<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\categories;
use App\Models\materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index()
    {
        $materials = materials::all();
        return view('admin.materials.index', compact('materials'));
    }

    public function create()
    {
        $addForm = true;
        $materials  = null;
        $categorys = categories::all();
        return view('admin.materials.create', compact('addForm', 'materials', 'categorys'));
    }

    public function store(Request $request)
    {
        $userdetails = Auth::guard('admin');
        dd($userdetails);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'height' => 'required|min:0',
            'width' => 'required|min:0',
            'length' => 'required|min:0',
            'weight' => 'required|min:0',
            'inStock' => 'required|min:0',
            'price' => 'required|min:0',
            'categoryId' => 'nullable',
        ]);
        $details = materials::create(['uid' => $userdetails->id, $data]);
        return redirect('admin/materials');
    }
    public function show(materials $materials)
    {
        //
    }

    public function edit(materials $materials)
    {
        $addForm = false;
        $categorys = categories::all();
        return view('materials.materialform', compact('addForm', 'materials', 'categorys'));
    }

    public function update(Request $request, materials $materials)
    {

        $materials->update($request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'height' => 'required|min:0',
            'width' => 'required|min:0',
            'length' => 'required|min:0',
            'weight' => 'required|min:0',
            'inStock' => 'required|min:0',
            'price' => 'required|min:0',
            'categoryId' => 'required',
        ]));
        return redirect('/materials');
    }

    public function destroy(materials $materials)
    {
        $materials->delete();
        return redirect('/materials');
    }
}
