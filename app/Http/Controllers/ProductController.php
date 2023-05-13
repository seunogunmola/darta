<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $resource,$units,$distributors,$rules;

    public function __construct()
    {
        $this->resource = "Products"; 
        $this->distributors = Distributor::all();  
        $this->units = Unit::all();
        $this->rules = [
            'sku'=>'string|required',
            'product_name'=>'string|required',
            'product_description'=>'string|required',
            'product_price'=>'numeric|required',
            'unit_id'=>'numeric|required',
            'distributor_id'=>'numeric|required'
        ];
    }

    public function index()
    {
        $action = "All Products";
        $resource = $this->resource;
        $products = Product::all();
        return view('admin.products.list',compact('action','products','resource'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = "Create Product";
        $resource = $this->resource;
        $distributors = $this->distributors;
        $units = $this->units;
        return view('admin.products.create',compact('action','resource','distributors','units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = $this->rules;
        $rules['product_name'] .= "|unique:products";
        if ($data = $request->validate($rules)){
            $data['uniqueid'] = str()->random('7');
            if($image = $request->file('product_image')){                
                $filename = $data['uniqueid'].'.'.$image->getClientOriginalExtension();
                $image_path = "uploads/product_images/".$filename;
                Image::make($image)->resize(400,400)->save($image_path);
                $data['product_image'] = $image_path;
            }
            $data['created_by'] = auth()->user()->id;

            if(Product::create($data)){
                $message = [
                    'message'=>'Product Created Successfully',
                    'type'=>'success'
                ];
                return redirect(route('products.list'))->with($message);
            }
            else{
                $message = [
                    'message'=>'An Error Occurred, Please try again',
                    'type'=>'error'
                ];
                return back()->with($message);
            }
        }
        else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);   
        $action = "Editing Product : ".$product->product_name;
        $resource = $this->resource;
        $distributors = $this->distributors;
        $units = $this->units;
        return view('admin.products.edit',compact('action','resource','distributors','units','product'));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $rules = $this->rules;
        if ($data = $request->validate($rules)){
            if($image = $request->file('product_image')){  
                unset($product->product_image);              
                $filename = $data['uniqueid'].'.'.$image->getClientOriginalExtension();
                $image_path = "uploads/product_images/".$filename;
                Image::make($image)->resize(400,400)->save($image_path);
                $data['product_image'] = $image_path;
            }
            $data['created_by'] = auth()->user()->id;

            if($product->update($data)){
                $message = [
                    'message'=>'Product Updated Successfully',
                    'type'=>'success'
                ];
                return redirect(route('products.list'))->with($message);
            }
            else{
                $message = [
                    'message'=>'An Error Occurred, Please try again',
                    'type'=>'error'
                ];
                return back()->with($message);
            }
        }
        else{
            return back();
        }        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $productHasData = false;
        if ($productHasData == false){
            $product->delete();
            @unlink($product->product_image);
            $message = ['message'=>'Product Deleted Successfully','type'=>'success'];
            return redirect(route('products.list'))->with($message);
        }        
        else{
            $message = ['message'=>'Product Cannot be Deleted because other records are attached to it;','type'=>'error'];
            return back()->with($message);
        }
    }
}
