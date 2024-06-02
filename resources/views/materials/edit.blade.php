@extends('template')
@section('title')
    Tests
@endsection
@section('content')
@php
    $history=[
        'home'=>'/',
        'materials'=>'/materials',
        'edit'=>'',
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach

<form action="{{route('update_material',['id'=>$material->id])}}" method="post" class="mt-3">
    @method('PUT')
    @csrf
    <div class="input-item">
        <label for="name" class="form-label require">Name</label>
        <input type="text" name="name" id="name" value="{{$material->name}}" class="form-control">
        @if($errors->has('name'))
            <div id="name error" class="form-text text-danger">
                {{$errors->first('name')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="quantity" class="form-label require">quantity</label>
        <input type="number" id="quantity" name="quantity" value="{{$material->quantity}}" class="form-control">
        @if($errors->has('quantity'))
            <div class="form-text text-danger">
               {{$errors->first('quantity')}}
            </div>
        @endif
    </div>
    <label for="expired"  class="form-label require">Expired Date</label>
        <input type="date" name="expired_date" id="expired" value="{{$material->expired_date}}" class="form-control" />
        @if ($errors->has('expired_date'))
            <div  class="form-text text-danger">
                {{$errors->first('expired_date')}}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-outline-danger w-25">Save</button>
    </div>
</form>
@endsection
