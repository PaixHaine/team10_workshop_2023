<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Action;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActionController extends Controller
{
    public function rdv(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rdv_date' => 'required|date',
            'rdv_notes' => 'required|nullable|string',
        ]);

        $action = new Action();
        $action->contact_id = $id;
        $action->type = 'appointment';
        $action->date_rdv = $validatedData['rdv_date'];
        $action->notes = $validatedData['rdv_notes'];
        $action->save();

        return redirect()->route('contacts.show', ['id' => $id])->with('success', 'E-mail envoyé et action enregistrée.');
    }

    public function mail(Request $request, $id)
    {
        $request->validate([
            'notes' => 'required|nullable|string|max:255',
        ]);

        $contact = Contact::findOrFail($id);

        // Envoyer l'e-mail
        Mail::to($contact->email)->send(new ContactMail($contact));

        // Enregistrer l'action
        $action = new Action([
            'contact_id' => $contact->id,
            'type' => 'email',
            'notes' => $request->notes,
        ]);
        $action->save();

        // Rediriger vers la vue 'show' avec un message de réussite
        return redirect()->route('contacts.show', $contact->id)->with('success', 'E-mail envoyé et action enregistrée.');
    }


    public function call(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        // Enregistrer l'action
        $action = new Action([
            'contact_id' => $contact->id,
            'type' => 'call',
        ]);
        $action->save();

        // Retourner une réponse JSON avec un message de réussite
        return response()->json(['success' => 'Appel téléphonique enregistré.']);
    }


    public function history(Contact $contact)
    {
        $actions = $contact->actions()->orderBy('created_at', 'desc')->paginate(10);

        return view('contacts.actions.history', compact('contact', 'actions'));
    }

    public function showAction($contact_id, $action_id)
    {
        $contact = Contact::find($contact_id);
        $action = Action::find($action_id);

        if (!$contact || !$action || $action->contact_id !== $contact->id) {
            abort(404);
        }

        return view('contacts.actions.show', compact('contact', 'action'));
    }

    public function destroyAction(Contact $contact, Action $action)
    {
        abort_unless($contact->id === $action->contact_id, 404);

        $action->delete();

        return redirect()->route('contacts.show', $contact)->with('success', 'L\'action a été supprimée avec succès.');
    }

}
