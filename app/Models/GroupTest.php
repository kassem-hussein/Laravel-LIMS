<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTest extends Model
{
    use HasFactory;
    protected $table ='groups_tests';
    protected $fillable =[
        'group_id',
        'test_id'
    ];
}
