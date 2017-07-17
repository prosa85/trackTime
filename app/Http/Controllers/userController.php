<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class userController extends Controller
{
    //
    public function index(){
    	$users =  User::getUsers()->get();
    	return view('user.index',compact('users'));
    }

    public function show($id){
    	$user =  User::findOrFail($id);
    	return view('user.show',compact('user'));
    }
    public function update($id, Request $request){
    	$user = User::findOrFail($id);
    	$user->role = $request->role;
    	$user->name = $request->name;
    	$user->save();
    	return redirect('users');


    }

}
