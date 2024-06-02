@extends('template')
@section('title')
    Tests
@endsection
@section('content')
@php
    $history=[
        'home'=>'/',
        'visits'=>'/visits',
        'results'=>'#result',
        'add'=>'#add',
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach

<form action="{{route('set_visit_result',['id'=>$id])}}" method="post" class="mt-3">
    @csrf
    <table class="table table-hover mt-3">
        <thead class="table-danger">
            <th>name</th>
            <th>referace range</th>
            <th>value</th>
        </thead>
        <tbody id="paramBody">
            @php
                $i = 0;
            @endphp
            @foreach ($parameters as $parameter)
            <tr>
                <td>
                    {{$parameter->name}}
                </td>
                <td>
                    {{$parameter->referance_range}}
                </td>
                <td>
                    <div class="input-item">
                        <label  class="form-label require">result</label>
                        <input type="hidden" name="parameters[{{$i}}][id]" value="{{$parameter->id}}">
                        <input type="text" name="parameters[{{$i++}}][value]" class="form-control require">
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-outline-danger w-25">Save</button>
    </div>
</form>
@endsection
