@extends('template')
@section("title")
    Dashboard
@endsection
@section('content')
    <div class="content-title">Dashboard</div>
    <div class="dash-cards">
        <x-dash-card  name="Patients" quantity="{{$patients}}" icon="fa fa-person" bgColor="bg-danger" />
        <x-dash-card  name="Tests" quantity="{{$tests}}" icon="fa fa-flask-vial" bgColor="bg-danger" />
        <x-dash-card  name="Samples" quantity="{{$samples}}" icon="fa fa-vial" bgColor="bg-danger" />
        <x-dash-card  name="Visits" quantity="{{$visits}}" icon="fa fa-person-walking-arrow-right" bgColor="bg-danger" />
        <x-dash-card  name="Expenditure" amount="{{$expends}}$" icon="fa fa-arrow-down" bgColor="bg-danger" />
        <x-dash-card  name="Revenue" amount="{{$revenues}}$" icon="fa fa-arrow-up" bgColor="bg-danger" />
    </div>
@endsection


