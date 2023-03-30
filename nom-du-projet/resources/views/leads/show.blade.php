@extends('adminlte::page')

@section('content_header')
    <h1>{{ $lead->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <h5>Email:</h5>
                    <p>{{ $lead->email }}</p>
                    <h5>Phone:</h5>
                    <p>{{ $lead->phone }}</p>
                    <h5>Status:</h5>
                    <p>{{ $lead->status }}</p>
                    <h5>Type:</h5>
                    <p>{{ $lead->type }}</p>
                </div>
            </div>
        </div>
    </div>
@stop
