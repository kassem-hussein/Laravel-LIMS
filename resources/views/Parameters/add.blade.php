@extends('template')
@section('title')
    Tests
@endsection
@section('content')
@php
    $history=[
        'home'=>'/',
        'tests'=>'/tests',
        'parameters'=>'/parameters',
        'add'=>'/parametes/add'
        ];
@endphp
@foreach ($history as $key=>$val)
    <a class="nav-link d-inline-block fs-5 font-bold" href="{{$val}}">{{ucwords($key)}}</a>
    @if (end($history) != $val)
       <i class="fa fa-arrow-right"></i>
    @endif
@endforeach

<form action="{{route('store_parameter')}}"  method="post" class="mt-3">
    @csrf
    <div class="actions d-flex justify-content-between align-items-center gap-1">
        <div class="input-item w-25">
            <label for="test"  class="form-label require">test name</label>
            <select name="test_id" id="test" class="form-control">
                @foreach ($tests as $test)
                    <option value="{{$test->id}}">{{$test->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('test_id'))
                <div  class="form-text text-danger">
                    {{$erros->first('test_id')}}
                </div>
            @endif
        </div>
        <button type="button" onclick="addRowParams()" class="btn btn-danger">Add row<i class="fa fa-add ms-3"></i></button>
    </div>
    <table class="table table-hover mt-3">
        <thead class="table-danger">
            <th>name</th>
            <th>referace range</th>
            <th>data type</th>
            <th>action</th>
        </thead>
        <tbody id="paramBody">
            @php
                $index = 0;
            @endphp
            <tr>
                    <td>
                        <div class="input-item">
                            <label for="name" class="form-label require">Name</label>
                            <input type="text" name="parameters[{{$index}}][name]" id="name" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="input-item">
                            <label for="referance-range" class="form-label require">referance range</label>
                            <input type="text" id="referance-range" name="parameters[{{$index}}][referance_range]" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="input-item">
                            <label for="datatype"  class="form-label require">data type</label>
                            <select name="parameters[{{$index}}][data_type]" id="dataType" class="form-control">
                                <option value="text">text</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div onclick="deleteRowParams(this)" class="d-flex mt-3 align-items-center justify-content-center">
                            <i class="fa fa-close fs-5 text-danger text-center"></i>
                        </div>
                    </td>
            </tr>
        </tbody>
    </table>












    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-outline-danger w-25">Save</button>
    </div>
</form>



@endsection
