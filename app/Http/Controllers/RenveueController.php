<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use Illuminate\Http\Request;

class RenveueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $revenues= Revenue::all();
        if(count($revenues) > 5){
            $revenues = $revenues->toQuery()->paginate(5);
        }
        return view('Revenue.index',['revenues'=>$revenues]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Revenue.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount'=>'required|numeric',
            'source'=>'required|in:patient,other',
            'description'=>'required|string',
            'status'=>'nullable|in:Paid,Not Paid',
            'date'=>'required|date'
        ]);
        Revenue::create([
            'amount'=>$request['amount'],
            'source'=>$request['source'],
            'decription'=>$request['description'],
            'status'=>$request['status'],
            'date'=>$request['date']
        ]);
        return redirect()->route('revenues');
    }


    public function updateStatus(Request $request,string $id){
        $revenue = Revenue::findOrFail($id);
        $revenue->update([
            'status'=>$request['status']
        ]);
        return redirect()->route('revenues');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $revenue = Revenue::findOrFail($id);
        $revenue->delete();
        return redirect()->route('revenues');
    }

    public function print(){
        $revenues= Revenue::all();
        $total   = Revenue::sum('amount');
        return view('Revenue.print',['revenues'=>$revenues,'total'=>$total]);
    }
}
