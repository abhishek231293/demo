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

        $task = new \App\Task();
        $activeUser = count($task->where('is_active','=',1)->get()->toArray());
        $deactiveUser = count($task->where('is_active','=',0)->get()->toArray());

        return view('home',['activeUser'=>$activeUser,'deactiveUser' => $deactiveUser]);
      
    }

    public function create(){

//        dd('here');
        $task = new \App\Task();
        $activeUser = count($task->where('is_active','=',1)->get()->toArray());
        $deactiveUser = count($task->where('is_active','=',0)->get()->toArray());

        $data = new \stdClass();

        $data->data = array($activeUser,$deactiveUser);

        $shelve = array();
        $occupy = array();
        $category = array('active'=>'Active','deactive'=>'Deactive');

            $slaveObj = new \stdClass();
            $slaveObj->y= $activeUser;

            $slaveObj1 = new \stdClass();
            $slaveObj1->y= $deactiveUser;

            $shelve[0] = $slaveObj;
            $shelve[1] = $slaveObj1;


        $shelvesData = array('Members' => $shelve);

        $data->categories = $category;
        $data->data = $shelvesData;

        die(json_encode($data, JSON_NUMERIC_CHECK));

    }

    public function galleryData(){
        $image = new \App\gallery_image();
        $data = $image->where('is_active','=',1)->get();

        return view('gallery',['images'=>$data]);
    }
}
