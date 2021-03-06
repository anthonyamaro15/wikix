<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
      // Displaying most recently worked on project in user dashboard home
        $project = DB::table('projects')->orderBy('updated_at', 'desc')->take(1)->get();
        return view('home', ['project' => $project]);
    }
}
