<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\lotbids;
use App\Models\lots;
use App\Models\User;
use Illuminate\Http\Request;

class LotbidsController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $newBid = $request->validate([
            'userId' => 'required',
            'amount' => 'required',
            'lotId' => 'required',
        ]);

        $responce = [];

        $newBid['customerId'] = $newBid['userId'];
        $customer = customers::where('id', $newBid['userId'])->get();
        $lotDtails = lots::where('id', $newBid['lotId'])->first()->get();

        if ($customer[0]['status'] == 1) {
            $lastBid =  lotbids::where('lotId', $newBid['lotId'])->orderBy('id', 'DESC')->first();
            if ($lastBid && $lastBid['amount'] < $newBid['amount'] && $lastBid['lotId'] == $newBid['lotId']) {

                $lastBid = lotbids::create($newBid);
                // execute event for brodcast
                $responce = ["sucess" => 'New Bid Commited.', 'LattestBid' => $lastBid, "userDetails" => $customer[0]];
            } elseif (!$lastBid && $lotDtails['startAmount'] < $newBid['amount']) {

                $lastBid = lotbids::create($newBid);
                $responce = ["sucess" => 'New Bid Commited.', 'LattestBid' => $lastBid, "userDetails" => $customer[0]];
            } else {
                $responce = ["error" => 'Bid Aount is small then last bid.'];
            }
        } else {
            $responce = ["error" => 'User is Blocked.'];
        }

        return $responce;
    }

    public function show(lotbids $lotbids)
    {
        //
    }

    public function edit(lotbids $lotbids)
    {
        //
    }

    public function update(Request $request, lotbids $lotbids)
    {
        //
    }

    public function destroy(lotbids $lotbids)
    {
        $lotbids->delete();
    }
}
