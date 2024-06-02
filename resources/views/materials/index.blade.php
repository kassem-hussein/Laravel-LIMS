@extends('template')
@section('title')
    Tests
@endsection
@section('content')
<div id="alert" class="bg-dark   position-fixed fixed-top w-100 h-100 d-none justify-content-center align-items-center">
    <div class="p-5 bg-white w-50 h-25 rounded">
        <div class="title fs-4"><i class="fa fa-triangle-exclamation fs-4 me-2 text-danger"></i>Do you want delete this material ?</div>
        <div class="d-flex justify-content-end gap-2 align-items-center">
            <button onclick="closeAlert()" class="btn btn-outline-danger">Cancel</button>
            <button id="alertActionButton" class="btn btn-danger">Delete</button>
        </div>
    </div>
</div>
@php
    $history=[
        'home'=>'/',
        'materials'=>'/materials',
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach
@php
    $search = request()->query('material','');
@endphp
<div class="d-flex mt-3 justify-content-between align-items-center">
    <div class="search-form">
        <form method="get" class="d-flex">
            <input type="text" name="material" value="{{$search}}" class="form-control search" placeholder="search..."/>
            <div  onclick="console.log(this.parentNode.submit())" class="search-icons-container rounded-end bg-danger text-white w-25 d-flex p-2 justify-content-center align-items-center">
                <i  class="fa fa-search"></i>
            </div>
        </form>
    </div>
    <div class="actions d-flex justify-content-end align-items-center gap-1">
        <a href="{{route('print_material')}}" class="btn btn-outline-danger">print<i class="fa fa-print ms-3"></i></a>
        <a href="{{route('create_material')}}" class="btn btn-danger">Add <i class="fa fa-add ms-3"></i></a>
    </div>
</div>


<div class="table-container mt-3">
    <table class="table table-hover">
        <thead class="table-danger">
            <th>#</th>
            <th>name</th>
            <th>quantity</th>
            <th>Expired-date</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach ($materials as $material)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$material->name}}</td>
                <td>{{$material->quantity}}</td>
                <td>{{$material->expired_date}}</td>
                <td class="d-flex align-items-center gap-1">
                    <a href="{{route('edit_material',['id'=>$material->id])}}" class="nav-link fa fa-edit"></a>
                    <form id="form-{{$material->id}}" action="{{route('delete_material',['id'=>$material->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" onclick="openAlert('form-{{$material->id}}')" class="nav-link fa fa-trash"></button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@if (class_basename($materials) !== 'Collection')
<div class="pagination-container">
    <ul class="pagination d-flex justify-content-end">
     @if ($materials->previousPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$materials->previousPageUrl()}}">Previous</a></li>
     @endif
     @if ($materials->previousPageUrl() || $materials->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="#">{{$materials->currentPage()}}</a></li>
     @endif
     @if ($materials->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$materials->nextPageUrl()}}">Next</a></li>
     @endif
    </ul>
</div>
@endif

@endsection

