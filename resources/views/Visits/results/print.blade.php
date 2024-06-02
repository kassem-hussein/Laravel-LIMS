@extends('printTemplate')
@section('title')
 {{$patient->name}}
@endsection
@section('content')
<div class="table-container mt-3">
    <div class="person-information d-flex align-items-center justify-content-between">
        <div>
            <div style="font-size:18px">
                @if($patient->gender == 'male')
                Mr.
                @else
                Mrs.
                @endif
                {{$patient->name}}
            </div>
            <div>{{$patient->age}} years</div>
        </div>
        <div>
            <div class="d-flex align-items-center">
                <i class="fa fa-phone me-2"></i><div>{{$patient->phone}}</div>
            </div>
            <div class="d-flex align-items-center">
                <i class="fa fa-message me-2"></i><div>{{$patient->email}}</div>
            </div>
        </div>
    </div>
    <hr class="mt-5 mb-5">
    <table class="table">
        <thead>
            <th>#</th>
            <th>name</th>
            <th>referace range</th>
            <th>value</th>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach ($results as $result)
                <tr>
                    <td>{{$i++ +1}}</td>
                    <td>
                        {{$result->name}}
                    </td>
                    <td>
                       {{$result->referance_range}}
                    </td>
                    <td>{{$result->value}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
