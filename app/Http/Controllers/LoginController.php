<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /**
   * Sets username to the username column
   * @return string 
   */
  public function username() {
    return 'username';
  }

  /**
   * Authenticates a user
   * @param Request $request
   * @return redirect
   */
  public function authenticate(Request $request) {
    if (Auth::attempt($request->only('username', 'password'))) {
      return redirect()->intended('/admin/dashboard');
    } else {
      return redirect()->intended('/admin');
    }
  }

  /**
   * Logs the user out
   * @return redirect
   */
  public function logout() {
    $user = Auth::user(); 

    Auth::logout();
    return redirect()->intended('/');
  }
}
