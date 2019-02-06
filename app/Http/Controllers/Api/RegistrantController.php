<?php

namespace App\Http\Controllers\Api;

use App\Companion;
use App\Http\Controllers\Controller;
use App\Mail\RegistrationMail;
use App\Profile;
use App\Registrant;
use Illuminate\Http\Request;
use Mail;

class RegistrantController extends Controller {
  public function __construct() {
    $this->middleware('auth', ['only' => ['index', 'show']]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return Registrant::with('profile', 'companions')->get();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $profile = new Profile;

    $profile->fill($request->only([
      'first_name',
      'last_name',
      'middle_initial',
      'institution',
      'email_address',
      'contact_number'
    ]));
    $profile->barcode = $this->generateBarcode();

    Mail::to($profile->email_address)->send(new RegistrationMail($profile));
    
    $profile->save();

    $registrant = new Registrant;
    $registrant->profile()->associate($profile);

    $registrant->save();

    $companionsCount = $request->comp_first_name[0] ? count($request->comp_first_name) : 0;

    for ($i = 0; $i < $companionsCount; $i++) {
      $profile = new Profile;

      $profile->first_name     = $request->comp_first_name[$i];
      $profile->last_name      = $request->comp_last_name[$i];
      $profile->middle_initial = $request->comp_middle_initial[$i];
      $profile->institution    = $request->comp_institution[$i];
      $profile->email_address  = $request->comp_email_address[$i];
      $profile->contact_number = $request->comp_contact_number[$i];
      $profile->barcode        = $this->generateBarcode();

      $profile->save();

      Mail::to($profile->email_address)->send(new RegistrationMail($profile));

      $companion = new Companion;
      $companion->profile()->associate($profile);
      $companion->registrant()->associate($registrant);
      $companion->save();
    }

    return response()->json([ 'success' => true, 'barcode' => $profile->barcode ], 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    return Registrant::with('profile', 'companions')->where('id', $id)->findOrFail();
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

  /**
   * @return mixed
   */
  public function generateBarcode() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    do {
      $string = '';

      for ($i = 0; $i < 10; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
      }

    } while (Profile::where('barcode', $string)->get()->isNotEmpty());

    return $string;
  }
}
