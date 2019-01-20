<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  /**
   * Displays the login page  
   */
  public function login(Request $request) {
    return view('admin/login');
  }
}
