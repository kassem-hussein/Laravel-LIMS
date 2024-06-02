<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;
    protected $table ='parameters';
    protected $fillable =[
        'name',
        'referance_range',
        'data_type',
        'test_id'
    ];
    public function getTestName(string $id){
        return Test::findOrFail($id)->name;
    }
}
