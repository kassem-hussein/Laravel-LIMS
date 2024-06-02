@extends('template')
@section('title')
    Tests
@endsection
@section('content')
<div id="alert" class="bg-dark   position-fixed fixed-top w-100 h-100 d-none justify-content-center align-items-center">
    <div class="p-5 bg-white w-50 h-25 rounded">
        <div class="title fs-4"><i class="fa fa-triangle-exclamation fs-4 me-2 text-danger"></i>Do you want delete this group</div>
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
        'groups'=>'/groups'
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach
<div class="actions d-flex justify-content-end align-items-center gap-1">
    <a href="{{route('print_group')}}" class="btn btn-outline-danger">print<i class="fa fa-print ms-3"></i></a>
    <a href="{{route('create_group')}}" class="btn btn-danger">Add <i class="fa fa-add ms-3"></i></a>
</div>

<div class="table-container mt-3">
    <table class="table table-hover">
        <thead class="table-danger">
            <th>#</th>
            <th>name</th>
            <th>price</th>
            <th>Tests</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @php
                $i =0
            @endphp
            @foreach ($groups as $group)
            <tr>
                <td>{{$i++ +1}}</td>
                <td>{{$group->name}}</td>
                <td>{{$group->price}}$</td>
                <td>
                    @foreach ($group->getTests() as $test)
                        {{$group->getTestName($test['test_id'])}},
                    @endforeach
                </td>
                <td>
                    <div  class="d-flex align-items-center gap-1">
                        <a href="{{route('edit_group',['id'=>$group->id])}}" class="nav-link fa fa-edit"></a>
                        <form id="form-{{$group->id}}" action="{{route('delete_group',['id'=>$group->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" onclick="openAlert('form-{{$group->id}}')" class="nav-link fa fa-trash"></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if (class_basename($groups) !== 'Collection')
<div class="pagination-container">
    <ul class="pagination d-flex justify-content-end">
     @if ($tests->previousPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$tests->previousPageUrl()}}">Previous</a></li>
     @endif
     @if ($tests->previousPageUrl() || $tests->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="#">{{$tests->currentPage()}}</a></li>
     @endif
     @if ($tests->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$tests->nextPageUrl()}}">Next</a></li>
     @endif
    </ul>
</div>
@endif
@endsection

