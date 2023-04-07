@extends('adminlte::page')

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <h4>Contenu de l'action "{{ $action->type }}"</h4>
            <p>Type d'action : {{ $action->type }}</p>
            <p>Notes associées : {{ $action->notes }}</p>
            @if ($action->type === 'appointment')
                <p>Date du rendez-vous : {{ $action->date_rdv }}</p>
            @endif
            <form action="{{ route('contacts.actions.destroy', [$contact, $action]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette action ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
@stop
