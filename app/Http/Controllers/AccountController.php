<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Stay;
use App\Models\Listing;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('pages.user-edit', $user);
    }

    public function listings()
    {
        $data = [
            'listings' => User::find(Auth::id())->listings
        ];
        $listings = User::find(Auth::id())->listings;
        //return view('pages.account-listings')->withListings($listings);
        return view('pages.account-listings', $data);
    }

    public function stays()
    {
        $myId = Auth::id();
        $stays = Stay::where('stayer_id', $myId)
            ->with(['listing'])
            ->get()
            ->map(function ($stay) use ($myId) {
                $n = clone $stay;
                $n->meAsHost = $stay->id === $myId;
                $n->hostName = User::find($stay->listing->user_id)->name;
                $n->listingName = $stay->listing->name;
                $n->formedStay = date('F j', strtotime($stay->start_date)).' &ndash; '.date('F j, Y', strtotime($stay->end_date));
                return $n;
            });
        return view('pages.account-stays')->withStays($stays);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->description = $request->description;
        $user->email = $request->email;

        $msg = '';
        $success = '';

        try {
            $user->save();
            $msg = 'Account updated!';
            $success = 'yes';
        } catch (\Exception $ex) {
            if ($ex->errorInfo[0] == '23000' && $ex->errorInfo[1] == 1062) {
                $msg = 'This email address belongs to another account. We should probably keep you from doing stupid things.';
            } else {
                $msg = 'Something terrible happened. Game over man.';
            }
            $success = 'no';
        }

        return back()->with(['message' => $msg, 'success' => $success]);
    }
}
