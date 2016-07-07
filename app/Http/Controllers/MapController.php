<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MapController extends Controller
{   
    public function index(){

//        $resultObject = new \stdClass();
//        $resultObject->mapdata = $location;
//        $this->view->dataSet['mapjscontent'] = "";
//        $counter = 0;
//        $resultObject->mapfunction = "";
//
//        file_put_contents(realpath('.') . '/json/mapData.json', json_encode($resultObject));

        return view('map.index');

    }
}
