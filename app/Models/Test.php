<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $table ='tests';
    protected $fillable = [
        'name',
        'price',
        'sample_type',
        'requirments',
        'cost_time',
    ];

    public function testIsExitInGroup(String $group_id){
        return count(GroupTest::where('group_id',$group_id)->where('test_id',$this->id)->get()) != 0;
    }
}
