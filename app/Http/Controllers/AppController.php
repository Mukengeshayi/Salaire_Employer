<?php

namespace App\Http\Controllers;
use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;
use App\Models\Configuration;

class AppController extends Controller
{
    public function index(){
        $totalDepartements = Departement::all()->count();
        $totalEmployers = Employer::all()->count();
        $totalAdministrateurs= User::all()->count();

        $defaultPaymentDate = Configuration::where('type','PAYMENT_DATE')->first();
        dd($defaultPaymentDate);
        
        return view('dashboard', compact('totalDepartements','totalEmployers','totalAdministrateurs'));
    }
}
