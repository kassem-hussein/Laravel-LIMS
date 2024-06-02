@extends('printTemplate')
@section('title')
 Revenue List
@endsection
@section('content')
<div class="fs-3">Revenue List</div>
<div class="table-container mt-3">
    <table class="table table-bordered">
        <thead class="table-danger">
            <th>#</th>
            <th>Amount</th>
            <th>Sorce</th>
            <th>description</th>
            <th>status</th>
            <th>date</th>
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
                <td>{{$revenue->decription}}</td>
                <td>{{$revenue->status}}</td>
                <td>{{$revenue->date}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">Total: {{$total}}$</td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

