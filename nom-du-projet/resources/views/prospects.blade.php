@extends('layouts.app')

@section('content')
    <h1>Liste des prospects</h1>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
        </tr>
        </thead>
        <tbody>
        @foreach($prospects as $prospect)
            <tr>
                <td>{{ $prospect->id }}</td>
                <td>{{ $prospect->name }}</td>
                <td>{{ $prospect->email }}</td>
                <td>{{ $prospect->phone }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
