<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitParamResult extends Model
{
    use HasFactory;
    protected $table ='vistis_parameters_result';
    protected $fillable =[
        'visit_id',
        'parameter_id',
        'value'
    ];
}
