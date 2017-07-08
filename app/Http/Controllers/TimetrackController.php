<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Timetrack;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\User;
class TimetrackController extends Controller
{   
    public function __construct(){

    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {   
        if(!\Auth::id()){
            
            return redirect()->route('root');
        }
        $user = \Auth::user();
        $times= Timetrack::forUser();
        $timetrack = $times->paginate(15);

        return view('timetrack.index', compact('timetrack','user'));
    }

    public function weekForUser($week, User $user){
        
        $times= Timetrack::forUser()->forWeek($week);
        $timetrack = $times->paginate(15);
        
        return view('timetrack.index', compact('timetrack','user','week'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('timetrack.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        if(!\Auth::id()){
            
            return redirect()->route('root');
        }
        //dd($request->all());
        $data['start'] = Carbon::parse($request->start)->timestamp;
        $data['week'] = Carbon::parse($request->start)->weekOfYear;
        $data['end'] = Carbon::parse($request->end)->timestamp;
        $data['user_id'] = \Auth::id();
        
        Timetrack::create($data);

        Session::flash('flash_message', 'Timetrack added!');

        return redirect('timetrack');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $timetrack = Timetrack::findOrFail($id);

        return view('timetrack.show', compact('timetrack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {

        $timetrack = Timetrack::findOrFail($id);

        return view('timetrack.edit', compact('timetrack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {

        
        $timetrack = Timetrack::findOrFail($id);
        $data['start'] = Carbon::parse($request->start)->timestamp;
        $data['week'] = Carbon::parse($request->start)->weekOfYear;
        $data['end'] = Carbon::parse($request->end)->timestamp;
        $timetrack->update($data);

        Session::flash('flash_message', 'Timetrack updated!');

        return redirect('timetrack');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Timetrack::destroy($id);

        Session::flash('flash_message', 'Timetrack deleted!');

        return redirect('timetrack');
    }
}
