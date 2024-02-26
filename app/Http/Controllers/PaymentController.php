<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Configuration;
use App\Models\Employer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $defaultPaymentDateQuery = Configuration::where('type','PAYMENT_DATE')->first();
        $defaultPaymentDate = $defaultPaymentDateQuery->value;
        $convertDatePayment = intval($defaultPaymentDate);
        $today= date('d');

        $isPaymentDay = false;
        if ($today == $convertDatePayment) {
            $isPaymentDay = true;
        }

        $payments = Payment::latest()->orderBy('id', 'desc')->paginate(6);
        return view('payment.index', compact('payments','isPaymentDay'));
    }

    public function initPayment(){
        $monthMapping = [
            'JANUARY'=>'JANVIER',
            'FEBRUARY'=>'FEVRIER',
            'MARCH'=>'MARS',
            'APRIL'=>'AVRIL',
            'MAY'=>'MAIS',
            'JUNE'=>'JUIN',
            'JULY'=>'JUILLET',
            'AUGUST'=>'AOUT',
            'SEPTEMBER'=>'SEPTEMBRE',
            'OCTOBER'=>'OCTOBRE',
            'NOVEMBER'=>'NOVEMBRE',
            'DECEMBER'=>'DECEMBRE'
        ];
        $currentMonth= strtoupper(Carbon::now()->formatLocalized('%B'));
        $currentMonthFrench = $monthMapping[$currentMonth] ?? '';
        $currentYear = Carbon::now()->format('Y');

        $employers = Employer::whereDoesntHave('payments', function(){
            
        });
    }
}
