@extends('layouts.app')
@section('content')

    <div class="container gallery row2">
            <div class="row">
                <div id="taskListFilterDiv" class="col-md-10 form-group control-group">
                    {{ csrf_field() }}
                    <form id="taskList" class="search-form form-inline">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <select onchange="getGalleryData();" class="form-control" id="category" name="category">
                            <option value=""> -- Select Category -- </option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <div class="pull-right" style="margin-left: -2%;">
                    <label class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        Add Image
                        <form action="">

                            <input type="file" style="display: none;">
                        </form>
                    </label>
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
            $("[rel^='lightbox']").prettyPhoto();
        });
    </script>
@endsection