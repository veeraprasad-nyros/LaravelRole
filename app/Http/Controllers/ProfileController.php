<?php
namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //protected $redirecTo = '/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfile(Request $request)
    {
        
        $user  = DB::table('users')
                        ->where('id', $request->user()->id)
                        ->get();
        $user = $user[0];
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";

        //$role = Role::where('user_id','=',$request->user()->id)->get();
        $userrole_id = DB::table('role_user')
                        ->where('user_id', $request->user()->id)
                        ->get();

        $rolename    = DB::table('roles')
                        ->where('id', $userrole_id[0]->role_id)
                        ->get();
        $rolename = $rolename[0]->display_name;
        
        return view('showprofile', ['user' => $user, 'rolename'=>$rolename]);
    }

    public function editProfile(Request $request)
    {
         $updatename = trim($request->name);
         $oldname    = trim(Auth::user()->name);
        // echo $updatename."<br>";
        //echo $oldname;
         if(empty($updatename))
         {
             $user = User::where('id', Auth::user()->id)
                         ->get();
             $user = $user[0];
             $msg['status'] = false;
             $msg['msg']    = '';
             $msg['ccname'] = ''; 

             return view('editprofile', ['user'=>$user, 'msg'=>$msg]);
         }
        else
        {
            if(!empty($request->name))
            {
                $msg['status'] = true;
                $msg['msg']    = 'Success. Details Saved';
                $msg['ccname'] = 'alert-success';
                $data = User::find(Auth::user()->id);
                $data->name = $request->name;
                $data->save();
            }
            $user  = User::where('id', Auth::user()->id)
                         ->get();
            $user = $user[0];
            Auth::user()->name = $user->name; 
            return view('editprofile', ['user'=>$user, 'msg'=>$msg]);
        }

    }


    // if ($request->user()) {
        //     // $request->user() returns an instance of the authenticated user...
        // }
        // $user  = DB::table('users')
        //                 ->where('id', $request->user()->id)
        //                 ->get();
}
