@extends('template')
@section('title')
    Tests
@endsection
@section('content')
<div id="alert" class="bg-dark   position-fixed fixed-top w-100 h-100 d-none justify-content-center align-items-center">
    <div class="p-5 bg-white w-50 h-25 rounded">
        <div class="title fs-4"><i class="fa fa-triangle-exclamation fs-4 me-2 text-danger"></i>Do you want delete this parameter</div>
        <div class="d-flex justify-content-end gap-2 align-items-center">
            <button onclick="closeAlert()" class="btn btn-outline-danger">Cancel</button>
            <button id="alertActionButton" class="btn btn-danger">Delete</button>
        </div>
    </div>
</div>
@php
    $history=[
        'home'=>'/',
        'tests'=>'/tests',
        'parameters'=>'/parameters'
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach
<div class="actions d-flex justify-content-end align-items-center gap-1">
    <a href="{{route('print_parameter')}}" class="btn btn-outline-danger">print<i class="fa fa-print ms-3"></i></a>
    <a href="{{route('create_parameter')}}" class="btn btn-danger">Add <i class="fa fa-add ms-3"></i></a>
</div>

<div class="table-container mt-3">
    <table class="table table-hover">
        <thead class="table-danger">
            <th>#</th>
            <th>name</th>
            <th>teferance range</th>
            <th>datatype</th>
            <th>test name</th>
            <th>Actions</th>
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
                <td>
                    <div  class="d-flex align-items-center gap-1">
                        <a href="{{route('edit_parameter',['id'=>$parameter->id])}}" class="nav-link fa fa-edit"></a>
                        <form id="form-{{$parameter->id}}" action="{{route('delete_parameter',['id'=>$parameter->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" onclick="openAlert('form-{{$parameter->id}}')" class="nav-link fa fa-trash"></button>
                        </form>
                    </div>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>

</div>
@if (class_basename($parameters) !== 'Collection')
<div class="pagination-container">
    <ul class="pagination d-flex justify-content-end">
     @if ($parameters->previousPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$parameters->previousPageUrl()}}">Previous</a></li>
     @endif
     @if ($parameters->previousPageUrl() || $parameters->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="#">{{$parameters->currentPage()}}</a></li>
     @endif
     @if ($parameters->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$parameters->nextPageUrl()}}">Next</a></li>
     @endif
    </ul>
</div>
@endif

@endsection

