<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\lots;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use \Illuminate\Support\Carbon;
use \Illuminate\Support\Facades\DB;
class LotsContoller extends Controller
{
    private $user, $defaultNumber;
    public function getLots(Request $request)
    {
       $lots = lots::get();
    //    $orderList = DB::table('lots')
    // ->join('lot_materials', 'lots.id', '=', 'lot_materials.lots_id')
    // ->join('materials', 'materials.id', '=', 'lot_materials.materials_id')
    // ->where('lots.id', '=', 5)
    // ->get();

    return response()->json(["msg"=>"get Lots successfully","lots"=>$lots]);

    //    $start = Carbon::parse($request->auction_date);

    //    $get_all_user = Auction::whereDate('date','<=',$end->format('m-d-y'))
    //    ->whereDate('date','>=',$start->format('m-d-y'));


    }
}
