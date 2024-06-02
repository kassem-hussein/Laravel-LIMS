<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;
    protected $table ='revenue';
    protected $fillable =[
        'amount',
        'source',
        'date',
        'patient_id',
        'decription',
        'status'
    ];
    public function patientName(){

        return Patient::findOrFail($this->patient_id)->name;
    }
}
