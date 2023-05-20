<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class RetailerController extends Controller
{

    public function index(){
        $resource = "Retailers";
        $action = "All Retailers";
        $retailers = User::getRetailers();
        return view('admin.retailers.list',compact('retailers','resource','action'));
    }

    public function dashboard(){
        $title="Retailer Dashboard";
        $ordersCount = 0;
        $orders = [];
        $products = Product::latest()->get();
        return view('retailer.dashboard',compact('ordersCount','orders','products','title'));
    }

    public function logout(Request $request){
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');        
    }
}
