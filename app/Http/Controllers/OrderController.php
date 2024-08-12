<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use App\Models\products;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::all();
        $orders = Order::all();
        $order_detail = new Order_detail();
        //Last order details
        $lastID = Order_detail::max('order_id');
        $order_receipt = Order_detail::where('order_id', $lastID)->get();
        return view('orders.index',
            ['products'  => $products,
                'orders' => $orders,
                'order_details' => $order_detail,
                'order_receipt' => $order_receipt]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        DB::transaction(function () use ($request) {
           $orders = new Order();
           $orders ->name = $request->customer_name;
           $orders ->phone = $request->customer_phone;
           $orders ->total = $request->total_price;
           $orders->save();
           $order_id = $orders->id;

           for ($product_id = 0; $product_id < count($request->product_id); $product_id++){
               $order_details = new Order_detail();
               $order_details ->order_id = $order_id;
               $order_details ->product_id = $request->product_id[$product_id];
               $order_details->unitprice = $request->price[$product_id];
               $order_details->quantity = $request->quantity[$product_id];
               $order_details->discount = $request->discount[$product_id];
               $order_details->amount = $request->total_amount[$product_id];
               $order_details->save();
           }


            $transaction = new transaction();
            $transaction ->order_id = $order_id;
            $transaction ->user_id = auth()->user()->id;
            $transaction->balance = $request->balance;
            $transaction->paid_amount = $request->paid_amount;
            $transaction->payment_method = $request->payment_method;
            $transaction->trans_amount = $order_details->amount;
            $transaction->trans_date = date('Y-m-d H:i:s');
            $transaction->save();



            $products = products::all();
            $order_details = Order_detail::where('order_id', $order_id)->get();

            $orderedBy = Order::where('id', $order_id)->get();

            return view('orders.index',
                ['products' => $products,
                    'order_details' => $order_details,
                    'customer_orders'=>$orderedBy
                ]);

        });

        return back()->with("Product orders fail to input! check your order ");



    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
