<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Braintree;
use Braintree\Gateway;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('guest.home');
    }


    public function contacts(){
        return view('guest.contacts');
    }

    // public function checkout(){
    //     $gateway = new Braintree/Gateway ([
    //         'environment' => config('services.braintree.environment'),
    //         'merchantId' => config('services.braintree.merchantId'),
    //         'publicKey' => config('services.braintree.publicKey'),
    //         'privateKey' => config('services.braintree.privateKey')
    //     ]);
    //     return view('guest.checkout');
    // }




}
