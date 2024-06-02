@extends('template')
@section('title')
    Tests
@endsection
@section('content')
@php
    $history=[
        'home'=>'/',
        'Finace'=>'#finace',
        'revenue'=>'/revenue',
        'add'=>'/revenue/add'
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach

<form action="{{route('store_revenue')}}" method="post" class="mt-3">
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
        <label for="source" class="form-label require">Source</label>
        <select name="source" id="from" class="form-control">
            <option value="patient">Patient</option>
            <option value="other" >other</option>
        </select>
        @if($errors->has('source'))
            <div id="source error" class="form-text text-danger">
                {{$errors->first('source')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="description" class="form-label required">descriotion</label>
        <textarea name="description" class="form-control" id="description"></textarea>
        @if($errors->has('description'))
            <div id="description error" class="form-text text-danger">
                {{$errors->first('description')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="date" class="form-label require">date</label>
        <input type="date" id="date" name="date" class="form-control"/>
        @if($errors->has('date'))
            <div class="form-text text-danger">
                {{$errors->first('date')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="status"  class="form-label require">status</label>
        <select name="status" id="status" class="form-control">
            <option value="Not Paid">Not Paid</option>
            <option value="Paid">Paid</option>
        </select>
        @if($errors->has('status'))
            <div class="form-text text-danger">
                {{$errors->first('status')}}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-outline-danger w-25">Save</button>
    </div>
</form>



@endsection
