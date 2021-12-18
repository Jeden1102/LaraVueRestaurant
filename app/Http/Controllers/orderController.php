<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\ordered_product;

class orderController extends Controller
{
    public function createOrder(Request $req){
        $info = $req['info']['details'];
        $products = $req['info']['products'];
        $orderId = order::insertGetId([
            'city' => $info['city'],
            'comment' => $info['comment'],
            'date' => $info['date'],
            'delivery_price' => $info['deliveryPrice'],
            'number' => $info['number'],
            'phone' => $info['phone'],
            'sumPrice' => $info['sumPrice'],
            'street' => $info['street'],
            'price' => $info['price'],
            'time' => $info['time'],
            'city' => $info['city'],
            'user_id' => $info['user_id'],
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);
        $addons = '';
        foreach ($products as  $value) {
            $addons = '';
            foreach ($value['addons'] as $addon) {
                $addons .= $addon;
            }
            ordered_product::create([ 
                "order_id" => $orderId,
                "product_id" => $value['id'],
                "name" => $value['name'],
                "size" => $value['size'],
                "quantity" => $value['quantity'],
                "price" => $value['price'],
                "other_addons" => $addons,
            ]);
        }

        return "ok";
    }
}
