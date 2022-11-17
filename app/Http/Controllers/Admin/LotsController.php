<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\lot_materials;
use App\Models\lots;
use App\Models\materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    public function index()
    {
        $lots = lots::all();
        return view('admin.lots.index', compact('lots'));
    }

    public function create()
    {
        $addForm = true;
        $materials = materials::all();
        $lots = false;
        return view('admin.lots.create', compact('addForm', 'materials', 'lots'));
    }

    public function store(Request $request)
    {
        $userDetails = Auth::guard('admin')->user();
        $details = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'nullable',
            "seller" => "required",
            "plant" => "nullable",
            "materialLocation" => "nullable",
            "quantity" => "required",
            "startDate" => "required",
            "endDate" => "required",
            "material" => "nullable",
            "startPrice" => "required",
            "date" => "required",
            "Auction" => "nullable",

        ]);
        // dd($details);
        $data = lots::create(['uid' => $userDetails->id, $details]);
        // $data = lots::create($request->all());
        $data->materials()->attach(array_key_exists('material', $details) ? $details['materials'] : []);
        return redirect('admin/lots');
    }

    public function show(lots $lots)
    {
        return view('admin.lots.show', compact('lots'));
    }

    public function edit(lots $lots)
    {
        $addForm = false;
        $materials = materials::all();
        $lot_materials = lot_materials::where('lots_id', $lots->id)->get();
        return view('admin.lots.edit', compact('addForm', 'lots', 'materials', 'lot_materials'));
    }

    public function update(Request $request, lots $lots)
    {
        $userDetails = Auth::guard('admin')->user();
        $data  = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'nullable',
            "seller" => "required",
            "plant" => "nullable",
            "materialLocation" => "nullable",
            "quantity" => "required",
            "startDate" => "required",
            "endDate" => "required",
            "material" => "nullable",
            "startPrice" => "required",
            "date" => "required",
            "Auction" => "nullable",
        ]);
        $lots->update(['uid' => $userDetails->id, $data]);

        $lots->materials()->sync(array_key_exists('materials', $data) ? $data['materials'] : []);

        return redirect('admin/lots');
    }

    public function destroy(lots $lots)
    {
        $lots->delete();
        return redirect('admin/lots');
    }
}
