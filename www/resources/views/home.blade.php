@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="gabDashboard">
        <h1>Tableau de bord</h1>
        <div class="w-50 boxTodo rounded-3 bg-white p-3" style="position: relative; left: 0px; top: 0px;">
            <div class="ui-sortable-handle">
                <h3 class="title">
                    <i class="ion ion-clipboard mr-1"></i>
                    To Do
                </h3>
            </div>
            <ul class="todoList todo-list ui-sortable" data-widget="todo-list">
                @foreach ($todos as $todo)
                    <li class="bg-white mt-4">
                        <span>Pour {{ $todo->contact->firstName }}</span>
                        <div class="tools d-inline-block float-right">
                            <i class="fas fa-edit"></i>
                            <form action="{{ route('contacts.destroyTodo', $todo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn delete"><i class="fas fa-trash mr-2"></i>Supprimer</button>
                            </form>
                        </div>
                        <div class="icheck-primary d-flex mt-4">
                            <form action="{{ route('todos.markDone', $todo->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="POST">
                                <input type="hidden" name="isCompleted" value="{{ $todo->done ? '0' : '1' }}">
                                @if ($todo->done)
                                    <span class="realisee rounded-3 px-2 py-1 mr-2"><i class="fas fa-check-circle mr-1"></i>Réalisée</span>
                                @elseif (!$todo->done)
                                    <span class="nonRealisee rounded-3 px-2 py-1 mr-2"><i class="fas fa-user-clock mr-1"></i>En cours</span>
                                @endif

                                <input class="boxCheck" type="checkbox" value="{{ $todo->id }}" name="todo{{ $todo->id }}" id="todoCheck{{ $todo->id }}" {{ $todo->done ? 'checked' : '' }}>
                                <span class="text ml-2">{{ $todo->content }}</span>
                                <small class="badge retour ml-2" ><i class="far fa-clock"></i> {{ $todo->created_at->diffForHumans() }}</small>
                            </form>
                        </div>

                    </li>
                @endforeach
            </ul>
            <div class="footer clearfix">
                <button type="button" class="btn send mb-3 float-right" id="add-todo-btn"><i class="fas fa-plus"></i> Ajouter une tâche</button>
            </div>

            <form method="POST" action="{{ route('contacts.storeTodo') }}" id="add-todo-form" style="display: none;" class="p-3">
                @csrf
                <div class="form-group">
                    <label for="contact">Pour qui ?</label>
                    <select name="contact_id" id="contact" class="form-control">
                        @foreach($contacts as $contact)
                            <option value="{{ $contact->id }}">{{ $contact->firstName . ' ' . $contact->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Contenu</label>
                    <textarea name="content" id="content" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn send d-block ml-auto"><i class="fas fa-plus-circle mr-2"></i>Créer</button>
            </form>

            @push('js')
                <script>
                    $(document).ready(function() {
                        $('#add-todo-btn').click(function() {
                            $('#add-todo-form').toggle();
                        });
                    });

                    window.addEventListener('load', function() {
                        var checkboxes = document.querySelectorAll('input[type="checkbox"]');

                        checkboxes.forEach(function(checkbox) {
                            checkbox.addEventListener('change', function() {
                                this.form.submit();
                            });
                        });
                    });
                </script>
            @endpush
        </div>
    </div>
@stop
