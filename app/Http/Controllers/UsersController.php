<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        if(count($users) > 5){
            $users =$users->toQuery()->paginate();
        }
        return view('users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'username'=>'required|unique:users,username',
            'role'=>'required|in:Admin,Doctor,Nurse',
            'password'=>'required|string',
            'phone'=>'required|digits:10',
        ]);
        User::create([
            'name'=>$request['name'],
            'username'=>$request['username'],
            'role'=>$request['role'],
            'password'=>$request['password'],
            'phone'=>$request['phone']
        ]);
        return redirect()->route('users');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name'=>'required|string',
            'username'=>'required|unique:users,username',
            'role'=>'required|in:Admin,Doctor,Nurse',
            'phone'=>'required|digits:10',
        ]);
        $user->update([
            'name'=>$request['name'],
            'username'=>$request['username'],
            'role'=>$request['role'],
            'phone'=>$request['phone']
        ]);
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users');

    }

    public function print(){
        $users =User::all();
        return view('users.print',['users'=>$users]);

    }
}
