<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Adminsetting;
use App\Model\Income_membership;
use App\User;


class PaymentController extends Controller
{
    //
    public function index()
    {
    	$adminsetting=Adminsetting::all()->last();

    	$percentperlevel=unserialize($adminsetting->percent_value);

    	$allusers=User::all();

    	foreach($allusers as $eachuser){
    		$income[$eachuser->id]=$this->calc_income($percentperlevel,$eachuser->id,0,Adminsetting::all()->last()->membership_budget,0);
    	}

        foreach($allusers as $eachuser){
            $income_membership=new Income_membership;
            $income_membership->user_id=$eachuser->id;
            $income_membership->income=$income[$eachuser->id];
            $income_membership->date=date('Y-m-d');
            $income_membership->status="Approved";
            $income_membership->save();
        }

        return view('pages.admin.incomecalc.membership');
    }

    public function calc_income($percentperlevel,$id,$income,$budget,$percent_index)
    {
    	if(User::where('upline_id',$id)->count()>0)
		{
			
			$users=User::where('upline_id',$id)->get();
			$count=$users->count();
			$income=$income+$budget*$count*$percentperlevel[$percent_index]/100;
			$percent_index++;
			foreach($users as $user){
				return $this->calc_income($percentperlevel,$user->id,$income,$budget,$percent_index);
			}
		}
		else{
			return $income;
		}
    }
}
