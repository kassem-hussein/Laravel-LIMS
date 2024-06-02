@extends('printTemplate')
@section('title')
 Groups List
@endsection
@section('content')
<div class="fs-3">Groups List</div>
<div class="table-container mt-3">
    <table class="table table-bordered">
        <thead class="table-danger">
            <th>#</th>
            <th>name</th>
            <th>price</th>
            <th>Tests</th>
        </thead>
        <tbody>
            @php
                $i =0
            @endphp
            @foreach ($groups as $group)
            <tr>
                <td>{{$i++ +1}}</td>
                <td>{{$group->name}}</td>
                <td>{{$group->price}}$</td>
                <td>
                    @foreach ($group->getTests() as $test)
                        {{$group->getTestName($test['test_id'])}},
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
