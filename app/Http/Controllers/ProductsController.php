<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\rc;
use function Laravel\Prompts\alert;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::latest()->get();
        $users =User::paginate(20);

        return view('users.index', ['users' => $users]);

//        $products = products::paginate(5);

//        return view('products.index', ['products'=> $products]);
        return view('products.index', compact('products'));
    }

    public function addToCart($id)
    {

//        session()->flush('cart');
//        echo"<pre>";
//        print_r(session()->get('cart'));

        $product = products::find($id);
        $cart=session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }else{
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "type"=>$product->type,
                "price"=>$product->price,
                "description" => $product->description,
            ];
        }session()->put('cart',$cart);
        echo"<pre>";
        print_r(session()->get('cart'));
//        header('home');

    }
    public function showCart()
    {

        $cart=session()->get('cart');
        foreach ($cart as $key => $value) {

            $abc = $cart[$key]['quantity'];


            echo "<pre>";
            print_r($key);
            print_r($abc);
        }

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
        products::create($request->all());
        return redirect()->back()->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products, string $id): \Illuminate\Http\RedirectResponse
    {
        products::find($id)->update([
            'product_name' => $request->product_name,
            'type' => $request->type,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with('Success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(products $products, string $id)
    {
        products::find($id)->delete();

        return redirect()->back()->with('Success', 'Product Deleted Successfully');
    }
}
