@extends('adminlte::page')

@section('content')
    <div class="d-flex align-items-center justify-content-center">
        <h1>Liste des utilisateurs</h1>
        <a href="{{ route('admin.add') }}" class="btn createContact ml-4"><i class="fas fa-plus-circle mr-1"></i>Créer</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('admin.edit', ['id' => $user->id]) }}" class="btn edit"><i class="fas fa-edit"></i>Modifier</a>
                                    <form action="{{ route('admin.delete', ['id' => $user->id]) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <x-adminlte-button class="btn delete" type="submit" label="Supprimer" icon="fas fa-lg fa-trash" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce lead ?')"/>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
