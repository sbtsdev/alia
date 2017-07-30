<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Auth;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => [
                'create', 'store', 'edit', 'update'
            ]
        ]);
    }

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
        return view('pages.listing-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listing = new Listing;
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
        $listing->user_id = Auth::id();

        list($lat, $long) = $this->geoCode(
            $listing->street1.' '.$listing->street2.','.
            $listing->city.','.$listing->state.' '.$listing->zip
        );
        $listing->latitude = $lat;
        $listing->longitude = $long;

        try {
            $listing->save();
            $success = true;
            $msg = "New listing created.";
            return redirect()->route('listings.edit', $listing)
                ->with(['success' => $success, 'message' => $msg]);
        } catch (\Exception $ex) {
            $success = false;
            $msg = "Could not save listing.";
            return redirect('listings/create')
                ->withInput()
                ->with(['success' => $success, 'message' => $msg]);
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

        if ($listing->user->id === Auth::id()) {
            return view('pages.listing-edit', $listing);
        } else {
            return redirect()->route('listings.show', $listing->id);
        }
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
        return (new Listing)->filter($request);
    }

    private function geoCode($address)
    {
        $lat = 37.5 + $this->drand(0, 10);
        $long = -84.5 + $this->drand(0, 10);
        return [$lat, $long];
    }

    private function drand($low, $high)
    {
        return mt_rand($low*1000, $high*1000) / 10000;
    }

}
