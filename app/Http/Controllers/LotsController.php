<?php

namespace App\Http\Controllers;

use App\Models\lot_materials;
use App\Models\lotbids;
use App\Models\lots;
use App\Models\materials;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LotsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lots = lots::all();
        return view('lots.lotslist', compact('lots'));
    }

    public function create()
    {
        $addForm = true;
        $materials = materials::all();
        $lots = false;
        return view('lots.lotsform', compact('addForm', 'materials', 'lots'));
    }

    public function store(Request $request)
    {
        $userDetails = Auth::user();
        $details = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'date' => 'required',
            'startAmount' => 'required',
            'materials' => 'required',
            'status' => 'nullable',
        ]);
        $data = lots::create(['uid' => $userDetails->id, ...$details]);
        $firestBid = lotbids::create(['userId' => $data['uid'], 'amount' => $data['startAmount'], 'lotId' => $data['id']]);
        $data->materials()->attach(array_key_exists('materials', $details) ? $details['materials'] : []);
        return redirect('lots');
    }

    public function show(lots $lots)
    {
        return view('lots.lotedetails', compact('lots'));
    }

    public function edit(lots $lots)
    {
        $addForm = false;
        $materials = materials::all();
        $lot_materials = lot_materials::where('lots_id', $lots->id)->get();
        return view('lots.lotsform', compact('addForm', 'lots', 'materials', 'lot_materials'));
    }

    public function update(Request $request, lots $lots)
    {
        $userDetails = Auth::user();
        $data  = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'date' => 'required',
            'startAmount' => 'required',
            'materials' => 'required',
            'status' => 'nullable',
        ]);
        $lots->update(['uid' => $userDetails->id, ...$data]);
        $firestBid = lotbids::where('lotId', $lots['id'])
            ->update(['userId' => $lots['uid'], 'amount' => $lots['startAmount'], 'lotId' => $lots['id']]);

        $lots->materials()->sync(array_key_exists('materials', $data) ? $data['materials'] : []);

        return redirect('lots');
    }

    public function destroy(lots $lots)
    {
        $lots->delete();
        return redirect('lots');
    }

    public  function liveLots()
    {
        $liveLots = lots::whereDate('date', Carbon::today())->get();

        return (view('lots.liveLots', compact('liveLots')));
    }

    public  function liveLotDetails(lots $lots)
    {
        return (view('lots.liveLotsDetails', compact('lots')));
    }


    public  function liveLotBids(lots $lots)
    {
        $lotbids = DB::select('
        SELECT lotbids.id,lotbids.amount,lotbids.created_at as bidTime,
        lots.title as lotTitle,lots.description as lotdescription,lots.startAmount as lotstartAmount,lots.date as lotStartDate,
        customers.id as customerId,customers.name as customerName
        FROM lotbids
        RIGHT JOIN customers on customers.id = lotbids.customerId
        LEFT JOIN lots on lots.id = lotbids.lotId
        WHERE lotId =' . $lots->id . ' ORDER BY lotbids.amount DESC');

        // dd($lotbids);
        // dd($lotbids[0]->customers[0]->name);
        return (view('lots.liveLotsDetails', compact('lots', 'lotbids')));
    }
}
