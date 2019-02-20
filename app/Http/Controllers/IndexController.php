<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller {
  /**
   * Displays the login page
   *
   * @param   Illuminate|Http|Request   $request
   * @return  view
   */
  public function index(Request $request) {
    // return view('index');
    return redirect()->to('welcome');
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

  public function update() {
    putenv('PATH=/usr/bin');
    return '<pre>' . shell_exec('cd ' . public_path() . ' && git pull origin master 2>&1') . ' </pre>';
  }
}
