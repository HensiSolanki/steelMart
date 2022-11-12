<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use \Illuminate\Support\Carbon;
class AuctionContoller extends Controller
{
    private $user, $defaultNumber;
    public function auction(Request $request)
    {
       $auction = Auction::get();

       $date = Carbon::now();
       $formatedDate = $date->format('YYYY-mm-dd');
       if($request->type == 'current'){
        $auction = Auction::whereDate('auction_date','=',Carbon::today()->toDateString())->get();
        if($auction->isEmpty()){
            return response()->json(["msg"=>"No Current Auction Found","auction"=>$auction]);
        }else{
            return response()->json(["msg"=>"Current Auction Found Successfully","auction"=>$auction]);
        }
       }elseif($request->type == 'upcoming'){
        $auction = Auction::whereDate('auction_date','>',Carbon::today()->toDateString())->get();
        if($auction->isEmpty()){
            return response()->json(["msg"=>"No Upcoming Auction Found","auction"=>$auction]);
        }else{
            return response()->json(["msg"=>"Upcoming auction get successfully","auction"=>$auction]);
        }
       }else{
        $auction = Auction::whereDate('auction_date','<',Carbon::today()->toDateString())->get();
        if($auction->isEmpty()){
            return response()->json(["msg"=>"No Expired Auction Found","auction"=>$auction]);
        }else{
            return response()->json(["msg"=>"Expired auction get successfully","auction"=>$auction]);
        }
       }

    //    $start = Carbon::parse($request->auction_date);

    //    $get_all_user = Auction::whereDate('date','<=',$end->format('m-d-y'))
    //    ->whereDate('date','>=',$start->format('m-d-y'));


    }
}
