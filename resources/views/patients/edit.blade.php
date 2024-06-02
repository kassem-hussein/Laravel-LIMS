@extends('template')
@section('title')
    Tests
@endsection
@section('content')
@php
    $history=[
        'home'=>'/',
        'patients'=>'/patients',
        'edit'=>''
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach

<form action="{{route('update_patient',['id'=>$patient->id])}}" method="post" class="mt-3">
    @csrf
    @method('PUT')
    <div class="input-item">
        <label for="name" class="form-label require">Name</label>
        <input type="text" name="name" id="name" value="{{$patient->name}}" class="form-control">
        @if($errors->has('name'))
            <div id="name error" class="form-text text-danger">
                {{$errors->first('name')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="phone" class="form-label require">phone</label>
        <input type="tel" name="phone" id="phone" value="{{$patient->phone}}" class="form-control">
        @if($errors->has('phone'))
            <div id="phone error" class="form-text text-danger">
                {{$errors->first('phone')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="email" class="form-label require">email</label>
        <input type="email" name="email" id="email" value="{{$patient->email}}" class="form-control">
        @if($errors->has('email'))
            <div id="email error" class="form-text text-danger">
                {{$errors->first('email')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="gender"  class="form-label require">gender</label>
        <select name="gender" id="gender" class="form-control">
            <option value="male"   @selected($patient->gender == 'male')>Male</option>
            <option value="female" @selected($patient->gender == 'female')>Female</option>
        </select>
        @if ($errors->has('gender'))
            <div  class="form-text text-danger">
                {{$errors->first('gender')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="age" class="form-label require">age</label>
        <input type="number" id="age" name="age" value="{{$patient->age}}" class="form-control">
        @if($errors->has('age'))
            <div class="form-text text-danger">
                {{$errors->first('age')}}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-outline-danger w-25">Save</button>
    </div>
</form>



@endsection
