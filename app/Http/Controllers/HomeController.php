<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->permission_id == 1) {
            return view('/home');
        }
        else {
            $products = products::latest()->get();

            return view('home.index', compact('products'));
        }

    }

    public function logout() {
        Auth::logout();
        return view('auth.login');
    }
}
