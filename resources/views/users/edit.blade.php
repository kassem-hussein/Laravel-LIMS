@extends('template')
@section('title')
    Tests
@endsection
@section('content')
@php
    $history=[
        'home'=>'/',
        'users'=>'/users',
        'edit'=>''
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach
<form action="{{route('update_user',['id'=>$user->id])}}" method="post" class="mt-3">
    @method('PUT')
    @csrf
    <div class="input-item">
        <label for="name" class="form-label require">Name</label>
        <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
        @if($errors->has('name'))
            <div id="name error" class="form-text text-danger">
                {{$errors->first('name')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="username" class="form-label require">username</label>
        <input type="text" id="username" name="username" value="{{$user->username}}" class="form-control">
        @if($errors->has('username'))
            <div class="form-text text-danger">
                {{$errors->first('username')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="phone" class="form-label require">phone</label>
        <input type="tel" id="phone" name="phone" value="{{$user->phone}}" class="form-control">
        @if($errors->has('phone'))
            <div class="form-text text-danger">
                {{$errors->first('phone')}}
            </div>
        @endif
    </div>

    <label for="role"  class="form-label require">role</label>
        <select name="role" id="role" class="form-control">
            <option value="Doctor" @selected($user->role == 'Doctor') >Doctor</option>
            <option value="Nurse"  @selected($user->role == 'Nurse')>Nurse</option>
            <option value="Admin"  @selected($user->role == 'Admin')>Admin</option>
        </select>
        @if ($errors->has('role'))
            <div  class="form-text text-danger">
                {{$errors->first('role')}}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-outline-danger w-25">Save</button>
    </div>
</form>
@endsection
