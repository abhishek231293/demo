@extends('layouts.app')
@section('content')
    <div class="container gallery row2">
            <div class="row">
                <div class="col-md-10">
                    <label class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        Add Image
                        <form action="">
                            <input type="file" style="display: none;">
                        </form>
                    </label>
                </div>
            </div>

            <div class="row row2">
                <?php foreach($images as $image){?>
                    <div class="col-md-3 span3">
                        <a class="thumbnail" rel="lightbox[group]" href="img/pics/{{$image->image_name}}"><img class="group1" src="img/pics/{{$image->image_name}}" title="Click to Zoom" /></a>
                    </div> <!--end thumb -->
                <?php } ?>
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
            $("[rel^='lightbox']").prettyPhoto();
        });

        $(function() {

            // We can attach the `fileselect` event to all file inputs on the page
            $(document).on('change', ':file', function() {
                var input = $(this),
                        numFiles = input.get(0).files ? input.get(0).files.length : 1,
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
            });

            // We can watch for our custom `fileselect` event like this
            $(document).ready( function() {
                $(':file').on('fileselect', function(event, numFiles, label) {

                    var input = $(this).parents('.input-group').find(':text'),
                            log = numFiles > 1 ? numFiles + ' files selected' : label;

                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) {
                            console.log(log);
                        }

                    }

                });
            });

        });

    </script>
@endsection