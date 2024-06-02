@extends('template')
@section('title')
    Tests
@endsection
@section('content')
<div id="alert" class="bg-dark   position-fixed fixed-top w-100 h-100 d-none justify-content-center align-items-center">
    <div class="p-5 bg-white w-50 h-25 rounded">
        <div class="title fs-4"><i class="fa fa-triangle-exclamation fs-4 me-2 text-danger"></i>Do you want delete this patient</div>
        <div class="d-flex justify-content-end gap-2 align-items-center">
            <button onclick="closeAlert()" class="btn btn-outline-danger">Cancel</button>
            <button id="alertActionButton" class="btn btn-danger">Delete</button>
        </div>
    </div>
</div>
@php
    $history=[
        'home'=>'/',
        'visits'=>'/visits',
        'samples'=>'/samples'
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach
<div class="actions d-flex justify-content-end align-items-center gap-1">
    <a href="{{route('print_samples')}}" class="btn btn-outline-danger">print<i class="fa fa-print ms-3"></i></a>
</div>

<div class="table-container mt-3">
    <table class="table table-hover">
        <thead class="table-danger">
            <th>#</th>
            <th>sample #</th>
            <th>sample type</th>
            <th>status</th>
            <th>collection date</th>
        </thead>
        <tbody>
            @php
                $i =0;
            @endphp
            @foreach ($samples as $sample)
            <tr>
                <td>{{$i++ +1}}</td>
                <td>{{$sample->id}}</td>
                <td>{{$sample->sample_type}}</td>
                <td>
                    <form id="form" action="{{route('update_status_sample',['id'=>$sample->id])}}" method="post">
                        @csrf
                        <select onchange="this.form.submit()" name="status" class="border-0">
                            <option value="Not collected" @selected($sample->status == 'Not collected' )>Not Collected</option>
                            <option value="collected"     @selected($sample->status == 'collected' )>Collected</option>
                        </select>
                    </form>
                </td>
                <td>{{$sample->collection_date}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if (class_basename($samples) !== 'Collection')
<div class="pagination-container">
    <ul class="pagination d-flex justify-content-end">
     @if ($samples->previousPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$samples->previousPageUrl()}}">Previous</a></li>
     @endif
     @if ($samples->previousPageUrl() || $samples->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="#">{{$samples->currentPage()}}</a></li>
     @endif
     @if ($samples->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$samples->nextPageUrl()}}">Next</a></li>
     @endif
    </ul>
</div>
@endif
@endsection

