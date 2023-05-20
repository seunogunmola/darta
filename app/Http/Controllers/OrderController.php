<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "My Orders";
        $resource = "Orders";
        $orders = Order::getRetailerOrders(auth()->user()->id);        
        return view('retailer.orders.list',compact('title','resource','orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $resource = "Orders";
        $products = Product::all();
        $title = "Create Order";
        return view('retailer.orders.create',compact('title','resource','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'order_title'=>'string|required'
        ];

        $request->validate($rules);

        $orderData = [
            'uniqueid'=>str()->random(7),
            'retailer_id'=>auth()->user()->id,
            'order_title'=>$request->order_title,
            'order_date'=>date('Y-m-d'),
            'status'=>'pending',
            'is_disbursed'=>'0'
        ];

        $order = Order::create($orderData);
        

        $orderDetailData = [];
        
        $product_ids = $request->product_id;
        $product_quantities = $request->product_quantity;
        $product_prices = $request->product_price;

        foreach($product_ids as $index=>$value){
            if($product_quantities[$index] != 0){
                $orderDetailData[] = [
                    'order_id'=>$order->id,
                    'product_id'=>$product_ids[$index],
                    'product_price'=>$product_prices[$index],
                    'product_quantity'=>$product_quantities[$index],
                    'created_at'=>date('Y-m-d H:i:s'),
                ];
            }
        }
        
        $order_details_saved = OrderDetail::insert($orderDetailData);

        if($order && $order_details_saved){
            $message = "Order Created Successfully";            
            return redirect(route('retailer.orders.details',$order->uniqueid))->with($message);
        }
        else{
            $message = "An Error Occured, Please try again later";
            return redirect()->back()->with($message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function details($uniqueid)
    {
        $order = Order::where('uniqueid',$uniqueid)->first();        
        $title = "Order Details for : ".$order->order_title;
        $resource = "Order";
        return view('retailer.orders.details',compact('order','title','resource'));
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

    public function adminOrderList(){
        $resource = "Orders";
        $title = "All Orders";
        $orders = Order::all();
        return view('admin.orders.list',compact('orders','resource','title'));
    }

    public function adminOrderDetails($uniqueid)
    {
        $order = Order::where('uniqueid',$uniqueid)->first();        
        $title = "Order Details for : ".$order->order_title;
        $resource = "Order";
        return view('admin.orders.details',compact('order','title','resource'));
    }    
}
