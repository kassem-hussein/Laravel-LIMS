@extends('template')
@section('title')
    Tests
@endsection
@section('content')
@php
    $history=[
        'home'=>'/',
        'tests'=>'/tests',
        'add'=>'/tests/add'
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach

<form action="{{route('store_test')}}" method="post" class="mt-3">
    @csrf
    <div class="input-item">
        <label for="name" class="form-label require">Name</label>
        <input type="text" name="name" id="name" class="form-control">
        @if($errors->has('name'))
            <div id="name error" class="form-text text-danger">
                {{$errors->first('name')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="sample_type"  class="form-label require">Sample type</label>
        <select name="sample_type" id="sample_type" class="form-control">
            <option value="Blood">Blood</option>
            <option value="Urine">Urine</option>
        </select>
        @if ($errors->has('sample_type'))
            <div  class="form-text text-danger">
                {{$errors->first('sample_type')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="price" class="form-label require">price</label>
        <input type="number" id="price" name="price" class="form-control">
        @if($errors->has('price'))
            <div class="form-text text-danger">
                {{$errors->first('price')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="cost time" class="form-label require">cost time</label>
        <input type="text" name="cost_time" id="cost time" class="form-control" placeholder="2h">
        @if($errors->has('cost_time'))
            <div  class="form-text text-danger">
                {{$errors->first('cost_time')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="requirments" class="form-label">requirments</label>
        <textarea class="form-control" id="requirements" name="requirments" placeholder="ex.on fasting only"></textarea>
        @if ($errors->has('requirments'))
            <div  class="form-text text-danger">
                {{$errors->first('requirments')}}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-outline-danger w-25">Save</button>
    </div>
</form>



@endsection
