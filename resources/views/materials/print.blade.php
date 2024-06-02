@extends('printTemplate')
@section('title')
 Materials
@endsection
@section('content')
<div class="fs-3">Materials List</div>
<div class="table-container mt-3">
    <table class="table table-bordered">
        <thead class="table-danger">
            <th>#</th>
            <th>name</th>
            <th>quantity</th>
            <th>Expired-date</th>
        </thead>
        <tbody>
            @php
                $i =0 ;
            @endphp
            @foreach ($materials as $material)
            <tr>
                <td>{{$i++ +1}}</td>
                <td>{{$material->name}}</td>
                <td>{{$material->quantity}}</td>
                <td>{{$material->expired_date}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
