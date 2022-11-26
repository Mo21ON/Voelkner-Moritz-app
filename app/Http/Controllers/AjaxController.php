<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Company;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function counter()
    {
        return Food::all()->count();             
    }
}

// in dem AjaxController wird die Funktion "counter" definiert, als rückgabewert erhalten wir die gesamte ANzahl von den Spalten.
// Diese Funktion wird in der index.blade aufgerufen und dann dort ausgeführt.