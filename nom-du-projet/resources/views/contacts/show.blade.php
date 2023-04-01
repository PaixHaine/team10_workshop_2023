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
                    <div class="d-flex align-items-baseline">
                        <p>{{ $contact->email }}</p>
                        <a href="mailto:{{ $contact->email }}" class="btn action ml-3"><i class="fas fa-envelope-open mr-1"></i>Envoyer un mail</a>
                    </div>
                    <h5>Téléphone:</h5>
                    <div class="d-flex align-items-baseline">
                        <p>{{ $contact->phone }}</p>
                        <a href="tel:{{ $contact->phone }}" class="btn action ml-3"><i class="fas fa-phone mr-1"></i>Appeler</a>
                    </div>
                    <h5>Statut:</h5>
                    <p>{{ $contact->status }}</p>
                    <h5>Type:</h5>
                    <p>{{ $contact->type }}</p>
                    <h5>Genre:</h5>
                    <p>{{ $contact->genre }}</p>
                    <div class="d-flex">
                        <a href="{{ route('contacts.index') }}" class="btn retour"><i class="fas fa-arrow-circle-left"></i>Retour</a>
                        <a href="{{ route('contacts.edit', ['id' => $contact->id]) }}" class="btn edit ml-2" ><i class="fas fa-edit"></i>Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
