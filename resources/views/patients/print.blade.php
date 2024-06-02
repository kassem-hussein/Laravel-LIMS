@extends('printTemplate')
@section('title')
 Patients List
@endsection
@section('content')
<div class="fs-3">Patients List</div>
<div class="table-container mt-3">
    <table class="table table-bordered">
        <thead class="table-danger">
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>gender</th>
            <th>age</th>
        </thead>
        <tbody>
            @php
                $i =0;
            @endphp
            @foreach ($patients as $patient)
            <tr>
                <td>{{$i++ +1}}</td>
                <td>{{$patient->name}}</td>
                <td>{{$patient->phone}}</td>
                <td>{{$patient->email}}</td>
                <td>{{$patient->gender}}</td>
                <td>{{$patient->age}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

