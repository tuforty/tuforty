<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('dashboard.index');
  }

  /**
   * Get the management view.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function management(Request $request)
  {
    return view('dashboard.management.index', [
      'intent' => $request->user()->createSetupIntent(),
      'paymentMethods' => $request->user()->paymentMethods()
    ]);
  }
}
