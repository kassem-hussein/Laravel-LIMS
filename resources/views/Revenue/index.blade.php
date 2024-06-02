@extends('template')
@section('title')
    Tests
@endsection
@section('content')
<div id="alert" class="bg-dark   position-fixed fixed-top w-100 h-100 d-none justify-content-center align-items-center">
    <div class="p-5 bg-white w-50 h-25 rounded">
        <div class="title fs-4"><i class="fa fa-triangle-exclamation fs-4 me-2 text-danger"></i>Do you want delete this Revenue ?</div>
        <div class="d-flex justify-content-end gap-2 align-items-center">
            <button onclick="closeAlert()" class="btn btn-outline-danger">Cancel</button>
            <button id="alertActionButton" class="btn btn-danger">Delete</button>
        </div>
    </div>
</div>
@php
    $history=[
        'home'=>'/',
        'Finace'=>'#finace',
        'revenue'=>'/revenue'
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach
<div class="actions d-flex justify-content-end align-items-center gap-1">
    <a href="/revenue/print" class="btn btn-outline-danger">print<i class="fa fa-print ms-3"></i></a>
    <a href="/revenue/add" class="btn btn-danger">Add <i class="fa fa-add ms-3"></i></a>
</div>

<div class="table-container mt-3">
    <table class="table table-hover">
        <thead class="table-danger">
            <th>#</th>
            <th>Amount</th>
            <th>Sorce</th>
            <th>description</th>
            <th>Patient Name</th>
            <th>status</th>
            <th>date</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach ($revenues as $revenue)
            <tr>
                <td>{{$i++ +1}}</td>
                <td>{{$revenue->amount}}$</td>
                <td>{{$revenue->source}}</td>
                <td>
                    {{$revenue->decription}}
                </td>
                <td>
                @if ($revenue->patient_id)

                        {{$revenue->patientName()}}

                @endif
                </td>
                <td>
                    <form action="{{route('change_revenue_status',['id'=>$revenue->id])}}" method="post">
                        @csrf
                        <select onchange="this.form.submit()" name="status" class="border-0">
                            <option value="Not Paid" @selected($revenue['status'] == 'Not Paid')>Not Paid</option>
                            <option value="Paid"     @selected($revenue['status'] == 'Paid')>Paid</option>
                        </select>
                    </form>

                </td>
                <td>{{$revenue->date}}</td>
                <td>
                    <div>
                        <form id="form-{{$revenue->id}}" action="{{route('delete_revenue',['id'=>$revenue->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" onclick="openAlert('form-{{$revenue->id}}')" class="nav-link fa fa-trash"></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@if (class_basename($revenues) !== 'Collection')
<div class="pagination-container">
    <ul class="pagination d-flex justify-content-end">
     @if ($revenues->previousPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$revenues->previousPageUrl()}}">Previous</a></li>
     @endif
     @if ($revenues->previousPageUrl() || $revenues->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="#">{{$revenues->currentPage()}}</a></li>
     @endif
     @if ($revenues->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$revenues->nextPageUrl()}}">Next</a></li>
     @endif
    </ul>
</div>
@endif

@endsection

