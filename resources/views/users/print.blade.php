@extends('printTemplate')
@section('title')
 User List
@endsection
@section('content')
<div class="fs-3">User List</div>
<div class="table-container mt-3">
    <table class="table table-bordered">
        <thead class="table-danger">
            <th>#</th>
            <th>name</th>
            <th>username</th>
            <th>phone</th>
            <th>role</th>
        </thead>
        <tbody>
            @php
            $i=0;
        @endphp
        @foreach ($users as $user)
        <tr>
            <td>{{$i++ +1}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->role}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
