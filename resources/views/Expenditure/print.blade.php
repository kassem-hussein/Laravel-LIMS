@extends('printTemplate')
@section('title')
 Expenditure List
@endsection
@section('content')
<div class="fs-3">Expenditure List</div>
<div class="table-container mt-3">
    <table class="table table-bordered">
        <thead class="table-danger">
            <th>#</th>
            <th>Amount</th>
            <th>Descritpion</th>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($expends as $expend)
            <tr>
                <td>{{$i++ +1}}</td>
                <td>{{$expend->amount}}$</td>
                <td>{{$expend->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
