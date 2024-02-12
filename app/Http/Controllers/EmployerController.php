<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeEmployeRequest;
use App\Models\Departement;
use App\Models\Employer;
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

    public function edit( Employer $employer){
        return view('employers.edit', compact('employer'));
    }
    public function store(storeEmployeRequest $request){
          $inputs=Employer::create($request->all());
          if($inputs){
            return redirect()->route('employer.index')->with('success_message', 'Employé enregistré');
          };
    }

}
