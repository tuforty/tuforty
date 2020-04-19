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
   * Show the api keys view.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function keys()
  {
    return view('dashboard.keys.index');
  }

  /**
   * Get the billing view.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function billing(Request $request)
  {
    return view('dashboard.billing.index', [
      'intent' => $request->user()->createSetupIntent(),
      'paymentMethods' => $request->user()->paymentMethods()
    ]);
  }
}
