@extends('template')
@section('title')
    Tests
@endsection
@section('content')
@php
    $history=[
        'home'=>'/',
        'visits'=>'/visits',
        'add'=>'/visits/add'
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach

<form action="{{route('store_visit')}}" method="post" class="mt-3">
    @csrf
    <div class="input-item">
        <label for="patient"  class="form-label require">Patient</label>
        <select name="patient" id="patient" class="form-control">
            @foreach ($patients as $patient)
                <option value="{{$patient->id}}">{{$patient->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('patient'))
            <div  class="form-text text-danger">
                {{$errors->first('patient')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="tests"  class="form-label require">tests</label>
        <select name="tests[]" id="tests" class="form-control" multiple>
            @foreach ($tests as $test)
                <option value="{{$test->id}}">{{$test->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('tests'))
            <div  class="form-text text-danger">
                {{$errors->first('tests')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="status"  class="form-label require">status</label>
        <select name="status" id="status" class="form-control">
            <option value="started">started</option>
            <option value="in lab">in lab</option>
            <option value="complated">complated</option>
        </select>
        @if ($errors->has('status'))
            <div  class="form-text text-danger">
                {{$errors->first('status')}}
            </div>
        @endif
    </div>
    <div class="input-item">
        <label for="propus" class="form-label">propus</label>
        <textarea class="form-control" id="propus" name="propus" placeholder="ex.on fasting only"></textarea>
        @if ($errors->has('propus'))
            <div  class="form-text text-danger">
                {{$errors->first('propus')}}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-outline-danger w-25">Save</button>
    </div>
</form>



@endsection
