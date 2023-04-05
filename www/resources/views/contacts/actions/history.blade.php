<div class="row mt-4">
    <div class="col-md-12">
        <h4>Historique des événements</h4>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Date de l'événement</th>
                <th>Type d'événement</th>
                <th>Contenu</th>
                <th>Action(s)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contact->actions as $action)
                <tr>
                    <td>{{ $action->created_at }}</td>
                    <td>{{ $action->type }}</td>
                    <td>
                        <a href="{{ route('contacts.actions.show', ['contact' => $contact->id, 'action_id' => $action->id]) }} " class="btn send"><i class="fas fa-eye mr-2"></i>Voir le contenu</a>
                    </td>
                    <td>

                    <form action="{{ route('contacts.actions.destroy', [$contact, $action]) }}" method="POST">
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
    </div>
</div>
