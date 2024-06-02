<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Visit extends Model
{
    use HasFactory;
    protected $table = 'visits';
    protected $fillable =[
        'sample_status',
        'status',
        'purpose',
        'patient_id'
    ];
    public function getTestsIDs(){
       return VisitTest::where('visit_id',$this->id)->get();
    }
    public function getTestName(string $id){
        return Test::findOrFail($id)->name;
    }
    public function getPatientName(){
        return Patient::findOrFail($this->patient_id)->name;
    }
    public function getPatientPhone(){
        return Patient::findOrFail($this->patient_id)->phone;
    }
    public function checkSamplesCollected(){
        $samples = Sample::where('visit_id',$this->id)->get();
        foreach($samples as $sample){
            if($sample->status !='collected'){
                return false;
            }
        }
        return true;
    }
}
