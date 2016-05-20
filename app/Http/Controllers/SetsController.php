<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Set;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class SetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $sets = Set::paginate(15);

        return view('sets.index', compact('sets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('sets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Set::create($request->all());

        Session::flash('flash_message', 'Set added!');

        return redirect('sets');
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
        $set = Set::findOrFail($id);

        return view('sets.show', compact('set'));
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
        $set = Set::findOrFail($id);

        return view('sets.edit', compact('set'));
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
        
        $set = Set::findOrFail($id);
        $set->update($request->all());

        Session::flash('flash_message', 'Set updated!');

        return redirect('sets');
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
        Set::destroy($id);

        Session::flash('flash_message', 'Set deleted!');

        return redirect('sets');
    }
}
