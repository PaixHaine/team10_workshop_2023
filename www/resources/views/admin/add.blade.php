@extends('adminlte::page')

@section('content')
    <h1>Ajouter un utilisateur</h1>

    <form action="{{ route('admin.store', ['id' => auth()->user()->id]) }}" method="POST">
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
            <label for="new_name">Nom</label>
            <input type="text" class="form-control" id="new_name" name="name" required>
        </div>

        <div class="form-group">
            <label for="new_email">Adresse e-mail</label>
            <input type="email" class="form-control" id="new_email" name="email" required>
        </div>

        <div class="form-group">
            <label for="new_password">Mot de passe</label>
            <input type="password" class="form-control" id="new_password" name="password" required>
        </div>

        <div class="form-group">
            <label for="new_password_confirmation">Confirmation du mot de passe</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn createContact"><i class="fas fa-plus-circle mr-2"></i>Ajouter</button>
    </form>
@stop
