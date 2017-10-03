<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class accountController extends Controller
{
    /**

     *	Show the account page
    
     */

    	public function __construct() {

    		$this->middleware('auth');
    	}

    public function showAccount(Request $request) {

    		$user = $request->user();
    		$invoices = $user->subscribed('main')? $user->invoices() : null;

    	return view('account.show')->withUser($user)->withInvoices($invoices);

    } 

	/**

	* Update subscription

	*/
     public function updateSubscription(Request $request) 
      {

      	$user = $request->user();

      	//get the plan
      	$plan = $request->plan;

      	//if a user is cancelled

      	if($user->subscription('main') and $user->subscription('main')->onGracePeroid()){

      			if($user->onPlan($plan)){

      				$user->subscription('main')->resume();
      				Session::flash('update_sub' , 'Subscription Reactivated');
      			}else{
      				//resume and switch plan

      				$user->subscription('main')->resume()->swap($plan);

      			}

      			Session::flash('update_sub' , 'Subscription Reactivated and Plan Changed');

      	}else{

      	//change plan
      	$user->subscription('main')->swap($plan);

      		Session::flash('update_sub' , 'You Changed Your Plan");
      }
      


      	return redirect('account');
    }

    /**

	* Update credit card

	*/

    public function updateCard(Request $request) {
    	//grab the user

    	$user = $request->user();

    	//grab the cc token

    	$cctoken = $request->cc_token;

    	//update cc

    	$user->updateCard($cctoken);

    	Session::flash('update_card' , 'Credit Card Successfully Updated');

    	return redirect('account');

    }

    	/**

	    	* Download Invoice

	    	*/

    	public function downloadInvoice($invoice){

    		return Auth::user()->downloadInvoice($invoice, [
    			'vendor' => 'AnimalGramm',
    			'product' => 'Monthly Subscription'
    		]);
    	}

		/**

		* Delete subscription

		*/
    public function deleteSubscription(Request $request) {

    	$user = $request->user();

    	//cancel Subscription('main')
    	$user->subscription('main')->cancel();

    	Session::flash('success' , 'Subscription Canceled');
    	return back();

    }



}
