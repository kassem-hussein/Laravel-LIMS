@extends('template')
@section('title')
    Tests
@endsection
@section('content')
<div id="alert" class="bg-dark   position-fixed fixed-top w-100 h-100 d-none justify-content-center align-items-center">
    <div class="p-5 bg-white w-50 h-25 rounded">
        <div class="title fs-4"><i class="fa fa-triangle-exclamation fs-4 me-2 text-danger"></i>Do you want delete this user ?</div>
        <div class="d-flex justify-content-end gap-2 align-items-center">
            <button onclick="closeAlert()" class="btn btn-outline-danger">Cancel</button>
            <button id="alertActionButton" class="btn btn-danger">Delete</button>
        </div>
    </div>
</div>
@php
    $history=[
        'home'=>'/',
        'users'=>'/users',
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach
<div class="actions d-flex justify-content-end align-items-center gap-1">
    <a href="{{route('print_user')}}" class="btn btn-outline-danger">print<i class="fa fa-print ms-3"></i></a>
    <a href="{{route('create_user')}}" class="btn btn-danger">Add <i class="fa fa-add ms-3"></i></a>
</div>

<div class="table-container mt-3">
    <table class="table table-hover">
        <thead class="table-danger">
            <th>#</th>
            <th>name</th>
            <th>username</th>
            <th>phone</th>
            <th>role</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach ($users as $user)
            <tr>
                <td>{{$i++ +1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->role}}</td>
                <td class="d-flex align-items-center gap-1">
                    <a href="{{route('edit_user',['id'=>$user->id])}}" class="nav-link fa fa-edit"></a>
                    <form id="form-{{$user->id}}" action="{{route('delete_user',['id'=>$user->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" onclick="openAlert('form-{{$user->id}}')" class="nav-link fa fa-trash"></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@if (class_basename($users) !== 'Collection')
<div class="pagination-container">
    <ul class="pagination d-flex justify-content-end">
     @if ($users->previousPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$users->previousPageUrl()}}">Previous</a></li>
     @endif
     @if ($users->previousPageUrl() || $users->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="#">{{$users->currentPage()}}</a></li>
     @endif
     @if ($users->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$users->nextPageUrl()}}">Next</a></li>
     @endif
    </ul>
</div>
@endif

@endsection

