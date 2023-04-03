@extends('adminlte::page')
@section('content')
    <h1>Editer un utilisateur</h1>

<form action="{{ route('admin.update', ['id' => auth()->user()->id]) }}" method="POST">
    @csrf
    @method('PUT')
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
        <input value="{{ $user->name }}" type="text" class="form-control" id="new_name" name="name">
    </div>

    <div class="form-group">
        <label for="email">Adresse e-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
    </div>

    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirmation du mot de passe</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>

    <button type="submit" class="btn action"><i class="fas fa-pen mr-2"></i>Mettre à jour</button>
</form>
@stop
