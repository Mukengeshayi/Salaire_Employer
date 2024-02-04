<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveDepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index(){
        $departements = Departement::paginate(4);
        return view('departements.index', compact('departements'));
    }

    public function create(){
        return view('departements.create');
    }

    public function edit( Departement $departement){
        return view('departements.edit', compact('departement'));
    }

    # Interaction avec la DB

    public function store(Departement $departement, SaveDepartementRequest $request){
        // dd($request);
        //Enregistrer le departement
        try {
            $departement->name = $request->name;
            $departement->save();
            return redirect()->route('departement.index')->with('success_message', 'Departement enregistré');

        } catch (Exception $e) {
            dd($e);
        }
    }
    public function update(Departement $departement, SaveDepartementRequest $request){
        // dd($request);
        //Enregistrer le departement
        try {
            $departement->name = $request->name;
            $departement->update();
            return redirect()->route('departement.index')->with('success_message', 'Departement modifier');

        } catch (Exception $e) {
            dd($e);
        }
    }
    public function delete(Departement $departement){
        // dd($request);
        //Enregistrer le departement
        try {
            $departement->delete();
            return redirect()->route('departement.index')->with('success_message', 'Departement supprimé');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
