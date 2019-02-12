<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Registrant;
use Illuminate\Http\Request;
use PayPal;

class PaypalController extends Controller {
  public function __construct() {
    $this->provider = PayPal::setProvider('express_checkout');
  }

  /**
   * @param Request $request
   */
  public function generate(Request $request) {
    if ($data = $this->getCart($request->query('id'))) {
      $response = $this->provider->setExpressCheckout($data);
      return redirect($response['paypal_link']);
    }
    abort(403);
  }

  /**
   * @param Request $request
   */
  public function confirm(Request $request) {
    $token   = $request->query('token');
    $payerID = $request->query('PayerID');

    $checkOutDetails = $this->provider->getExpressCheckoutDetails($token);

    $data = $this->getCart($barcode = explode('_', $checkOutDetails['INVNUM'])[0]);

    $response = $this->provider->doExpressCheckoutPayment($data, $token, $payerID);

    if ($response['ACK'] == 'Success') {
      $payment = new Payment;

      $payment->registrant()->associate(
        Registrant::whereHas('profile', function ($query) use ($barcode) {
          $query->where('barcode', $barcode);
        })->first()
      );
      $payment->type    = 'PAYPAL';
      $payment->amount  = $response['PAYMENTINFO_0_AMT'];
      $payment->remarks = 'Transaction ID: ' . $response['PAYMENTINFO_0_TRANSACTIONID'];
      $payment->save();

      return redirect()->route('index')->with('alert', ['type' => 'success', 'title' => 'Success', 'message' => 'Your payment has been completed.']);
    } else {
      return redirect()->route('index')->with('alert', ['type' => 'warning', 'title' => 'Warning', 'message' => $response['L_LONGMESSAGE0']]);
    }
  }

  /**
   * @param $id
   */
  public function getCart($barcode) {
    $registrant = Registrant::whereHas('profile', function ($query) use ($barcode) {
      $query->where('barcode', $barcode);
    })->with(['companions', 'profile'])->first();

    if (!$registrant) {
      return false;
    }

    if ($registrant->profile->citizenship == 'LOCAL') {
      $price = 6000;
      $this->provider->setCurrency('PHP');
    } else {
      $price = 300;
      $this->provider->setCurrency('USD');
    }

    $data['items'] = [
      [
        'name'  => 'Asaihl Ticket',
        'price' => $price,
        'qty'   => $registrant->companions->count() + 1
      ]
    ];

    $data['invoice_id']          = $registrant->profile->barcode . '_' . uniqid();
    $data['invoice_description'] = "{$registrant->profile->barcode}";
    $data['return_url']          = url('/payment/confirm');
    $data['cancel_url']          = url('/');

    $total = 0;

    foreach ($data['items'] as $item) {
      $total += $item['price'] * $item['qty'];
    }
    $data['shipping_discount'] = 0;
    $data['total']             = $total;

    return $data;
  }
}
