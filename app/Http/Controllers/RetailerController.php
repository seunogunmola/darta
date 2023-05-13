<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RetailerController extends Controller
{
    public function dashboard(){
        $ordersCount = 0;
        $orders = [];
        return view('retailer.dashboard',compact('ordersCount','orders'));
    }

    public function logout(Request $request){
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');        
    }
}
