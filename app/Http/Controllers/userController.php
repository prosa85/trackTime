<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class userController extends Controller
{
    public function __construct(){
        $this->middleware('onlyAdmin');

    }

    public function index(){
    	
        $users =  User::getUsers()->get();
    	return view('user.index',compact('users'));
    }

    public function show($id){
    	$user =  User::findOrFail($id);
    	return view('user.show',compact('user'));
    }
    public function update($id, Request $request){
    	if (\Auth::user()->role==3){
            $user = User::findOrFail($id);
            $user->role = $request->role;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->save();
        }
    	return redirect('users');


    }

    public function store($id, Request $request){
        if (\Auth::user()->role==3){
            User::create($request->all());
            
        }
        return redirect('users');


    }

}
