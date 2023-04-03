@extends('adminlte::page')


@section('content_header')
    <h1>{{ $contact->firstName }} {{ $contact->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default p-3">
                <div class="card-body">
                    <h5>Email:</h5>
                    <div class="d-flex align-items-baseline">
                        <p>{{ $contact->email }}</p>
                    </div>
                    <h5>Téléphone:</h5>
                    <div class="d-flex align-items-baseline">
                        <p>{{ $contact->phone }}</p>
                        <a href="tel:{{ $contact->phone }}" id="call_button" data-id="{{ $contact->id }}" class="btn action ml-3"><i class="fas fa-phone mr-1"></i>Appeler</a>
                    </div>
                    <h5>Statut:</h5>
                    <p>{{ $contact->status }}</p>
                    <h5>Type:</h5>
                    <p>{{ $contact->type }}</p>
                    <h5>Genre:</h5>
                    <p>{{ $contact->genre }}</p>
                    <div class="d-flex">
                    </div>
                </div>
                <h3 class="my-4">Prendre un rendez-vous</h3>
                <form action="{{ route('contacts.rdv', $contact->id) }}" method="POST" class="container">
                    <div class="row">
                        <div class="col">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="rdv_date">Date et heure du rendez-vous:</label>
                                <input type="datetime-local" class="form-control" id="rdv_date" name="rdv_date" required>
                            </div>
                            <div class="form-group">
                                <label for="rdv_notes">Notes:</label>
                                <textarea class="form-control" id="rdv_notes" name="rdv_notes" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn action m-auto d-block"><i class="fas fa-calendar-day mr-1"></i>Ajouter un rendez-vous</button>
                        </div>
                    </div>
                </form>
                <!-- Formulaire pour envoyer et enregistrer un mail -->
                <h3 class="my-4">Envoyer un e-mail</h3>
                <form action="{{ route('contacts.mail', $contact->id) }}" method="POST" class="container">
                    <div class="row">
                        <div class="col">
                            @csrf
                            <div class="form-group">
                                <label for="notes">Notes :</label>
                                <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Message..." required></textarea>
                            </div>
                            <button type="submit" class="btn action m-auto d-block"><i class="fas fa-envelope-open mr-1"></i>Envoyer un e-mail</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a href="{{ route('contacts.index') }}" class="btn retour w-25 mr-2"><i class="fas fa-arrow-circle-left"></i>Retour</a>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn edit w-75"><i class="fas fa-edit"></i>Modifier</a>
            </div>
        </div>
    </div>
@stop
