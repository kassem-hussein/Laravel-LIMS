@extends('printTemplate')
@section('title')
 Tests List
@endsection
@section('content')
<div class="fs-3">Tests List</div>
<div class="table-container mt-3">
    <table class="table table-bordered">
        <thead class="table-danger">
            <th>#</th>
            <th>name</th>
            <th>sample type</th>
            <th>price</th>
            <th>cost time</th>
            <th>requirements</th>
        </thead>
        <tbody>
            @php
            $i = 0;
        @endphp
        @foreach ($tests as $test )

        <tr>
            <td>{{$i++ +1}}</td>
            <td>{{$test->name}}</td>
            <td>{{$test->sample_type}}</td>
            <td>{{$test->price}}$</td>
            <td>{{$test->cost_time}}h</td>
            <td>{{$test->requirments}}</td>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
