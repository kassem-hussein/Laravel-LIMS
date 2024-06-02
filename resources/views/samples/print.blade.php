@extends('printTemplate')
@section('title')
 Samples List
@endsection
@section('content')
<div class="fs-3">Samples List</div>
<div class="table-container mt-3">
    <table class="table table-bordered">
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
               {{$sample->status}}
            </td>
            <td>{{$sample->collection_date}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
