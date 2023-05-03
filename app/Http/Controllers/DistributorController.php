<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\Region;
use App\Models\State;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public $resource;
    public $states;
    public $regions;
    public $rules;

    public function __construct()
    {
        $this->resource = "Distributors";
        $this->states = State::getStates();
        $this->regions = Region::getRegions();  
        $this->rules = [
            'name'=>'string|required',
            'phone'=>'numeric|required',
            'email'=>'email|required',
            'address'=>'string|required',
            'state_id'=>'numeric|required',
            'region_id'=>'numeric|required',
            'status'=>'numeric|required',
        ];      
    }

    public function index()
    {
        $resource = $this->resource;
        $action = "View Distributors";   
        $states = State::getStates();
        $regions = Region::getRegions();            
        $distributors = Distributor::all();
        return view('admin.distributors.list',compact('resource','action','distributors','states','regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $resource = $this->resource;
        $action = "Create Distributor";
        $states = $this->states;
        $regions = $this->regions;
        
        return view('admin.distributors.create',compact('action','resource','states','regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #FORM VALIDATION RULES
        $rules = [
            'name'=>'string|required',
            'phone'=>'numeric|required',
            'email'=>'email|required',
            'address'=>'string|required',
            'state_id'=>'numeric|required',
            'region_id'=>'numeric|required',
            'status'=>'numeric|required',
        ];

        #CHECK THE VALIDATION
        $data = $request->validate($rules);
        $data['uniqueid'] = ltrim($data['phone'],'0');
        $data['created_by'] = auth()->user()->id;
        
        #SAVE DATA
        $saved = Distributor::create($data);

        if($saved){
            $message = [
                'message'=>'Distributor Created Successfully',
                'type'=>'success'
            ];

            return back()->with($message);
        }
        else{
            $message = [
                'message'=>'An Error Occured, Please try again',
                'type'=>'error'
            ];            
            return back()->with($message);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Distributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        $resource = $this->resource;
        $action = "Edit Distributor : ".$distributor->name;  
        $states = $this->states;
        $regions = $this->regions;

        return view('admin.distributors.edit',compact('distributor','states','regions','resource','action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $distributor = Distributor::findOrFail($id);
        #CHECK THE VALIDATION
        $data = $request->validate($this->rules);    
        $data['updated_by'] = auth()->user()->id;
        
        $updated = $distributor->update($data);

        if($updated){
            $message = [
                'message'=>'Distributor Updated Successfully',
                'type'=>'success'
            ];

            return redirect(route('distributor.list'))->with($message);
        }
        else{
            $message = [
                'message'=>'An Error Occured, Please try again',
                'type'=>'error'
            ];            
            return back()->with($message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $hasChildren = false;
        if($hasChildren == true){
            $message = [
                'message'=>'Distributor has Records attached to it, It cannot be deleted',
                'type'=>'warning'
            ];
            return back()->with($message);
        }
        else{
            $distributor->delete();
            $message = [
                'message'=>'Distributor deleted Successfully',
                'type'=>'success'
            ];
            return redirect(route('distributor.list'))->with($message);            
        }
    }
}
