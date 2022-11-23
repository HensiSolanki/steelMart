<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\categories;
use App\Models\materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class MaterialsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index(Request $request)
    {
        $materials = materials::all();
        if ($request->ajax()) {
          return Datatables::of($materials)
                  ->addIndexColumn()
                  ->rawColumns(['action'])
                  ->make(true);
      }
        return view('admin.materials.index')
            ->with('materials', $materials);
    }

    public function create()
    {
        $addForm = true;
        $materials = null;
        $categorys = categories::all();
        return view('admin.materials.create', compact('addForm', 'materials', 'categorys'));
    }

    public function store(Request $request)
    {
        $userdetails = Auth::guard('admin')->user();
        $this->validate($request, [
            'title' => 'required|min:0',
            'description' => 'nullable',
            'categoryId' => 'nullable',
            'thick' => 'required|min:0',
            'height' => 'required|min:0',
            'weight' => 'required|min:0',
            'width' => 'required|min:0',
            'price' => 'required|min:0',
            'coilLength' => 'nullable',
            'JSWgrade' => 'nullable',
            'grade' => 'nullable',
            'qty' => 'nullable',
            'majorDefect' => 'nullable',
            'coating' => 'nullable',
            'testedCoating' => 'nullable',
            'tinTemper' => 'nullable',
            'eqSpeci' => 'nullable',
            'heatNo' => 'nullable',
            'passivation' => 'nullable',
            'coldTreatment' => 'nullable',
            'plantNo' => 'nullable',
            'qualityRemark' => 'nullable',
            'storageLocation' => 'nullable',
            'edgeCondition' => 'nullable',
            'plantLotNo' => 'nullable',
            'inStock' => 'nullable',
        ]);
        $input = $request->only([
            'title',
            'description',
            'categoryId',
            'thick',
            'height',
            'weight',
            'width',
            'price',
            'coilLength',
            'JSWgrade',
            'grade',
            'qty',
            'majorDefect',
            'coating',
            'testedCoating',
            'tinTemper',
            'eqSpeci',
            'heatNo',
            'passivation',
            'coldTreatment',
            'plantNo',
            'qualityRemark',
            'storageLocation',
            'edgeCondition',
            'plantLotNo',
            'inStock',
        ]);
        $input['uid'] = $userdetails->id;
        // dd($input);
        $details = materials::create($input);
        return redirect('admin/materials');
    }

    public function show(materials $materials)
    {
        $categorys = categories::all();
        return view('admin.materials.show', compact('materials', 'categorys'));
    }

    public function edit(materials $materials)
    {
        $categorys = categories::all();
        return view('admin.materials.edit', compact('materials', 'categorys'));
    }

    public function update(Request $request, materials $materials)
    {
        $materials->update($request->validate([
            'title' => 'required|',
            'description' => 'nullable',
            'categoryId' => 'nullable',
            'thick' => 'required|min:0',
            'height' => 'required|min:0',
            'weight' => 'required|min:0',
            'width' => 'required|min:0',
            'price' => 'required|min:0',
            'coilLength' => 'nullable',
            'JSWgrade' => 'nullable',
            'grade' => 'nullable',
            'qty' => 'nullable',
            'majorDefect' => 'nullable',
            'coating' => 'nullable',
            'testedCoating' => 'nullable',
            'tinTemper' => 'nullable',
            'eqSpeci' => 'nullable',
            'heatNo' => 'nullable',
            'passivation' => 'nullable',
            'coldTreatment' => 'nullable',
            'plantNo' => 'nullable',
            'qualityRemark' => 'nullable',
            'storageLocation' => 'nullable',
            'edgeCondition' => 'nullable',
            'plantLotNo' => 'nullable',
            'inStock' => 'nullable',
        ]));
        return redirect('admin/materials');
    }

    public function destroy(materials $materials)
    {
        $materials->delete();
        return redirect('admin/materials');
    }
}
