<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('pages.home');
    }

    public function getAjax($id)
    {
        $user = \App\User::find($id);

        if ($user == null) {
            return response()->json([
                'code' => 404,
                'success' => false,
                'error' => 'User not found'
            ], 404);
        } else {
            return response()->json([
                'code' => 200,
                'success' => true,
                'error' => $user
            ]);
        }
    }
}
