<?php

namespace App\Http\Controllers;

use App\Models\UserSubscription;
use App\Http\Requests\StoreUserSubscriptionRequest;
use App\Http\Requests\UpdateUserSubscriptionRequest;
use Illuminate\Http\Request;

class UserSubscriptionController extends Controller
{
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
     * @param  \App\Http\Requests\StoreUserSubscriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserSubscriptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSubscription  $userSubscription
     * @return \Illuminate\Http\Response
     */
    public function show(UserSubscription $userSubscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSubscription  $userSubscription
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSubscription $userSubscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserSubscriptionRequest  $request
     * @param  \App\Models\UserSubscription  $userSubscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		$subscription=UserSubscription::firstOrCreate(['user_id' => \Auth::id(), 'website_key' => $request->get('website_key')]);
		if($subscription->wasRecentlyCreated){
			//$user->notify(new Note());
		}

		// redirect
		\Session::flash('message', 'Successfully Subscribed');
		return redirect('posts');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSubscription  $userSubscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSubscription $userSubscription)
    {
        //
    }
}
