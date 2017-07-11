<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

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
       $dir = public_path('assets/images/');
       $list = scandir($dir);
       $imglist = array();
       for($i = 2; $i < count($list); $i++){
            $imglist[] = $list[$i]; 
       }
       
       return view('home' ,['list'=>$imglist,'path'=>$dir]);
    }
}
