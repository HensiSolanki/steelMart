<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\images;
use App\Models\materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class MaterialsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $materials = materials::all();
        return view('materials.materialslist', compact('materials'));
    }

    public function create()
    {
        $addForm = true;
        $materials  = null;
        $categorys = categories::all();
        return view('materials.materialform', compact('addForm', 'materials', 'categorys'));
    }

    public function store(Request $request)
    {
        $userdetails = Auth::user();
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
            'image' => 'nullable',
        ]);

        $details = materials::create(['uid' => $userdetails->id, ...$data]);

        if ($request->hasFile('image')) {
            foreach ($data['image']  as $imagefile) {
                $image = new images;
                $extention = $imagefile->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $imagefile->move('assets/images/', $filename);
                // $fileOriginalName = $imagefile->getClientOriginalName();
                $image->materials_id = $details->id;
                $image->path = $filename;
                $image->save();
            }
        }
        // $details->images()->attach(count($imageList) > 0 ? $imageList : []);
        return redirect('/materials');
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
            'image' => 'nullable',
        ]);
        $materials->update($data);
        if ($request->hasFile('image')) {
            foreach ($data['image']  as $imagefile) {
                $image = new images;
                $extention = $imagefile->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $imagefile->move('assets/images/', $filename);
                // $fileOriginalName = $imagefile->getClientOriginalName();
                $image->materials_id = $materials->id;
                $image->path = $filename;
                $image->save();
            }
        }
        // $materials->images()->attach(count($imageList) > 0 ? $imageList : []);
        return redirect('/materials');
    }

    public function destroy(materials $materials)
    {
        $materials->delete();
        return redirect('/materials');
    }
}
