<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Configuration;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $defaultPaymentDateQuery = Configuration::where('type','PAYMENT_DATE')->first();
        $defaultPaymentDate = $defaultPaymentDateQuery->value;
        $convertDatePayment = intval($defaultPaymentDate);
        $today= date('d');

        $isPaymentDay = false;
        if ($today = $convertDatePayment) {
            $isPaymentDate = true;
        }
        $payments = Payment::latest()->orderBy('id', 'desc')->paginate(6);
        return view('payment.index', compact('payments','isPaymentDay'));
    }
}
