<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        if(count($patients) > 5){
            $patients = $patients->toQuery()->paginate(5);
        }
        return view('patients.index',['patients'=>$patients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'phone'=>'required|digits:10',
            'email'=>'required|email',
            'gender'=>'required',
            'age'=>'required|integer'

        ]);

        Patient::create([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'gender'=>$request['gender'],
            'age'=>$request['age']
        ]);

        return redirect()->route('patients');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit',['patient'=>$patient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = Patient::findOrFail($id);
        $request->validate([
            'name'=>'required|string',
            'phone'=>'required|digits:10',
            'email'=>'required|email',
            'gender'=>'required',
            'age'=>'required|integer'

        ]);

        $patient->update([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'gender'=>$request['gender'],
            'age'=>$request['age']
        ]);

        return redirect()->route('patients');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patients');
    }

    public function print(){
        $patients = Patient::all();
        return view('patients.print',['patients'=>$patients]);
    }
}
