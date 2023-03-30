<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    public function index()
    {
        $prospects = Prospect::all();
        return view('prospects', compact('prospects'));
    }

}
