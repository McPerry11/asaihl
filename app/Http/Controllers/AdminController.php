<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  /**
   * Displays the login page  
   *
   * @param   Illuminate|Http|Request   $request
   * @return  view
   */
  public function login(Request $request) {
    return view('admin/login');
  }

  /**
   * Displays the admin dashboard
   *
   * @param   Illuminate|Http|Request   $request
   * @return  view
   */
  public function index(Request $request) {
    $users = \App\User::all();
    $registrants = \App\Registrant::with('profile', 'companions')->limit(25)->get();

    return view('admin/dashboard', [ 'users' => $users, 'registrants' => $registrants ]);
  }

  /**
   * Displays the log list page
   *
   * @param   Illuminate|Http|Request   $request
   * @return  view
   */
  public function logs(Request $request) {
    return view('admin/logs');
  }

  /**
   * Removes the user data from the session 
   * and redirects the user to the login page
   *
   * @param   Illuminate|Http|Request   $request
   * @return  view
   */
  public function logout(Request $request) {
    return redirect('admin');
  }
}
