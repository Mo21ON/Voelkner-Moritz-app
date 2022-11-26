<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller                // der FoodController beinhaltet die gesamten Funktionen der Anwendung, sowie die Routen
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();

        return view('foods.index', compact('foods'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foods.create');
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',                                    // hier wird eine Ressource angelegt, der Returnwert ist in diesem Fall die Meldung, dass die neue Resource erfolgreich angelegt wurde
        ]);

        Food::create($request->all());

        return redirect()->route('foods.index')
            ->with('success', 'Lebensmittel erfolgreich abgelegt!');
    }

    /**
     * 
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view('foods.show', compact('food'));
    }

    /**
     * 
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('foods.edit', compact('food'));
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required',                               // bei Nicht-Eingabe der Felder, wird hier mit der Variable Request angefordert, dass die Felder erforderlich sind. Sonst erscheint eine Fehlermeldung
            'detail' => 'required',
        ]);

        $food->update($request->all());

        return redirect()->route('foods.index')
            ->with('success', 'Lebensmittel erfolgreich aktualisiert!');
    }

    /**
     *
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();                                                                 // hier wird die Funktion "destroy" ausgeführt, welche letzendlich die EIngabe löscht. Als Returnwert erhält man den Text. 

        return redirect()->route('foods.index')
            ->with('success', 'Lebensmittel wurde entnommen.');
    }
}
