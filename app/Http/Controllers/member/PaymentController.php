<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Adminsetting;
use App\Model\Transaction;
use App\User;
use Auth;

class PaymentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.member.purchase.purchase');
    }

    public function purchase_ewallet()
    {

    	$admin=User::where('is_admin',1)->first();
    	$membership=Adminsetting::all()->last()->membership_budget;

    	if(Auth::user()->ewallet_balance < $membership)
    	{
    		session(['status'=>'cancel']);
    		session(['message'=>'Woops! Ewallet does not have enough balance~']);

    	}

    	else
		{
			$admin_ewallet=$admin->ewallet_balance;	
			$admin_ewallet=$admin_ewallet+$membership;
			$admin->ewallet_balance=$admin_ewallet;
			$admin->save();
	
			
			$user=Auth::user();
			$user->ewallet_balance=$user->ewallet_balance-$membership;
			$user->save();
	
			$transaction=new Transaction;
			$transaction->from_user=Auth::user()->username;
			$transaction->to_user=$admin->username;
			$transaction->amount=$membership;
			$transaction->transaction_type_id=2;
			$transaction->save();
	
			session(['status'=>'success']);
			session(['message'=>'Congratulations! Successfully purchased by Ewallet~']);
		}
		return redirect()->route('purchase');
    }

    public function purchase_paypal_process($status)
    {	
    	if($status=='success'){

    			$admin=User::where('is_admin',1)->first();
    			$admin_ewallet=$admin->ewallet_balance;
    			$membership=Adminsetting::all()->last()->membership_budget;
    			$admin_ewallet=$admin_ewallet+$membership;
    			$admin->ewallet_balance=$admin_ewallet;
    			$admin->save();

    			$transaction=new Transaction;
    			$transaction->from_user=Auth::user()->username;
    			$transaction->to_user=$admin->username;
    			$transaction->amount=$membership;
    			$transaction->transaction_type_id=2;
    			$transaction->save();

	    		session(['status'=>'success']);
	    		session(['message'=>'Congratulations! Successfully purchased~']);
	    	}
    	else
    		{
    			session(['status'=>'cancel']);
    		    session(['message'=>'Woops! Purchase cancelled~']);
    		}
    	return redirect()->route('purchase');
    }

}
