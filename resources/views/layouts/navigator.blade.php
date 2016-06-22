@if (!Auth::guest())
    <?php $routeName= Route::getCurrentRoute()->getPath();
//            dd($routeName);$routeName
    ?>
<div class="container">
<ul class="nav nav-tabs">
    <li role="presentation" class="<?=($routeName=='/'? 'active': '')?>"><a  href="{{url('/')}}">Welcome</a></li>
  <li role="presentation" class="<?=($routeName=='task'? 'active': '')?>" ><a href="{{url('/task')}}">Members</a></li>
  <!--<li role="presentation" class="<?=($routeName=='task.create'? 'active': '')?>" ><a  href="{{url('/task/create')}}">Add Member</a></li>-->
  <li role="presentation" class="<?=($routeName=='gallery'? 'active': '')?>"  ><a  href="{{url('/gallery')}}">Gallery</a></li>
</ul>
</div>
@endif

@yield('content')

@yield('script');
<script type="text/javascript">

$(document).ready(function() {
    $(".nav li a").on("click", function(){
        $(".nav").find(".active").removeClass("active");
        $(this).parent().addClass("active");
    });
});

</script>