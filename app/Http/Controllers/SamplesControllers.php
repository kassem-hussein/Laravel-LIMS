<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\Visit;
use Illuminate\Http\Request;

class SamplesControllers extends Controller
{
    //
    public function index(){
        $samples = Sample::all();
        if(count($samples) > 5){
            $samples =$samples->toQuery()->paginate(5);
        }
        return view('samples.index',['samples'=>$samples]);
    }
    public function updateStatus(Request $request,string $id){
        $sample = Sample::findOrFail($id);
        $collection_date = $request['status'] == 'collected' ? now():null;
        $sample->update([
            'status'=>$request['status'],
            'collection_date'=>$collection_date
        ]);
        if(Sample::findOrFail($id)->status == 'collected'){
            Visit::findOrFail($sample->visit_id)->update([
                'status'=>'in lab'
            ]);
        }

        return redirect('samples');
    }
    public function print(){
        $samples = Sample::all();
        return view('samples.print',['samples'=>$samples]);
    }
}
