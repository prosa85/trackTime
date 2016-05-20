<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Exercise;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $exercises = Exercise::paginate(15);

        return view('exercises.index', compact('exercises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Exercise::create($request->all());

        Session::flash('flash_message', 'Exercise added!');

        return redirect('exercises');
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
        $exercise = Exercise::findOrFail($id);

        return view('exercises.show', compact('exercise'));
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
        $exercise = Exercise::findOrFail($id);

        return view('exercises.edit', compact('exercise'));
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
        
        $exercise = Exercise::findOrFail($id);
        $exercise->update($request->all());

        Session::flash('flash_message', 'Exercise updated!');

        return redirect('exercises');
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
        Exercise::destroy($id);

        Session::flash('flash_message', 'Exercise deleted!');

        return redirect('exercises');
    }
}
