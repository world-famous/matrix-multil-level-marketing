<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Model\Adminsetting;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('pages.member.dashboard.dashboard');
    }

    public function dashboard()
    {
        return view('pages.member.dashboard.dashboard');
    }

     public function register_new_index()
    {
        return view('pages.member.registration.register');
    }


    public function register_new_member(Request $request)
    {

        $user = new User;
        $sponsor=Auth::user();
        $user->username=$request['username'];
        $user->fName=$request['fName'];
        $user->lName=$request['lName'];
        $user->gender=$request['gender'];
        $user->mobile_number=$request['phone'];
        $user->join_date=date('Y-m-d');
        if($this->check_under_user($sponsor->id)==false){
            session(['status'=>'fail_member']);
            session(['message'=>'Can not register new member! You exceeded system depth']);
            return view('pages.member.registration.register');
        }
        else{
                $value=$this->check_under_user($sponsor->id);
                $user->upline_id=$value["upline_id"];
                $user->sameline_no=$value["sameline_no"];
                $user->level_no=$value["level_no"];
                $user->path=User::where('id',$value["upline_id"])->first()->path.$value["sameline_no"];
                $user->email=$request['email'];
                $user->country=$request['country'];
                $user->state=$request['state'];
                $user->address=$request['address'];
                $user->zip_code=$request['zipcode'];
                $user->city=$request['city'];
                $user->password=bcrypt($request['password']);
        
                $user->save();
        
                return view('pages.member.genealogy.matrix');
            }
    }

    public function check_under_user($id){

        if(User::where('upline_id',$id)->count()<Adminsetting::all()->last()->width){

            $upline_id=$id;
            $sameline_no=User::where('upline_id',$id)->count()+1;
            $return_value=array();
            $return_value["upline_id"]=$upline_id;
            $return_value["sameline_no"]=$sameline_no;
            $return_value["level_no"]=User::where('id',$upline_id)->first()->level_no+1;

            return $return_value;
        }
        else {
            $new_user=User::where('upline_id',$id)->first();
            if($new_user->level_no >= Adminsetting::all()->last()->depth) 
                return false;
            return $this->check_under_user($new_user->id);
        }
    }

    public function matrix()
    {

        return view('pages.member.genealogy.matrix');
    }

    public function matrix_get_user(Request $request)
    {   

        if ($request->ajax()){

            $users=User::where('path','LIKE', Auth::user()->path . '%' )->get();

            $user_array=$users->toArray();
            $i = 0;
            foreach ($user_array as $user) {

                $data[$i]['id'] = $user['id'];
                $data[$i]['username'] = $user['username'];
                $data[$i]['email'] = $user['email'];
                $data[$i++]['parent'] = ($user['upline_id']==Auth::user()->upline_id ? "": $user['upline_id']);

            }

            return response()->json(['data'=>$data], 200);
        }

    }

    public function treeview()
    {
        return view('pages.member.genealogy.treeview');
    }

    public function ajax_treeview(Request $request)
    {

        $parent = $request["parent"];
        if($request->ajax()){
            $data = array();
            if ($parent=="#") {
                $data[] = array(
                    "id" => Auth::user()->id,  
                    "text" => Auth::user()->username, 
                    "icon" => "fa fa-user icon-lg icon-state-danger",
                    "children" => (User::where('upline_id',Auth::user()->id)->count()>0)? true:false, 
                    "type" => "root"
                );
            } else {
                $users=User::where('upline_id',$parent)->get();
                foreach($users as $user){
                    $data[] = array(
                        "id" => $user->id, 
                        "icon" => "fa fa-user icon-lg ".((User::where('upline_id',$user->id)->count()>0)?"icon-state-warning":"icon-state-success"),
                        "text" => $user->username, 
                        "state" => array("disabled" => false),
                        "children" => (User::where('upline_id',$user->id)->count()>0)? true:false
                    );
                }
            }

          echo json_encode($data);
        }
        
    }
}
