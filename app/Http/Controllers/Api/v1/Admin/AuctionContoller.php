<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
class AuctionContoller extends Controller
{
    private $user, $defaultNumber;
    public function auction(Request $request)
    {
       $auction = Auction::get();
        return response()->json(["auction"=>$auction]);
    }
}
