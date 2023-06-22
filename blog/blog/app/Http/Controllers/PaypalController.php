<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PayPal\Api\PaymentExecution;

class PaypalController extends Controller
{
    public function index(Request $request)
    {

        $record_id = $request->record_id;
        $type = $request->type;
        $price = $request->price;

        // After Step 1
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AWJ_axzyV2kjM415CquUeI9p5TYrFK8zoPJoHDhkQvfYXMHK4Yc-W3i-vbM-qj6wORvB32cqPyTK3bja',     // ClientID
                'EL8q-TA_NIPjHpEf3bimFON_B2QK3auMCWUWb-MC7SymfWmtc_Bmwry5KF81AyTG0ThwnQKBfZBTEcHl'      // ClientSecret
            )
        );


        // After Step 2
$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal($price);
$amount->setCurrency('USD');

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl(route('paypay_return',['record_id' => $record_id, 'type' => $type]))
    ->setCancelUrl(route('paypay_cancel'));

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);

    // After Step 3
try {
    $payment->create($apiContext);
    echo $payment;

    echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";

    return redirect($payment->getApprovalLink());
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    echo $ex->getData();
}



    }


    public function paypalReturn($record_id ,$type)
    {
        // After Step 1
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AWJ_axzyV2kjM415CquUeI9p5TYrFK8zoPJoHDhkQvfYXMHK4Yc-W3i-vbM-qj6wORvB32cqPyTK3bja',     // ClientID
                'EL8q-TA_NIPjHpEf3bimFON_B2QK3auMCWUWb-MC7SymfWmtc_Bmwry5KF81AyTG0ThwnQKBfZBTEcHl'      // ClientSecret
            )
        );

        // Get payment object by passing paymentId
        $paymentId = $_GET['paymentId'];
        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
        $payerId = $_GET['PayerID'];

       // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            // Execute payment
            $result = $payment->execute($execution, $apiContext);
            if($result->state=="approved"){

            return redirect()->route('payment_approval', ['record_id' => $record_id, 'type' => $type])->with('message', 'State saved correctly!');
    

            }
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        }
    }

    public function paypalCancel()
    {
        return"oreder Cancelled";
    }
}
