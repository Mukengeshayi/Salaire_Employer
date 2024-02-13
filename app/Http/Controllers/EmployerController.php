<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeEmployeRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Models\Departement;
use App\Models\Employer;
use Exception;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index(){
        $employers = Employer::with('departement')->paginate(10);
        return view('employers.index', compact('employers'));
    }

    public function create(){
        $departements = Departement::all();
        return view('employers.create', compact('departements'));
    }

    public function edit(Employer $employer){
        $departements = Departement::all();
        return view('employers.edit', compact('employer','departements'));
    }

    public function update(UpdateEmployerRequest $request, Employer $employer){
        try {
            $employer->nom = $request->nom;
            $employer->prenom = $request->prenom;
            $employer->departement_id = $request->departement_id;
            $employer->email = $request->email;
            $employer->contact = $request->contact;
            $employer->montant_journalier = $request->montant_journalier;

            $employer->update();

            return redirect()->route('employer.index')->with('success_message', "les informations de l'employé ont été mis à jour");

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function store(storeEmployeRequest $request){
          $inputs=Employer::create($request->all());
          if($inputs){
            return redirect()->route('employer.index')->with('success_message', 'Employé enregistré');
          };
    }

    public function delete( Employer $employer){
        $employer->delete();
        return redirect()->route('employer.index')->with('success_message', ' Employé supprimé');

    }

}
