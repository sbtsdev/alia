<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Stay;

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
        $listings = User::find(Auth::id())->listings;
        return view('pages.account-listings')->withListings($listings);
    }

    public function stays()
    {
        $stays = Stay::where('stayer_id', Auth::id())->get();
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
