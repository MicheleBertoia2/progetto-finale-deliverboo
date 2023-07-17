<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\DishController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/checkback', function (){
    $gateway = new Braintree\Gateway ([
            'environment' => 'sandbox',
            'merchantId' => 'rntzhj86v4qk7kgg',
            'publicKey' => 't2w3mtyt57nkq88m',
            'privateKey' => 'c00c3934fa1742f2cfbc08d2be2643a9'
            // 'environment' => config('services.braintree.environment'),
            // 'merchantId' => config('services.braintree.merchantId'),
            // 'publicKey' => config('services.braintree.publicKey'),
            // 'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->clientToken()->generate();

        return view('guest.checkout', compact('token'));
});

Route::post('/checkout', function(Request $request){

    $gateway = new Braintree\Gateway ([
        'environment' => 'sandbox',
        'merchantId' => 'rntzhj86v4qk7kgg',
        'publicKey' => 't2w3mtyt57nkq88m',
        'privateKey' => 'c00c3934fa1742f2cfbc08d2be2643a9'
        // 'environment' => config('services.braintree.environment'),
        // 'merchantId' => config('services.braintree.merchantId'),
        // 'publicKey' => config('services.braintree.publicKey'),
        // 'privateKey' => config('services.braintree.privateKey')
    ]);

    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;

    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

    if ($result->success) {
        $transaction = $result->transaction;
        // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
        return back()->with('success_message', 'Transazione andata a buon fine! ID:'  . $transaction->id);
    } else {
        $errorString = "";

        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }

        // $_SESSION["errors"] = $errorString;
        // header("Location: " . $baseUrl . "index.php");

        return back()->withErrors('Errore! Messaggio:'  . $result->message);
    }
});

Route::middleware(['auth','verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        Route::resource('restaurants', RestaurantController::class);
        Route::resource('dishes', DishController::class);
    });




require __DIR__.'/auth.php';


Route::get('{any?}',function(){
    return view('guest.home');
})->where('any','.*')->name('home');
