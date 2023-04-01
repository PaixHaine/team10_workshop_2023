@extends('adminlte::page')


@section('content_header')
    <h1>{{ $contact->firstName }} {{ $contact->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <h5>Email:</h5>
                    <p>{{ $contact->email }}</p>
                    <h5>Phone:</h5>
                    <p>{{ $contact->phone }}</p>
                    <h5>Status:</h5>
                    <p>{{ $contact->status }}</p>
                    <h5>Type:</h5>
                    <p>{{ $contact->type }}</p>
                    <h5>Genre:</h5>
                    <p>{{ $contact->genre }}</p>
                    <button class="btn retour" onclick="window.history.back()">Retour</button>
                </div>
            </div>
        </div>
    </div>
@stop
