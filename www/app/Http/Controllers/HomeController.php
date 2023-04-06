<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Contact;
use App\Models\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard()
    {
        $leadActions = Action::whereHas('contact', function ($query) {
            $query->where('genre', 'lead');
        })->count();

        $prospectActions = Action::whereHas('contact', function ($query) {
            $query->where('genre', 'prospect');
        })->count();

        $clientActions = Action::whereHas('contact', function ($query) {
            $query->where('genre', 'client');
        })->count();

        $appointmentCount = Action::where('type', 'appointment')->count();
        $emailCount = Action::where('type', 'email')->count();
        $todoCount = Action::where('type', 'todo')->count();

        $todos = Todo::all();
        $contacts = Contact::all();

        $leadsCount = count($contacts->where('genre', 'lead'));
        $prospectsCount = count($contacts->where('genre', 'prospect'));
        $clientsCount = count($contacts->where('genre', 'client'));

        $chartActionsData = [
            'labels' => ['Lead(s)', 'Prospect(s)', 'Client(s)'],
            'data' => [$leadActions, $prospectActions, $clientActions],
        ];

        $chartData = [
            'labels' => ['Lead(s)', 'Prospect(s)', 'Client(s)'],
            'data' => [$leadsCount, $prospectsCount, $clientsCount],
        ];

        $chartTypeActionData = [
            'labels' => ['Rendez-vous', 'Mail(s)', 'Todo'],
            'data' => [$appointmentCount, $emailCount, $todoCount],
        ];


        return view('home', compact('leadActions', 'prospectActions', 'clientActions', 'todos', 'chartData','chartActionsData','chartTypeActionData', 'contacts'));
    }

}
