@extends('adminlte::page')


@section('content')
    <div class="d-flex align-items-center">
        <h1>Liste des leads</h1>
        <a href="{{ route('leads.create') }}" class="btn btn-primary ml-4">Créer</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($leads as $lead)
            <tr>
                <td>{{ $lead->id }}</td>
                <td>{{ $lead->name }}</td>
                <td>{{ $lead->email }}</td>
                <td>{{ $lead->phone }}</td>
                <td>{{ $lead->type }}</td>
                <td>
                    <a href="{{ route('leads.edit', ['id' => $lead->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i>Modifier</a>
                    <form action="{{ route('leads.destroy', ['id' => $lead->id]) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button class="btn" type="submit" label="Supprimer" theme="outline-danger" icon="fas fa-lg fa-trash" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce lead ?')"/>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

