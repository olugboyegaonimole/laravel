<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /*public function userSearch(Request $request)
    {
      if($request->has('search')){
        $users = User::search($request->get('search'))->get();  
      }else{
        $users = User::get();
      }


      return view('my-search', compact('users'));
    }*/


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
        return view('home');
    }
}
