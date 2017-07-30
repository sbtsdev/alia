<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.listing-list', [ 'listings' => Listing::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.listing-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        return view('pages.listing', $listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('pages.listing-edit', $listing);
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
        $listing = Listing::find($id);
        $listing->name = $request->name;
        $listing->description = $request->description;
        $listing->type = $request->type;
        $listing->street1 = $request->street1;
        $listing->street2 = $request->street2;
        $listing->city = $request->city;
        $listing->state = $request->state;
        $listing->zip = $request->zip;
        $listing->kid_friendly = $request->kid_friendly == "1";
        $listing->pet_friendly = $request->pet_friendly == "1";
        $listing->max_stay_days = $request->max_stay_days;
        $listing->beds = $request->beds;
        $listing->save();
        return back()->withListing($listing);
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

    public function filter(Request $request)
    {
        //should check that receives back all necessary data
        $lat = $request->latitude;
        return (new Listing)->filter($request);
    }
}
