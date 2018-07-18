<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\Timetrack;

class pagosController extends Controller
{

    public function __construct(){
        $this->middleware('onlyAdmin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        $users = \App\User::all()->load('timetrack');
        $pagos = Pago::all();
        $hours = [];
        foreach ($pagos as $pago) {
            // dump($pago->week);
            
            $hours[$pago->week]["pablo"] = Timetrack::where([['week', $pago->week],['user_id', 1 ]])->get()->sum('hours');
            $hours[$pago->week]["pay1"] = $hours[$pago->week]["pablo"] * 20;
            $hours[$pago->week]["gordo"] = Timetrack::where([['week', $pago->week],['user_id', 3 ]])->get()->sum('hours');
            $hours[$pago->week]["pay2"] = $hours[$pago->week]["gordo"] * 5;
            $hours[$pago->week]["total"] =  $hours[$pago->week]["pay1"] + $hours[$pago->week]["pay2"];
            $hours[$pago->week]["color"] =  $hours[$pago->week]["total"] < $pago->netpay? "text-danger" : "text-info";
        }
        
        // return $hours->forPagos()->sum("hours");
        // dump($users->last()->timetrackForWeek(28));
        return view("pagos.index",compact("pagos", "users", "hours"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ){
        
        $monto = Pago::create($request->all());
        
        //event(new UpdateToBanckEvent($monto));
        return redirect('pagos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
