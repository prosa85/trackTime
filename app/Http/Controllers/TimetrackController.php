<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Timetrack;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TimetrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $timetrack = Timetrack::paginate(15);

        return view('timetrack.index', compact('timetrack'));
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
        //dd($request->all());
        $data['start'] = Carbon::parse($request->start)->timestamp;
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
        $this->validate($request, ['user_id' => 'integer; end', ]);

        $timetrack = Timetrack::findOrFail($id);
        $timetrack->update($request->all());

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
