@extends('adminlte::page')
@section('content')
    <h1>Modifier un contact</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <form action="{{ route('contacts.update', ['id' => $contact->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $contact->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="firstName">Prénom</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ old('firstName', $contact->firstName) }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $contact->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Statut</label>
                            <select class="form-control" id="status" name="status">
                                <option value="in_progress" {{ $contact->status == 'in_progress' ? 'selected' : '' }}>En cours</option>
                                <option value="dead" {{ $contact->status == 'dead' ? 'selected' : '' }}>Non intéressé</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="b2b" {{ $contact->type == 'b2b' ? 'selected' : '' }}>B2B</option>
                                <option value="b2c" {{ $contact->type == 'b2c' ? 'selected' : '' }}>B2C</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <select name="genre" id="genre" class="form-control" required>
                                <option value="{{ \App\Models\Contact::GENRE_1 }}" {{ $contact->genre === \App\Models\Contact::GENRE_1 ? 'selected' : '' }}>Lead</option>
                                <option value="{{ \App\Models\Contact::GENRE_2 }}" {{ $contact->genre === \App\Models\Contact::GENRE_2 ? 'selected' : '' }}>Prospect</option>
                                <option value="{{ \App\Models\Contact::GENRE_3 }}" {{ $contact->genre === \App\Models\Contact::GENRE_3 ? 'selected' : '' }}>Client</option>
                            </select>
                        </div>
                        <a href="{{ route('contacts.index') }}" class="btn retour"><i class="fas fa-arrow-circle-left"></i>Retour</a>
                        <button type="submit" class="btn action"><i class="fas fa-pen-alt mr-2"></i>Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
