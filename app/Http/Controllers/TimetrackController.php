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
    public function index(Request $request)
    {   
        if(!\Auth::id()){
            
            return redirect()->route('root');
        }
        $user = \Auth::user();
        $times= Timetrack::forUser()->orderBy('start','desc');
        $paginate = 15;
        if ($request->has("company")){
            $times = $times->ForCompany($request->company);
            $paginate = 100;
        }
        $timetrack = $times->paginate($paginate);
        $sum = $timetrack->sum('hours');
        $total =$sum * 50;  //$this->reportForWeek($timetrack->first()->week);
        // dd($times->get()->toArray());
        return view('timetrack.index', compact('timetrack','user', 'sum','total'));
    }

    public function weekForUser($week, User $user){
        
        $times= Timetrack::forWeek($week,$user)->orderBy('start','ascd');
        $timetrack = $times->paginate(15);
        $sum = $timetrack->sum('hours');
        $total = $this->reportForWeek($week);
        return view('timetrack.index', compact('timetrack','user','week','sum','total'));
    }

    public function reportForWeek($week ){

        $now = Carbon::now();
        $times= Timetrack::where('week',$week)->whereYear('created_at', $now->year)->get()->groupBy('user_id');
        $times->transform(function($user) use ($week){
            $hours = ['user'=>$user[0]->user_id,'week'=> $user[0]->week ,'hours'=>$user->sum('hours') ];
            $date = new Carbon($user[0]->start);
            $date->setWeekStartsAt(Carbon::SUNDAY);
            $date->setWeekEndsAt(Carbon::SATURDAY);

            $range= 'from '. $date->startOfWeek()->format('m/d/y').'- to -'. $date->endOfWeek()->format('m/d/y');
            $hours['for_dates'] = $range;
            $rates = [20,5];
            if( $week > 30)
            {
                $rates = [25,6];
            }
            if($hours['user']==1){
                $hours['name']= "Pablo Rosa ->" . $rates[0];
                $hours['total_in_dollars'] = $hours['hours'] * $rates[0];
                $hours['hours_in_paycheck'] = $hours['hours'];
            }
            else{
                $hours['name'] = "Gustavo Diaz ->".$rates[1];
                $hours['total_in_dollars'] = $hours['hours'] * $rates[1];
                $hours['hours_in_paycheck']= $hours['total_in_dollars']/$rates[0];
            }
            return $hours;
        });
//        return $hours;
        return ['data'=>$times,'total_in_dollars'=>$times->sum('total_in_dollars'), 'total_hours_in_paycheck'=> $times->sum('hours_in_paycheck')];//view('timetrack.week', compact('hours'));

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
        $data['company'] = $request->company;
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

    public function getPaidFromCompany($company){
        $pay = Timetrack::where([['company', $company], ['paid', 0]])->get();

        $pay->each(function($item) {
            $item->paid = true;
            $item->save();
        });
        $sum = $pay->sum('hours');
        Session::flash('flash_message', 'Success: ' . $pay->sum("hours").' Hours Paid');
        return redirect('timetrack');

    }
}
