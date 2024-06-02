<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\Patient;
use App\Models\Revenue;
use App\Models\Sample;
use App\Models\Test;
use App\Models\Visit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $patients = Patient::count();
        $tests    = Test::count();
        $samples  = Sample::count();
        $visits   = Visit::count();
        $revenues = Revenue::sum('amount');
        $expends  = Expenditure::sum('amount');
        return view('dashboard',[
            'patients'=>$patients,
            'tests'=>$tests,
            'samples'=>$samples,
            'visits'=>$visits,
            'revenues'=>$revenues,
            'expends'=>$expends
        ]);
    }
}
