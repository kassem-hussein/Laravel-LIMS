<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupTest;
use App\Models\Test;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $groups = Group::all();
        if(count($groups) > 5){
            $groups = $groups->toQuery()->paginate(5);
        }
        return view('groups.index',['groups'=>$groups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tests = Test::all();
        return view('groups.add',['tests'=>$tests]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'price'=> 'required|numeric',
            'tests'=>'required|array'
        ]);
        $group = Group::create([
            'name'=>$request['name'],
            'price'=>$request['price'],
        ]);
        foreach($request['tests'] as $test){
            GroupTest::create([
                'group_id'=>$group->id,
                'test_id'=>$test
            ]);
        }
        return redirect('/groups');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tests = Test::all();
        $group = Group::findOrFail($id);
        return view('groups.edit',['tests'=>$tests,'group'=>$group]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $group = Group::findOrFail($id);
        $request->validate([
            'name'=>'required|string',
            'price'=> 'required|numeric',
            'tests'=>'required|array'
        ]);
        $group->update([
            'name'=>$request['name'],
            'price'=>$request['price'],
        ]);
        $grouTests = GroupTest::where('group_id',$group->id)->get();
        foreach($grouTests as $groupTest){
            $groupTest->delete();
        }
        foreach($request['tests'] as $test){
            GroupTest::create([
                'group_id'=>$group->id,
                'test_id'=>$test
            ]);
        }
        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group =Group::findOrFail($id);
        $grouTests = GroupTest::where('group_id',$group->id)->get();
        foreach($grouTests as $groupTest){
            $groupTest->delete();
        }
        $group->delete();
        return redirect('/groups');
    }
    public function print(){
        $groups = Group::all();
        return view('groups.print',['groups'=>$groups]);
    }
}
