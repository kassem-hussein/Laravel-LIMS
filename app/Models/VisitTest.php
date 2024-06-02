<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitTest extends Model
{
    use HasFactory;
    protected $table ='visits_tests';
    protected $fillable =[
        'visit_id',
        'test_id'
    ];

}
