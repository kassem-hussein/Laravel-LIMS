@extends('printTemplate')
@section('title')
 Visits List
@endsection
@section('content')
<div class="fs-3">Visits List</div>
<div class="table-container mt-3">
    <table class="table table-bordered">
        <thead class="table-danger">
            <th>#</th>
            <th>Patient</th>
            <th>Tests</th>
            <th>sample status</th>
            <th>status</th>
            <th>propus</th>
            <th>visit date</th>
        </thead>
        <tbody>
            @for ($i =0;$i<1000;$i++)
            <tr>
                <td>{{$i+1}}</td>
                <td>Ali Omer</td>
                <td>CBC,GL</td>
                <td>clollected</td>
                <td>in lab</td>
                <td>suger suffer</td>
                <td>22/5/2024</td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection
