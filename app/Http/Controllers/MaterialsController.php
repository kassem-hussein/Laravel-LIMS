<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->query('material','');
        $materials = Material::where('name','like','%'.$search.'%')->get();
        if(count($materials) > 5){
            $materials =$materials->paginate(5)->withQuery();
        }
        return view('materials.index',['materials'=>$materials]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materials.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'quantity'=>'required|integer',
            'expired_date'=>'required|date'
        ]);

        Material::create([
            'name'=>$request['name'],
            'quantity'=>$request['quantity'],
            'expired_date'=>$request['expired_date'],
        ]);

       return redirect()->route('materials');



    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $material = Material::findOrFail($id);
        return view('materials.edit',['material'=>$material]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $material = Material::findOrFail($id);
        $request->validate([
            'name'=>'required|string',
            'quantity'=>'required|integer',
            'expired_date'=>'required|date'
        ]);

        $material->update([
            'name'=>$request['name'],
            'quantity'=>$request['quantity'],
            'expired_date'=>$request['expired_date'],
        ]);

        return redirect()->route('materials');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        return redirect()->route('materials');
    }
    public function print(){
        $materials = Material::all();
        return view('materials.print',['materials'=>$materials]);
    }
}
