<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 

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

  public function authenticate(Request $request) {
    $username = $request->input('username'); 
    $password = $request->input('password'); 

    $user = \App\User::where('username', $username); 
     
    if ($user && Hash::check($password, $user->password)) {
      Auth::login($user);

      return response()->json([ 'success' => true ], 200); 
    }

    return response()->json([ 'success' => false ], 403);
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
