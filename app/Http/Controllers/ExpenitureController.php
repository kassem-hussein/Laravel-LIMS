<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use Illuminate\Http\Request;

class ExpenitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expends = Expenditure::all();
        if(count($expends) > 5){
            $expends = $expends->toQuery()->paginate(5);
        }
        return view('Expenditure.index',['expends'=>$expends]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Expenditure.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount'=>'required',
            'description'=>'required'
        ]);
        Expenditure::create([
            'amount'=>$request['amount'],
            'description'=>$request['description']
        ]);

        return redirect()->route('expends');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expend = Expenditure::findOrFail($id);
        $expend->delete();
        return redirect()->route('expends');
        //
    }
    public function print(){
        $expends = Expenditure::all();
        return view('Expenditure.print',['expends'=>$expends]);
    }
}
