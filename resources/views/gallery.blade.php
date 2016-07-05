@extends('layouts.app')
@section('content')

    <div class="container gallery row2">
            <div class="row">
                <div id="taskListFilterDiv" class="col-md-10 form-group control-group">

                    <form id="taskList" class="search-form form-inline">
                        {{ csrf_field() }}
                        <select onchange="getGalleryData();" class="form-control" id="category" name="category"></select>
                    </form>
                </div>

                <div class="pull-right" style="margin-top: -4%; margin-left: -2%;">
                        <div>
                            <button onclick="showCategoryAdder()" id="addCatButton" class="btn btn-warning">
                                <i class="fa fa-plus"></i>
                                Add Category
                            </button>
                            <button onclick="showImageUploader()" id="addButton"class="btn btn-success">
                                <i class="fa fa-plus"></i>
                                Add Image
                            </button>

                        </div>
                    <div id="addImageForm">
                        <div style="display: none; position: relative; top:0px;" id="uploadimage">
                            <form  class="form-inline"  action="gallery/add" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <select class=" form-inline form-control" id="select_category" name="select_category"></select>
                                    <input class="form-control" type="file" name="my_image" id="file" class="inputfile" />
                                    {{--<input class="form-control" id="file" type="file" name="my_image" id="file" required />--}}
                                    <input type="submit" value="Upload" class="form-control btn-info submit" />
                            </form>
                        </div>
                        <div id="message"></div>
                    </div>

                    <div id="addCategoryForm">
                        <div style="display: none; position: relative; top:0px;" id="addCategory">
                            <form class="form-inline" id="categoryForm">
                                {{ csrf_field() }}
                                <input class="form-control" type="text" name="add_category" id="add_category" placeholder="Enter Category Name." />
                                {{--<input class="form-control" id="file" type="file" name="my_image" id="file" required />--}}
                                <button type="button" onclick="addNewCategory(event)" id="addButton"class="btn btn-default">
                                    Add
                                </button>
                            </form>
                        </div>
                        <div id="message"></div>
                    </div>
                </div>
            </div>
            <div id="image_gallery_div" class="row row2">
                <div id="loader" style="display: none;" class="col-md-7 col-md-offset-5 span3">
                    <img style="width: 200px !important; height: 200px !important;" class="group1" src="images/loader.gif" title="Click to Zoom" />
                </div>
                <div id="gallery_div"></div>
            </div>
    </div> <!-- /container -->
@endsection

@section('script')
    <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));

        // Colorbox Call

        $(document).ready(function(){
            getGalleryData();
            getFilerData();
            $("[rel^='lightbox']").prettyPhoto();
        });

        $(document).ready(function (e) {

            $("#uploadimage").on('submit',(function(e) {
                e.preventDefault();

                var CSRF_TOKEN = $('input[name="_token"]').val();
                var file = $('#file')[0].files[0];
                var value = $('select#select_category option:selected').val();

                var formData = new FormData();
                formData.append('file',file);
                formData.append('category',value);
                console.log(file);
//                console.log($(this));
//                return;

//                $.post('gallery/add',formData,function (data) {
//                    console.log(data);
//                    $("#message").html(data);
////                    getGalleryData();
//
//                });
//                    return false;
                $.ajaxSetup({
                    headers: { 'X-CSRF-Token' : CSRF_TOKEN }
                });
                $.ajax({
                    type: "POST",
                    url: "gallery/add", // Url to which the request is send
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data)   // A function to be called if request succeeds
                    {
                        console.log(data);
                        if(data == 'success'){
                            $('#addButton').show();
                            $('#uploadimage').hide();
                            $('#file').val('');
                            getGalleryData();
                        }else if(data == 'no category'){
                            swal({
                                title: 'Please Add category First!',
                                text: 'Category Missing!',
                                type: 'warning',
                                timer: 3000
                            });
                        }else {
                            swal({
                                title: 'Something Went Wrong!',
                                text: 'Try Again!',
                                type: 'warning',
                                timer: 3000
                            });
                        }
                    }
                });
            }));

// Function to preview image after validation
            $(function() {
                $("#file").change(function() {
                    $("#message").empty(); // To remove the previous error message
                    var file = this.files[0];
                    var imagefile = file.type;
                    var size = file.size;
                    var match= ["image/jpeg","image/png","image/jpg"];
                    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                    {
                        swal({
                            title: 'Invalid Image File!',
                            text: 'Only jpeg, jpg and png Images type allowed',
                            type: 'warning',
                            timer: 3000
                        });
                        $("#file").val('');
                        return false;
                    }
                    else
                    {
                        console.log(size);
                        if(size > 2097152){
                            swal({
                                title: 'File Size too big!',
                                text: 'Max 2Mb file Allowed',
                                type: 'warning',
                                timer: 3000
                            });
                            $("#file").val('');
                            return false;
                        }else {
                            var reader = new FileReader();
                            reader.onload = imageIsLoaded;
                            reader.readAsDataURL(this.files[0]);
                        }
                    }
                });
            });
            function imageIsLoaded(e) {
                $("#file").css("color","green");
                $('#image_preview').css("display", "block");
                $('#previewing').attr('src', e.target.result);
                $('#previewing').attr('width', '250px');
                $('#previewing').attr('height', '230px');
            };
        });
    </script>
@endsection