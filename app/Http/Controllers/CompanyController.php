<?php

namespace App\Http\Controllers;

use Auth;
use App\Role;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Team;
use Validator;
use App\User;
use App\Member;

class CompanyController extends Controller
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
        $teamlist = DB::table('teams')
                    ->select('id','name','user_id')
                    ->where("user_id", "=" , Auth::user()->id)
                    ->get();
        // echo "<pre>";
        // print_r($teamlist);
        // echo "</pre>";
        $memberslist =  DB::table('users')
            ->join('members', 'users.id', '=', 'members.member_id')
            ->join('teams', 'members.team_id', '=', 'teams.id' )
            ->select('users.id', 'users.name', 'users.email', 'users.password', 'team_id', 'teams.name as team_name')
            ->where('teams.user_id', '=', Auth::user()->id)
            ->get();

        //select count(*) total_teams from teams where teams.user_id = 1 
        $teamtotal = DB::table('teams')
                    ->where("user_id", "=" , Auth::user()->id)
                    ->count();
                    //->get();
        //SELECT teams.name team_name, count(*) members_total FROM teams JOIN members ON teams.id = members.team_id where teams.user_id = 1 GROUP BY team_name 

        $teammembers = DB::table('teams')
                            ->join('members','teams.id','=','members.team_id')
                            ->select('teams.name')
                            ->where('teams.user_id', '=', Auth::user()->id)
                            //->groupBy('teams.name')
                            ->get();

        $tmlistlen = count($teamlist);
        for($i = 0; $i < $tmlistlen; $i++)
        {
            $mtotal = 0;
            for($j = 0; $j < count($teammembers); $j++){
                if(trim($teamlist[$i]->name) == trim($teammembers[$j]->name))
                {
                    $mtotal++;
                }
            }
            $teamlist[$i]->member_total = $mtotal;
        }
        return view('companydashboard', ["teamtotal"=>$teamtotal, "teamlist"=>$teamlist, "memberslist"=>$memberslist]);
    }

    public function manageTeam(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|team_name_validation',
        ]);

        if ($validator->fails()) {
            return redirect('/company')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $team = new Team();
            $team->name = $request->name;
            $team->user_id = $request->user()->id;
            $team->save();

            return redirect("/company");

        }
    }

    public function deleteTeam(Request $request)
    {
        echo $request->id;
        print_r("<pre>".$request."</pre>");

        $removeteam = Team::find($request->id);
        if($removeteam->delete() == 1)
        {
            return redirect("/company");
        }
        else
        {
            return redirect("/company");
        }
        
    }
    public function editTeam(Request $request)
    {
	   
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|team_name_validation',
        ]);

        if ($validator->fails()) {
            return redirect('/company')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
           $data = Team::find($request->id);
           $data->name = $request->name;
           $data->save();

           return redirect("/company");

        }

       // $data = Team::find($request->id);
       // $data->name = $request->name;
       // $data->save();

       // return redirect("/company");

    }
    public function getMemberRegistration(Request $request)
    {
      
        return view('member',['team_id'=>$request->id]);
    }
    public function addMember(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('/company/add/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
          
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            
            $role = Role::where('name', '=', 'member')->first();
            $user->attachRole($role);

            echo $user->id;
            $muser = User::where('email', '=',$request->email)
                        ->get();
            $team_id = $request->id;
            echo $team_id;
            DB::table('members')->insert(
              array('team_id' => $team_id, 'member_id' =>  $muser[0]->id)
            );
            
            return $this->index();
        }
    }

    public function editMember(Request $request)
    {
        //echo $request->id;
        $member = DB::table('users')->select('id','name','email','password')->where('id', '=', $request->id)->get();
        $member = $member[0];
        // echo "<pre>";
        // print_r($member);
        // echo "</pre>";
        return view('editMember',["member"=>$member]);
    }

    public function updateMember(Request $request){
        //'email' => 'required|email|max:255|unique:users',
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('/company/edit/member/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $data = User::find($request->id);
            $data->name  = $request->name;
            $data->password = bcrypt($request->password);
            $data->save();
            return redirect('/company');
        }
       
    }
}
