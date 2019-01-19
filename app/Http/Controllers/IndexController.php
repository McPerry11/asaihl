<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
  /**
   * Displays the login page
   *
   * @param   Illuminate|Http|Request   $request
   * @return  view
   */
  public function index(Request $request) {
    return view('index');
  }

  /**
   * Displays the registration page if request is `GET` or 
   * processes the data if request is `POST`
   *
   * @param   Illuminate|Http|Request   $request
   * @return  view
   */
  public function register(Request $request) {
    if ($request->isMethod('post')) {
      
    }

    return view('register');
  }
}
