<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ex_note;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class Ex_notesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $ex_notes = Ex_note::paginate(15);

        return view('ex_notes.index', compact('ex_notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('ex_notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Ex_note::create($request->all());

        Session::flash('flash_message', 'Ex_note added!');

        return redirect('ex_notes');
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
        $ex_note = Ex_note::findOrFail($id);

        return view('ex_notes.show', compact('ex_note'));
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
        $ex_note = Ex_note::findOrFail($id);

        return view('ex_notes.edit', compact('ex_note'));
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
        
        $ex_note = Ex_note::findOrFail($id);
        $ex_note->update($request->all());

        Session::flash('flash_message', 'Ex_note updated!');

        return redirect('ex_notes');
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
        Ex_note::destroy($id);

        Session::flash('flash_message', 'Ex_note deleted!');

        return redirect('ex_notes');
    }
}
