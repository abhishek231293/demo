@if (!Auth::guest())
    <?php $routeName= Route::current()->getName(); ?>
<div class="container">
<ul class="nav nav-tabs">
    <li role="presentation" class="<?=($routeName==''? 'active': '')?>"><a  href="{{url('/')}}">Welcome</a></li>
  <li role="presentation" class="<?=($routeName=='task.index'? 'active': '')?>" ><a href="{{url('/task')}}">Members</a></li>
  <li role="presentation" class="<?=($routeName=='task.create'? 'active': '')?>" ><a  href="{{url('/task/create')}}">Add Member</a></li>
  <li role="presentation" ><a  href="#">Messages</a></li>
</ul>
</div>
@endif

@yield('content')

<script type="text/javascript">

$(document).ready(function() {
    $(".nav li a").on("click", function(){
        $(".nav").find(".active").removeClass("active");
        $(this).parent().addClass("active");
    });
});

</script>