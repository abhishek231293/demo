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
        $image = \App\gallery_image::query();
        $imageCount = count($image->get());
        return view('home',['activeUser'=>$activeUser,'deactiveUser' => $deactiveUser,'imageCount'=>$imageCount]);
      
    }

    public function create(){

//        dd('here');
        $task = new \App\Task();
        $activeUser = count($task->where('is_active','=',1)->get()->toArray());
        $deactiveUser = count($task->where('is_active','=',0)->get()->toArray());
        $image = \App\gallery_image::query();
        $imageCount = count($image->get());

        $data = array('Active' => $activeUser,'Deactive'=>$deactiveUser,'Image'=>$imageCount);
//        dd($data);
        die(json_encode($data));

    }

    public function galleryData(Request $request){

        $category = new \App\ImageCategory();
        $categoryData = $category->where('is_active','=',1)->get();

        $returnData = new \stdClass();
        $returnData->category = $categoryData;
//        die(json_encode($returnData));
        return view('gallery',['categories'=>$categoryData]);
    }

    public function filterData(){

        $category = new \App\ImageCategory();
        $categoryData = $category->where('is_active','=',1)->get();
        $content = '';
        $content .= '<option value="">-- Select Category --</option>';

        foreach ($categoryData as $image) {
            $category = $image->category_name;
            $imageId = $image->id;
            $content .= '<option value="'.$imageId.'">'.$category.'</option>';
        }
        echo $content;
    }

    public function gallerySelectedData(Request $request){

        $image = \App\gallery_image::query();
        $image->join('image_category', 'image_category.id', '=', 'gallery_images.category_id');
        if($request->has('image_id')) {
            if ($request->has('image_id')) {
                $image->where('image_category.id', $request->image_id);
            }
        }

        $image->where('gallery_images.is_active','=',1);
        $data = $image->orderby('created_at','DESC')->get();
        $content = '<div style="font-size: 22px; margin-top: 10%; text-align: center; padding: 15px;"  class="label label-danger col-md-12 span3">
                        <b>No Image Found</b>
                    </div>';

        if(count($data)) {
            $content = '';
            foreach ($data as $image) {
                $image = $image->image_name;

                $content .= '<div class="col-md-3 span3">
                                <a class="thumbnail" rel="lightbox[group]" href="#">
                                    <img class="group1" src="img/pics/'.$image.'" title="Click to Zoom" />
                                </a>
                            </div>';
            }
        }

        echo $content;
    }

    public function galleryAddImage(Request $request)
    {
        $category = request()->category;

        if($category == 'undefined'){
            return "no category";
        }

        $type = request()->file('file')->getMimeType();
        $file_extension = request()->file('file')->guessClientExtension();
        $file_size = request()->file('file')->getClientSize();
        $file_name = date('dmyhis').request()->file('file')->getClientOriginalName();

        if (isset($type)) {
            $validextensions = array("jpeg", "jpg", "png");

            if ((($type == "image/png") || ($type == "image/jpg") || ($type == "image/jpeg")) && ($file_size < 2097152) && in_array($file_extension, $validextensions)) {

                if (request()->file('file')->getError() > 0) {
                    echo "Return Code: " . request()->file('file')->getError() . "<br/><br/>";
                } else {
                    if (file_exists("/images/gallery" . $file_name)) {
                        echo $file_name . " <span id='invalid'><b>already exists.</b></span> ";
                    } else {

                        $file = request()->file('file')->move(public_path() . "/img/pics", $file_name);

                        $image = new \App\gallery_image();

                        $image->image_name = $file_name;
                        $image->category_id = $category;
                        $image->created_at = date('Y-m-d H:i:s');
                        $image->updated_at = date('Y-m-d H:i:s');
                        $image->save();

                        return 'success';
                    }
                }
            } else {
                echo "<span id='invalid'>Invalid file Size or Type.<span>";
                return 'Invalid';
            }


        }
    }

    function galleryAddCategory(Request $request){
        $category = $request->add_category;
        $newCategory = new \App\ImageCategory();

        $newCategory->category_name = $category;
        $newCategory->save();
        return 'Success';
    }
}
