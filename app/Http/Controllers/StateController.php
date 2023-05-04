<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $resource;
    public $action; 
    public $secondary_action;
    public $rules;

    public function __construct()
    {
        $this->resource = "State";  
        $this->rules = [
            'state_name'=>'string|required',
            'state_abbreviation'=>'string|required',
            'status'=>'numeric|required'
        ];      
    }

    public function index()
    {
        $resource = $this->resource;
        $states = State::getAllStates();
        $action = "States List";
        return view('admin.states.list',compact('resource','action','states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $resource = $this->resource;
        $action = "Create State";
        return view('admin.states.create',compact('resource','action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->rules['state_name'] .= '|unique:states';
        $data = $request->validate($this->rules);
        $data['uniqueid'] = str()->random(7);
        $data['created_by'] = auth()->user()->id;
        
        $saved = State::create($data);

        if($saved){
            $message = [
                'message'=>'State Created Successfully',
                'type'=>'success'
            ];            
            return redirect()->route('states.list')->with($message);
        }
        else{
            $message = [
                'message'=>'An error occured, Please try again',
                'type'=>'error'
            ];
            return back()->with($message);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uniqueid)
    {
        $state = State::getStateWithUniqueid($uniqueid);
        $resource = $this->resource;
        $action = "Editing State : ". $state->state_name;
        return view('admin.states.edit',compact('resource','action','state'));        
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        $state = State::findOrFail($id);
        $data = $request->validate($this->rules);
        
        if($state->update($data)){
            $message = [
                'message'=>'State Updated Successfully',
                'type'=>'error'
            ];
            return redirect(route('states.list'))->with($message);
        }
        else{
            $message = [
                'message'=>'An error occured, Please try again',
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
        $state = State::getStateWithUniqueid($uniqueid);
        $stateHasChildren = false;

        if($stateHasChildren == true){
            $message = [
                'message'=>'State has Records attached to it, it cannot be delete',
                'type'=>'error'
            ];
            return back()->with($message);
        }
        else{
            
            $state->delete();

            $message = [
                'message'=>'State deleted Successfully',
                'type'=>'success'
            ];
            return back()->with($message);
        }
    }
}
