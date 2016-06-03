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
//        $task = new \App\Task();
//        $activeUser = count($task->where('is_active','=',1)->get()->toArray());
//       
//        $deactiveUser = count($task->where('is_active','=',0)->get()->toArray());
//        
//        $data = new \App\Task();
//        $data->{active} = $activeUser;
//        $data->{deactive} = $deactiveUser;
//        dd($data);
//        
//        return view('home',['user'=>$data]);
        return view('home');
    }
    
}
