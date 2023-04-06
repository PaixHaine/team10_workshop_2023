@extends('adminlte::page')


@section('content')
    <div class="gabContact">
        <div class="titreIndexContact">
            <h1>Liste des contacts</h1>
        </div>
        <a href="{{ route('contacts.create') }}" class="btn createContact d-block m-auto"><i class="fas fa-plus-circle mr-1"></i>Créer</a>
        <div class="form-group">
            <label for="nature" class="h4">Filtrer par contact:</label>
            <select class="form-control" id="nature" name="nature">
                <option value="all" {{ $selectedType == 'all' ? 'selected' : '' }}>Tous</option>
                <option value="lead" {{ $selectedType == 'lead' ? 'selected' : '' }}>Lead</option>
                <option value="prospect" {{ $selectedType == 'prospect' ? 'selected' : '' }}>Prospect</option>
                <option value="client" {{ $selectedType == 'client' ? 'selected' : '' }}>Client</option>
            </select>
            <script>
                const natureSelect = document.getElementById('nature');
                natureSelect.addEventListener('change', () => {
                    const nature = natureSelect.value;
                    window.location.href = `/contacts?nature=${nature}`;
                });
            </script>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Type</th>
                <th>Nature du client</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->firstName }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->type }}</td>
                    <td>{{ $contact->genre }}</td>
                    <td>{{ $contact->status }}</td>
                    <td>
                        <a class="ml-3 btn greenAction" href="{{ route('contacts.show', ['id' => $contact->id]) }}"><i class="fas fa-eye mr-1"></i>Voir</a>
                        <a href="{{ route('contacts.edit', ['id' => $contact->id]) }}" class="btn edit"><i class="fas fa-edit mr-1"></i>Modifier</a>
                        <form action="{{ route('contacts.destroy', ['id' => $contact->id]) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete mr-2">
                                <i class="fas fa-trash-alt"></i>
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex align-items-center">
            <div class="mt-3">
                <a href="{{ route('contacts.export', ['type' => $selectedType]) }}" class="btn edit">
                    <i class="fas fa-file-export mr-2"></i>Exporter les données
                </a>
            </div>
        </div>
    </div>
@endsection
