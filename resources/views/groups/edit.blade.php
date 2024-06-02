@extends('template')
@section('title')
    Tests
@endsection
@section('content')
@php
    $history=[
        'home'=>'/',
        'tests'=>'/tests',
        'groups'=>'/groups',
        'edit'=>''
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach

<form action="{{route('update_group',['id'=>$group->id])}}" method="post" class="mt-3">
    @csrf
    @method('PUT')
    <div class="input-item">
        <label for="name" class="form-label require">Name</label>
        <input type="text" name="name" id="name" value="{{$group->name}}" class="form-control">
        @if($errors->has('name'))
            <div id="name error" class="form-text text-danger">
                {{$errors->first('name')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="price" class="form-label require">price</label>
        <input type="number" id="referance-range" name="price" value="{{$group->price}}" class="form-control">
        @if($errors->has('price'))
            <div class="form-text text-danger">
                {{$errors->fisrt('price')}}
            </div>
        @endif
    </div>
    <label for="tests"  class="form-label require">tests</label>
        <select name="tests[]" id="tests" class="form-control" multiple>
            @foreach ($tests as $test)
                <option value="{{$test->id}}" @selected($test->testIsExitInGroup($group->id))>{{$test->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('tests'))
            <div  class="form-text text-danger">
                {{$erros->first('tests')}}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-outline-danger w-25">Save</button>
    </div>
</form>



@endsection
