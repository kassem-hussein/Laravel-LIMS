<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Models\Test;
use Illuminate\Http\Request;

class ParametersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $parameters = Parameter::all();
        if(count($parameters) > 5){
            $parameters= $parameters->toQuery()->paginate(5);
        }
        return view('Parameters.index',['parameters'=>$parameters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tests = Test::all();
        return view('Parameters.add',['tests'=>$tests]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'parameters'=>'array',
            'test_id'=>'required|exists:tests,id'
        ]);
        foreach($request['parameters'] as $parameter){
            if(isset($parameter['name']) && isset($parameter['referance_range']) && isset($parameter['data_type'])){
                Parameter::create([
                    'name'=>$parameter['name'],
                    'referance_range'=>$parameter['referance_range'],
                    'data_type'=>$parameter['data_type'],
                    'test_id'=>$request['test_id']
                ]);
            }else{
               return back()->with('msg','All fields required *');
            }

        }
        return redirect('/parameters');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parameter = Parameter::findOrFail($id);
        $tests    = Test::all();
        return view('Parameters.edit',['tests'=>$tests,'parameter'=>$parameter]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $parameter = Parameter::findOrFail($id);
        $request->validate([
            'name'=>'required|string',
            'referance_range'=>'required|string',
            'data_type'=>'required|string',
            'test_id'=>'required|exists:tests,id'
        ]);
        $parameter->update([
            'name'=>$request['name'],
            'referance_range'=>$request['referance_range'],
            'data_type'=>$request['data_type'],
            'test_id'=>$request['test_id']
        ]);
        return redirect('/parameters');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $parameter = Parameter::findOrFail($id);
        $parameter->delete();
        return redirect('/parameters');
    }
    public function print(){
        $parameters = Parameter::all();
        return view('Parameters.print',['parameters'=>$parameters]);
    }
}
