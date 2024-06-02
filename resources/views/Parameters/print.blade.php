@extends('printTemplate')
@section('title')
Parameters List
@endsection
@section('content')
<div class="fs-3">Parameters List</div>
<div class="table-container mt-3">
    <table class="table table-bordered">
        <thead class="table-danger">
            <th>#</th>
            <th>name</th>
            <th>teferance range</th>
            <th>datatype</th>
            <th>test name</th>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach ($parameters as $parameter)
            <tr>
                    <td>{{$i++ +1}}</td>
                    <td>{{$parameter->name}}</td>
                    <td>{{$parameter->referance_range}}</td>
                    <td>{{$parameter->data_type}}</td>
                    <td>{{$parameter->getTestName($parameter->test_id)}}</td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
