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

    public function galleryData(Request $request){

        $image = \App\gallery_image::query();
            $image->join('image_category', 'image_category.id', '=', 'gallery_images.category_id');
        if($request->has('image_id')) {
            if ($request->has('image_id')) {
                $image->where('image_category.id', $request->image_id);
            }
        }

        $data = $image->where('gallery_images.is_active','=',1)->get();

        $category = new \App\ImageCategory();
        $categoryData = $category->where('is_active','=',1)->get();

        $returnData = new \stdClass();
        $returnData->category = $categoryData;
        $returnData->imageData = $data;
//        die(json_encode($returnData));
        return view('gallery',['images'=>$data, 'categories'=>$categoryData]);
    }

    public function gallerySelectedData(Request $request){

        $image = \App\gallery_image::query();
        $image->join('image_category', 'image_category.id', '=', 'gallery_images.category_id');
        if($request->has('image_id')) {
            if ($request->has('image_id')) {
                $image->where('image_category.id', $request->image_id);
            }
        }

        $data = $image->where('gallery_images.is_active','=',1)->get();
        $content = '<div style="font-size: 22px; margin-top: 10%; text-align: center; padding: 15px;"  class="label label-danger col-md-12 span3">
                        <b>No Image Found</b>
                    </div>';

        if(count($data)) {
            $content = '';
            foreach ($data as $image) {
                $image = $image->image_name;

                $content .= '<div class="col-md-3 span3">
                                <a class="thumbnail" rel="lightbox[group]" href="img/pics/'.$image.'">
                                    <img class="group1" src="img/pics/'.$image.'" title="Click to Zoom" />
                                </a>
                            </div>';
            }
        }

        echo $content;
    }
}
