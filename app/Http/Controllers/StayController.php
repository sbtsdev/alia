<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stay;
use Auth;

class StayController extends Controller
{

    public function __construct()
    {
        /*
        $this->middleware('auth', [
            'only' => [
                'create', 'store', 'edit', 'update'
            ]
        ]);
        */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stay = new Stay;
        $stay->listing_id = $request->listingId;
        $stay->stayer_id = Auth::id();
        $stay->status = "Requested";
        $stay->start_date = $request->startDate;
        $stay->end_date = $request->endDate;

        try {
            $stay->save();

            $success = true;

            $msg = "Your stay has been requested.";

            return redirect("/account/stays")->with(['success' => $success, 'msg' => $msg]);
        } catch (\Exception $ex) {
            dd($ex);

            $success = false;

            $msg = "An error occurred trying to request your stay.";

            return back()->with(['message' => $msg, 'success' => $success]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
