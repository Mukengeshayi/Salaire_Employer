<?php

namespace App\Http\Controllers;
use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;
use App\Models\Configuration;
use Carbon\Carbon;

class AppController extends Controller
{
    public function index(){
        $totalDepartements = Departement::all()->count();
        $totalEmployers = Employer::all()->count();
        $totalAdministrateurs= User::all()->count();

        $defaultPaymentDate=null;
        $paymentNotification ="";
        $currentDay= Carbon::now()->day;

        $defaultPaymentDateQuery = Configuration::where('type','PAYMENT_DATE')->first();

        if ($defaultPaymentDateQuery) {
            $defaultPaymentDate = $defaultPaymentDateQuery->value;
            $convertDatePayment = intval($defaultPaymentDate);

            if ($currentDay < $convertDatePayment ) {
                $paymentNotification = "Le paiement doit avoir lieu le ".$defaultPaymentDate." de ce moi ";
            }else{
                $nextMonth= Carbon::now()->addMonth();
                $nextMonthName = $nextMonth ->format('F');
                $paymentNotification = "Le paiement doit avoir lieu le ".$defaultPaymentDate." de ce moi ". $nextMonthName;
            }

        }

        return view('dashboard', compact('totalDepartements','totalEmployers','totalAdministrateurs','paymentNotification'));
    }
}
