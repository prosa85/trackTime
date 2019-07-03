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
        $times= Timetrack::forUser()->orderBy('start','desc');

        $timetrack = $times->paginate(15);
        $sum = $timetrack->sum('hours');

        // dd($times->get()->toArray());
        return view('timetrack.index', compact('timetrack','user', 'sum'));
    }

    public function weekForUser($week, User $user){
        
        $times= Timetrack::forWeek($week,$user)->orderBy('start','ascd');
        $timetrack = $times->paginate(15);
        $sum = $timetrack->sum('hours');
        
        return view('timetrack.index', compact('timetrack','user','week','sum'));
    }

    public function reportForWeek($week){
        $now = Carbon::now();

        $times= Timetrack::where('week',$week)->whereYear('created_at', $now->year)->get()->groupBy('user_id');
        $times->transform(function($user){
            $hours = ['user'=>$user[0]->user_id ,'hours'=>$user->sum('hours')];
            if($hours['user']==1){
                $hours['total'] = $hours['hours'] * 20;
            }
            else{
                $hours['total'] = $hours['hours'] * 5;
            }
            return $hours;
        });
//        return $hours;
        return ['data'=>$times,'total'=>$times->sum('total')];//view('timetrack.week', compact('hours'));

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
        $data['start'] = Carbon::parse($request->startdate .' '. $request->start)->timestamp;
        $data['week'] = Carbon::parse($request->startdate .' '. $request->start)->weekOfYear;
        $data['end'] = Carbon::parse($request->enddate .' '. $request->end)->timestamp;
        $data['commit'] = $request->commit;
        $data['user_id'] = \Auth::id();
        // dd($data);
        
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
        $data['user_id'] = $request->user_id;
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
