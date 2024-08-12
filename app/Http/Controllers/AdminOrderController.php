<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index() {
        $data = Order::all();
//->join('order_details','order_details.order_id = orders.id');
        return view('orders.list')->with('data', $data);

    }

    public function detail(String $id) {
        $data = Order_detail::all();
        return view('orders.order_detail')->with('data', $data);
    }

    public function process(String $id) {
        DB::table('orders')->where('id', $id)->update([
            'status' => 2
        ]);
        return redirect()->route('orderAdmin.index');
    }

}
