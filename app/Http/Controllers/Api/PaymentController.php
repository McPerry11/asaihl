<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller {
  public function __construct() {
    $this->middleware('auth', ['except' => 'store']);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    if ($request->hasFile('payment_slip')) {
      $barcode    = $request->input('barcode');
      $registrant = \App\Profile::where('barcode', $barcode)->get();

      $file = $request->file('payment_slip');
      $name = time() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('/uploads/' . $barcode), $name);

      $payment = new Payment;
      $payment->registrant()->associate(
        Registrant::whereHas('profile', function ($query) use ($barcode) {
          $query->where('barcode', $barcode);
        })->first()
      );
      $payment->type         = 'PAYMENT_SLIP';
      $payment->payment_file = $name;
      $payment->save();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    //
  }
}
