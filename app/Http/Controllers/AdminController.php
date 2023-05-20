<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\State;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        $title = "Dashboard";
        $distributorCount = Distributor::count();
        $stateCount = State::count();
        $retailerCount = User::where('usertype','retailer')->count();
        $productCount = Product::count();
        $orderCount = 0;
        $orders = [];
        return view('admin.dashboard',compact('distributorCount','retailerCount','productCount','orderCount','orders','stateCount','title'));
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

    public function users(){
        $resource = "Admin Users";
        $action = "All Admin Users";
        $data = User::getAdminUsers();
        return view('admin.users.list',compact('resource','action','data'));
    }

    public function create(){
        $resource = "Admin User";
        $action = "Create Admin User";
        return view('admin.users.create',compact('resource','action'));
    }

    public function storeAdminUser(Request $request){
        $rules = [
            'fullname'=>'string|required',
            'email'=>'email|unique:users',
            'phone'=>'numeric|required',
            'password'=>'required|confirmed'
        ];

        $request->validate($rules);

        $userData = [
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'uniqueid'=>ltrim($request->phone,'0'),
            'usertype'=>'admin',
            'privilege'=>'superadmin',            
        ];
        
        if(User::create($userData)){
            $message = [
                'message'=>'User '.$request->fullname . " Created Successfully",
                'type'=>'success'
            ];
            return redirect(route('users.list'))->with($message);
        }
        else{
            $message = [
                'message'=>'An error occured Please try again',
                'type'=>'error'
            ];
            
            return back()->with($message);
        }
    }
}
