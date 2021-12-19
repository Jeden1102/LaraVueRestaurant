<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\ordered_product;
use Illuminate\Http\Response;

class statsController extends Controller
{
    public function getStatistics(Request $req){
        $ordersList =  order::where('user_id',$req->id)->orderBy('id','desc')->get();
        foreach ($ordersList as  $order) {
            $productList = ordered_product::where('order_id',$order['id'])->get();
            $order->test = $productList;
        }
        $response = [
            'ordersList'=>$ordersList,
        ];
        return response($response,201);

    }
}
