<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiTokenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:passport');
    }

    /**
     * Get the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function get(Request $request)
    {
        $token = auth()->user()->api_token;

        if ($token) return compact('token');

        return $this->refresh($request);
    }

    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function refresh(Request $request)
    {
        $token = Str::random(60);
        $payload = ['api_token' => $token];
        $request->user()->forceFill($payload)->save();
        return compact('token');
    }
}
