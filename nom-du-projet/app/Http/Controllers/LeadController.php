<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(Lead::$createRules);

        $lead = new Lead();
        $lead->name = $validatedData['name'];
        $lead->firstName = $validatedData['firstName'];
        $lead->email = $validatedData['email'];
        $lead->phone = $validatedData['phone'];
        $lead->status = 'in_progress';
        $lead->type = $validatedData['type'];
        $lead->save();

        return redirect()->route('leads.index')->with('success', 'Lead créé avec succès.');
    }



    public function show($id)
    {
        $lead = Lead::findOrFail($id);
        return view('leads.show', compact('lead'));
    }

    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        return view('leads.edit', compact('lead'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:leads,email,'.$id,
            'phone' => 'required',
            'status' => 'required|in:in_progress,dead',
            'type' => 'required|in:B2B,B2C',
        ]);

        $lead = Lead::findOrFail($id);

        $lead->update($request->all());

        return redirect()->route('leads.show', ['id' => $lead->id])
            ->with('success', 'Lead updated successfully');
    }

    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return redirect()->route('leads.index')
            ->with('success', 'Lead deleted successfully');
    }
}
