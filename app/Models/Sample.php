<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;
    protected $table ='samples';
    protected $fillable =[
        'sample_type',
        'status',
        'collection_date',
        'visit_id'
    ];
}
