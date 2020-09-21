<?php

namespace App\Http\Controllers;

use App\Models\Magic;
use Illuminate\Http\Request;

class MagicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all magic potion orders
        $magic = Magic::all();
        return response()->json($magic, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create a magic potion order
        $magic = Magic::create($request->all());

        // TODO: Use first or create instead?
        // $magic = Magic::firstOrCreate($request->all()); 

        // TODO: Add logic here to check if customer has not exceeded 3 MPs for a given month prior to adding order to DB
        return response()->json($magic, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show a magic potion order
        $magic = Magic::find($id);
        return response()->json($magic, 200);
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
        // update a magic potion order
        $magic = Magic::find($id);
        $magic->update($request->all());
        return response()->json(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a magic potion order
        $magic = Magic::destroy($id);
        return response()->json(200);
    }
}
