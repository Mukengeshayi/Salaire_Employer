<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveDepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index(){
        $departements = Departement::paginate(1);
        return view('departements.index', compact('departements'));
    }

    public function create(){
        return view('departements.create');
    }

    public function edit( Departement $departement){
        return view('departements.edit', compact('departements'));
    }

    # Interaction avec la DB

    public function store(Departement $departement, SaveDepartementRequest $request){
        //Enregistrer le departement
        try {
            $departement->name = $request->name;
            $departement->save();
            return redirect()->route('departement.index')->with('success_message', 'Departement enregistré');

        } catch (Exception $e) {
            dd($e);   
        }
    }
}
