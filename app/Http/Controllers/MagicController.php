<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Magic;
use Illuminate\Http\Request;


class MagicController extends Controller
{
    // TODO: Add authentication
    // public function __construct()
    // {
    //     $this->middleware('auth:api')->except(['index', 'show']);
    // }

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

        $errorMessage = 'Error: Magic potion order may not exceed 3 magic potions per customer in a given month.';

        try {
            // get count of orders for customer for given month
            // Note: if user_id was on magics table, we would do a check on the user_id instead of email
            // TODO: Do check on address too?
            $databaseQuantity = Magic::where('email', '=', $request->email)
                ->whereBetween('created_at', [Carbon::today()->startOfMonth(), Carbon::today()->now()])
                ->sum('quantity');

            $attemptedQuantity = $databaseQuantity + $request->quantity;

            if ($databaseQuantity >= 3) {
                throw new Exception($errorMessage);
            }

            if ($attemptedQuantity > 3) {
                throw new Exception($errorMessage);
            }

            $magic = Magic::create($request->all());
            return response()->json($magic, 201);
        } catch (Exception $error) {
            return response()->json(['error' => $error->getMessage()], 403);
        }
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
