<!-- resources/views/admin/partials/deleteUser.blade.php -->

<form action="{{ route('admin.delete', ['id' => auth()->user()->id]) }}" method="POST">
    @csrf
    @method('DELETE')

    <div class="form-group">
        <label for="user_id">Utilisateur</label>
        <select class="form-control" id="user_id" name="user_id">
        @foreach($users as $user)
            @if($user->id != auth()->user()->id) <!-- Empêcher la suppression de l'utilisateur connecté -->
                <option value="{{ $user->id }}">{{ $user->email }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>
