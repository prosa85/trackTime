<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Favorite;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $favorites = Favorite::paginate(15);

        return view('favorites.index', compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('favorites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['user_id' => 'foreign', 'exercise_id' => 'foreign', ]);

        Favorite::create($request->all());

        Session::flash('flash_message', 'Favorite added!');

        return redirect('favorites');
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
        $favorite = Favorite::findOrFail($id);

        return view('favorites.show', compact('favorite'));
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
        $favorite = Favorite::findOrFail($id);

        return view('favorites.edit', compact('favorite'));
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
        $this->validate($request, ['user_id' => 'foreign', 'exercise_id' => 'foreign', ]);

        $favorite = Favorite::findOrFail($id);
        $favorite->update($request->all());

        Session::flash('flash_message', 'Favorite updated!');

        return redirect('favorites');
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
        Favorite::destroy($id);

        Session::flash('flash_message', 'Favorite deleted!');

        return redirect('favorites');
    }
}
