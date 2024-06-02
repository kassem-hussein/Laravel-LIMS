<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Test::all();
        if(count($tests) > 5){
            $tests = $tests->toQuery()->paginate(5);
        }
        return view('Tests.index',['tests'=>$tests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tests.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'sample_type'=>'required|string',
            'price'=>'required|numeric',
            'cost_time'=>'required|numeric',
            'requirments'=>'string|nullable'
        ]);
        Test::create([
            'name'=>$request['name'],
            'sample_type'=>$request['sample_type'],
            'price'=>$request['price'],
            'requirments'=>$request['requirments'],
            'cost_time'=>$request['cost_time']
        ]);
        return redirect('/tests');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $test = Test::findOrFail($id);
        return view('Tests.edit',['test'=>$test]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $test = Test::findOrFail($id);
        $request->validate([
            'name'=>'required|string',
            'sample_type'=>'required|string',
            'price'=>'required|numeric',
            'cost_time'=>'required|numeric',
            'requirments'=>'string|nullable'
        ]);
        $test->update([
            'name'=>$request['name'],
            'sample_type'=>$request['sample_type'],
            'price'=>$request['price'],
            'requirments'=>$request['requirments'],
            'cost_time'=>$request['cost_time']
        ]);
        return redirect('/tests');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $test = Test::findOrFail($id);
        $test->delete();
        return redirect('/tests');
    }
    public function print(){
        $tests = Test::all();
        return view('Tests.print',['tests'=>$tests]);
    }
}
