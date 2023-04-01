@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="">Création d'un nouveau contact</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="firstName">Prénom</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="{{\App\Models\Contact::TYPE_B2B}}">B2B</option>
                        <option value="{{\App\Models\Contact::TYPE_B2C}}">B2C</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <select name="genre" id="genre" class="form-control" required>
                        <option value="{{\App\Models\Contact::GENRE_1}}">Lead</option>
                        <option value="{{\App\Models\Contact::GENRE_2}}">Prospect</option>
                        <option value="{{\App\Models\Contact::GENRE_3}}">Client</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>
    </div>
@endsection
