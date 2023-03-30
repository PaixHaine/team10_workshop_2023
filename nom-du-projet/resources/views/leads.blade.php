@extends('layouts.app')

@section('content')
    <h1>Liste des leads</h1>
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
        @foreach($leads as $lead)
            <tr>
                <td>{{ $lead->id }}</td>
                <td>{{ $lead->name }}</td>
                <td>{{ $lead->email }}</td>
                <td>{{ $lead->phone }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
