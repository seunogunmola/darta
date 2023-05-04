<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\State;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public $resource = "Regions";
    public $rules = [
        'region_name'=>'string|required',
        'region_abbreviation'=>'string|required',
        'state_id'=>'numeric|required',
        'status'=>'numeric|required'        
    ];

    public function index()
    {
        $resource = $this->resource;
        $regions = Region::getRegions();
        $action = "Regions";
        return view('admin.regions.list',compact('regions','action','resource'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $resource = $this->resource;
        $action = "Create Region";
        $states = State::getAllStates();
        return view('admin.regions.create',compact('states','resource','action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->rules['region_name'] .= "|unique:regions";
        $data = $request->validate($this->rules);        
        $data['uniqueid'] = str()->random(7);
        $data['created_by'] = auth()->user()->id;
        
        if (Region::create($data)){
            $message = [
                'message'=>'Region Created Successfully',
                'type'=>'success'
            ];
            return redirect(route('regions.list'))->with($message);
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
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uniqueid)
    {
        $region = Region::getRegionWithUniqueid($uniqueid);
        $resource = $this->resource;
        $action = "Editing Region : ".$region->region_name;
        $states = State::getAllStates();
        return view('admin.regions.edit',compact('region','resource','action','states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $region = Region::findOrFail($id);
        $data = $request->validate($this->rules);   
        
        if ($region->update($data)){
            $message = [
                'message'=>'Region Updated Successfully',
                'type'=>'success'
            ];
            return redirect(route('regions.list'))->with($message);
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
    public function destroy($uniqueid)
    {
        $region = Region::getRegionWithUniqueid($uniqueid);
        $regionHasChildren = false;
        if($regionHasChildren==true){
            $message = [
                'message'=>'Region Cannot Be Deleted. It has Associated Data',
                'type'=>'error'
            ];
            return back()->with($message);
        }
        else{
            $region->delete();
            $message = [
                'message'=>'Region Deleted Successfully',
                'type'=>'success'
            ];   
            return redirect(route('regions.list'))->with($message);         
        }
    }
}
