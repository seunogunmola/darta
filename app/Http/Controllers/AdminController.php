<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\State;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        $distributorCount = Distributor::count();
        $stateCount = State::count();
        $retailerCount = User::where('usertype','retailer')->count();
        $productCount = Product::count();
        $orderCount = 0;
        $orders = [];
        return view('admin.dashboard',compact('distributorCount','retailerCount','productCount','orderCount','orders','stateCount'));
    }

    public function login(){
        return view('admin.login');
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
