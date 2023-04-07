<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Contact;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ContactController extends Controller
{
    //Redirection vers login si pas connecté
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $selectedType = $request->input('nature');
        $contactsQuery = Contact::query();

        if ($selectedType && $selectedType !== 'all') {
            $contactsQuery->where('genre', $selectedType);
        }

        $contacts = $contactsQuery->get();

        return view('contacts.index', [
            'contacts' => $contacts,
            'selectedType' => $selectedType,
        ]);
    }


    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(Contact::$createRules);

        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->firstName = $validatedData['firstName'];
        $contact->email = $validatedData['email'];
        $contact->phone = $validatedData['phone'];
        $contact->status = 'in_progress';
        $contact->type = $validatedData['type'];
        $contact->genre = $validatedData['genre'];

        $contact->save();

//        $todo = new Todo();
//        $todo->content = $request->todo;
//        $todo->contact_id = $contact->id;
//        $todo->save();
//
//        $contact->todo_count = $contact->todos->count();

        return redirect()->route('contacts.index')->with('success', 'Contact créé avec succès.');
    }



    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $rules = array_merge(Contact::$updateRules, [
            'email' => 'required|email|unique:contacts,email,'.$contact->id,
        ]);

        $request->validate($rules);

        $contact->name = $request->input('name');
        $contact->firstName = $request->input('firstName');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->type = $request->input('type');
        $contact->genre = $request->input('genre');
        $contact->status = $request->input('status');
        $contact->save();

        return redirect()->route('contacts.show', ['id' => $contact->id])
            ->with('success', 'Contact updated successfully');
    }




    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully');
    }

    public function export(Request $request)
    {
        $selectedType = $request->input('type');
        $contactsQuery = Contact::query();

        if ($selectedType && $selectedType !== 'all') {
            $contactsQuery->where('type', $selectedType);
        }

        $contacts = $contactsQuery->get();

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=contacts.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $columns = ['id', 'name', 'email', 'phone', 'type', 'genre', 'status', 'is_interested', 'is_active'];

        $callback = function() use ($contacts, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($contacts as $contact) {
                $row = [
                    $contact->id,
                    $contact->name,
                    $contact->email,
                    $contact->phone,
                    $contact->type,
                    $contact->genre,
                    $contact->status,
                    $contact->is_interested,
                    $contact->is_active,
                ];
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->streamDownload($callback, 'contacts.csv', $headers);
    }

    public function storeTodo(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'content' => 'required',
        ]);

        $contact = Contact::findOrFail($request->contact_id);

        $todo = new Todo();
        $todo->content = $request->content;

        $todo->contact_id = $contact->id;
        $todo->save();

        $contact->todo_count = $contact->todos->count();

        $contact->todos()->save($todo);

        return back()->with('success', 'La Todo a été ajoutée avec succès.');
    }

    public function destroyTodo(Todo $todo)
    {
        $todo->delete();

        return back()->with('success', 'La Todo a été supprimée avec succès.');
    }

    public function markDone(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);

        // On vérifie si la tâche a été cochée
        $wasDone = $todo->done;

        $todo->done = $request->input('isCompleted');
        $todo->save();

        // Si la tâche était cochée et a été décochée
        if ($wasDone && !$todo->done) {
            // On supprime l'action associée au contact
            $action = Action::where('contact_id', $todo->contact_id)
                ->where('type', 'todo')
                ->where('notes', $todo->content)
                ->first();
            if ($action) {
                $action->delete();
            }
        } elseif (!$wasDone && $todo->done) {
            // Si la tâche était décochée et a été cochée
            // On ajoute une nouvelle action pour le contact
            $action = new Action();
            $action->contact_id = $todo->contact_id;
            $action->type = 'todo';
            $action->notes = $todo->content;
            $action->save();
        }

        return redirect()->back()->with('success', 'La tâche a été marquée comme réalisée.');
    }




}

