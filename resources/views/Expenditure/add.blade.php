@extends('template')
@section('title')
    Tests
@endsection
@section('content')
@php
    $history=[
        'home'=>'/',
        'Finace'=>'#finace',
        'Expenditure'=>'/expenditure',
        'add'=>'/expenditure/add'
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach

<form action="{{route('store_expends')}}" method="post" class="mt-3">
    @csrf
    <div class="input-item">
        <label for="amount" class="form-label require">Amount</label>
        <input type="number" name="amount" id="amount" class="form-control">
        @if($errors->has('amount'))
            <div id="amount error" class="form-text text-danger">
                {{$errors->first('amount')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="description" class="form-label require">description</label>
        <textarea  id="description" name="description" class="form-control"></textarea>
        @if($errors->has('description'))
            <div class="form-text text-danger">
                {{$errors->first('description')}}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-outline-danger w-25">Save</button>
    </div>
</form>



@endsection
