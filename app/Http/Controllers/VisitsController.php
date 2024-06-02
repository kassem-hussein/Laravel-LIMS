<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Models\Patient;
use App\Models\Revenue;
use App\Models\Sample;
use App\Models\Test;
use App\Models\Visit;
use App\Models\VisitParamResult;
use App\Models\VisitTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits = Visit::all();
        if(count($visits) > 5){
            $visits =$visits -> toQuery()->paginate(5);
        }
        return view('Visits.index',['visits'=>$visits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        $tests = Test::all();
        return view('Visits.add',['patients'=>$patients,'tests'=>$tests]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $renvue_amount = 0;
        $request->validate([
            'status'=>'nullable',
            'purpose'=>'nullable',
            'patient'=>'required|exists:patients,id',
            'tests'=>'required|array'
        ]);

        $visit = Visit::create([
            'status'=>$request['status'],
            'purpose'=>$request['purpose'],
            'patient_id'=>$request['patient']
        ]);

        foreach($request['tests'] as $test){
            $test_info = Test::findOrFail($test);
            VisitTest::create([
                'visit_id'=>$visit['id'],
                'test_id'=>$test
            ]);
            Sample::create([
                'visit_id'=>$visit['id'],
                'sample_type'=>$test_info['sample_type']
            ]);
            $renvue_amount+=$test_info['price'];
        }

        Revenue::create([
            'amount'=>$renvue_amount,
            'source'=>'patient',
            'patient_id'=>$request['patient'],
            'date'=> Date('y-m-d'),
            'decription'=>'paitent paid for visit'.$visit['id']
        ]);
        return redirect('/visits');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visit = Visit::findOrFail($id);
        if($visit->status == 'started' || $visit->status == 'done'){
            $visit->delete();
        }
        return redirect()->route('visits');
    }

    public function print(){
        $visits = Visit::all();
        return view('Visits.print',['visits'=>$visits]);
    }

    public function createVisitResult(string $id){
        if(Auth::user()->role == 'Nurse'){
           return abort(403);
        }
        $prametersResult =[];
        $visitTests = VisitTest::where('visit_id',$id)->get();
        foreach($visitTests as $test){
           $param = Parameter::where('test_id',$test->test_id)->get();
           foreach($param as $p){
             array_push($prametersResult,$p);
           }
        }
        return view('Visits.results.add',['parameters'=>$prametersResult,'id'=>$id]);
    }
    public function setResult(Request $request,string $id){
        foreach($request['parameters'] as $paramResult){
            VisitParamResult::create([
                'parameter_id'=>$paramResult['id'],
                'value'=>$paramResult['value'],
                'visit_id'=>$id
            ]);
        }
        Visit::findOrFail($id)->update([
            'status'=>'done'
        ]);
        return redirect()->route('visits');
    }
    public function printResult(string $id){
        $result =[];
        $visit =Visit::findOrFail($id);
        $patient = Patient::findOrFail($visit->patient_id);
        $paramsResult = VisitParamResult::where('visit_id',$id)->get();
        foreach($paramsResult as $paramResult){
           $param = Parameter::findOrFail($paramResult->parameter_id);
           $param['value'] = $paramResult['value'];
           array_push($result,$param);
        }
       return view('Visits.results.print',['patient'=>$patient,'results'=>$result]);
    }
}
