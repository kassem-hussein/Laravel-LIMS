<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;
    protected $table ='groups';
    protected $fillable =[
        'name',
        'price'
    ];

    public function getTests(){
        return GroupTest::where('group_id',$this->id)->get();
    }
    public function getTestName(string $id){
        return Test::find($id)->name;
    }

}
