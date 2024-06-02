@extends('template')
@section('title')
    Tests
@endsection
@section('content')
<div id="alert" class="bg-dark   position-fixed fixed-top w-100 h-100 d-none justify-content-center align-items-center">
    <div class="p-5 bg-white w-50 h-25 rounded">
        <div class="title fs-4"><i class="fa fa-triangle-exclamation fs-4 me-2 text-danger"></i>Do you want delete this visit</div>
        <div class="d-flex justify-content-end gap-2 align-items-center">
            <button onclick="closeAlert()" class="btn btn-outline-danger">Cancel</button>
            <button id="alertActionButton" class="btn btn-danger">Delete</button>
        </div>
    </div>
</div>
@php
    $history=[
        'home'=>'/',
        'visits'=>'/visits'
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach
<div class="actions d-flex justify-content-end align-items-center gap-1">
    <a href="/visits/print" class="btn btn-outline-danger">print<i class="fa fa-print ms-3"></i></a>
    <a href="/visits/add" class="btn btn-danger">Add <i class="fa fa-add ms-3"></i></a>
</div>

<div class="table-container mt-3">
    <table class="table table-hover">
        <thead class="table-danger">
            <th>#</th>
            <th>Patient</th>
            <th>Tests</th>
            <th>sample status</th>
            <th>status</th>
            <th>propus</th>
            <th>visit date</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach ($visits as $visit)
                <tr>
                    <td>{{$i++ +1}}</td>
                    <td>{{$visit->getPatientName()}}</td>
                    <td>
                        @foreach ($visit->getTestsIDs() as $visitTest)
                            {{$visit->getTestName($visitTest->test_id)}},
                        @endforeach
                    </td>
                    <td>
                        @if ($visit->checkSamplesCollected())
                            Collected
                        @else
                            Not Collected
                        @endif
                    </td>
                    <td>{{$visit->status}}</td>
                    <td>{{$visit->purpose}}</td>
                    <td>{{$visit->created_at}}</td>
                    <td>
                        <div class="d-flex align-items-center gap-1">
                            @if ($visit->checkSamplesCollected() && $visit->status == 'done')
                                <a href="{{route('visit_print_result',['id'=>$visit->id])}}" class="nav-link fa fa-print"></a>
                                <a href="https://wa.me/+963{{substr($visit->getPatientPhone(),1)}}" class="nav-link fa-brands fa-whatsapp fa-fw"></a>
                            @endif
                            @if ($visit->checkSamplesCollected() && $visit->status != 'done' && Auth::user()->role != 'Nurse' )
                                <a href="{{route('visitResultPage',['id'=>$visit->id])}}" class="nav-link fa fa-add"></a>
                            @endif
                            <form id="form-{{$visit->id}}" action="{{route('delete_visit',['id'=>$visit->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="openAlert('form-{{$visit->id}}')" class="nav-link fa fa-trash"></button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>

</div>
@if (class_basename($visits) !== 'Collection')
<div class="pagination-container">
    <ul class="pagination d-flex justify-content-end">
     @if ($visits->previousPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$visits->previousPageUrl()}}">Previous</a></li>
     @endif
     @if ($visits->previousPageUrl() || $visits->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="#">{{$visits->currentPage()}}</a></li>
     @endif
     @if ($visits->nextPageUrl())
        <li class="page-item"><a class="page-link border-danger text-danger" href="{{$visits->nextPageUrl()}}">Next</a></li>
     @endif
    </ul>
</div>
@endif

@endsection

