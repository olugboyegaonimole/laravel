<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        //$users = User::orderBy('id', 'asc')->paginate(6);
        //return view('users.index')->with('users', $users);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dateOfBirth' => ['required', 'date', 'max:255'],
            'phoneNumber' => ['string', 'max:13', 'min:10'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->dateOfBirth = $request->input('dateOfBirth');
        $user->phoneNumber = $request->input('phoneNumber');
        $user->password = $request->input('password');
        $user->save();
 
        return redirect('/users')->with('success', 'User Created'); //with this line you pass the value of the 'success' variable (defined in your messages.blade.php file) to your layout file (and thereby to your posts view)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dateOfBirth' => ['required', 'date', 'max:255'],
            'phoneNumber' => ['string', 'max:13', 'min:10'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->dateOfBirth = $request->input('dateOfBirth');
        $user->phoneNumber = $request->input('phoneNumber');
        $user->password = $request->input('password');
        $user->save();
 
        return redirect('/users')->with('success', 'User Updated'); //with this line you pass the value of the 'success' variable (defined in your messages.blade.php file) to your layout file (and thereby to your posts view)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/users')->with('success', 'User Removed');

    }
}
