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
    $users = \App\User::limit(10)->get();
    $registrants = \App\Registrant::with('profile', 'companions')->limit(10)->get();

    if ($request->input('r')) {
      $search = $request->input('r');
      $registrants = \App\Registrant::join('profiles', 'registrants.profile_id', '=', 'profiles.id')
        ->where(function($query) use ($search) { 
        $query->where('first_name', 'LIKE', '%' . $search . '%')
          ->orWhere('last_name', 'LIKE', '%' . $search . '%');
      })->limit(10)
        ->get();
    }

    if ($request->input('u')) {
      $search = $request->input('u');
      $users = \App\User::where('username', 'LIKE', '%' . $search . '%')->limit(10)
        ->get();
    }

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
