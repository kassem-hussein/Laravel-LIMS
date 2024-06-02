@extends('template')
@section('title')
    Tests
@endsection
@section('content')
@php
    $history=[
        'home'=>'/',
        'tests'=>'/tests',
        'parameters'=>'/parameters',
        'edit'=>''
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach

<form action="{{route('update_parameter',['id'=>$parameter->id])}}" method="post" class="mt-3">
    @csrf
    @method('PUT')
    <div class="input-item">
        <label for="test"  class="form-label require">test name</label>
        <select name="test_id" id="test" class="form-control">
            @foreach ($tests as $test)
                <option value="{{$test->id}}">{{$test->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('test_id'))
            <div  class="form-text text-danger">
                test is required
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="name" class="form-label require">Name</label>
        <input type="text" name="name" id="name" value="{{$parameter->name}}" class="form-control">
        @if($errors->has('name'))
            <div id="name error" class="form-text text-danger">
                {{$errors->first('name')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="referance-range" class="form-label require">referance range</label>
        <input type="text" id="referance-range" name="referance_range" value="{{$parameter->referance_range}}" class="form-control">
        @if($errors->has('referance_range'))
            <div class="form-text text-danger">
                {{$errors->first('referance_range')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="datatype"  class="form-label require">data type</label>
        <select name="data_type" id="dataType" class="form-control">
            <option value="text" @selected($parameter->name == "text")>text</option>
        </select>
        @if ($errors->has('data_type'))
            <div  class="form-text text-danger">
                {{$erros->first('data_type')}}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-outline-danger w-25">Save</button>
    </div>
</form>



@endsection
