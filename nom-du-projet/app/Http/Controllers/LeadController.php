<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;


class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        return view('leads', compact('leads'));
    }

    // Autres méthodes d'action
}
