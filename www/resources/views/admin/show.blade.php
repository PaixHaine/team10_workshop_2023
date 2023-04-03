@extends('adminlte::page')

@section('content')
    <h1>Profil de : {{ auth()->user()->name }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <h2>{{ auth()->user()->name }}</h2>
                    <p>Email : {{ auth()->user()->email }}</p>
                </div>
                <a class="btn edit" href="{{ route('admin.edit', ['id' => auth()->user()->id]) }}">Modifier</a>
            </div>
        </div>
    </div>
@stop
