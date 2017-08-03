<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cuenta;
use App\Http\Requests;
use Carbon\Carbon;

class CuentasController extends Controller
{	
	public function __construct(){
		$this->middleware('onlyAdmin');
	}

    public function index(){
    	$cuentas = Cuenta::all();
    	$total = $cuentas->sum('amount');
    	return view('cuentas.index',compact('cuentas','total'));
    }

    public function store(Request $request ){
    	$request->monto;
    	$monto = new Cuenta;
    	$monto->amount = $request->monto;
    	$monto->date = Carbon::now()->toDateString();
    	$monto->save();
    	return redirect('cuentas');
    }
}
