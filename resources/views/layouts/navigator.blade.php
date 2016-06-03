@if (!Auth::guest())
<div class="container">
<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a onclick="active()" href="{{url('/')}}">Welcome</a></li>
  <li role="presentation" ><a onclick="active()" href="{{url('/task')}}">Members</a></li>
  <li role="presentation"><a onclick="active()" href="{{url('/task/create')}}">Add Member</a></li>
  <li role="presentation"><a onclick="active()" href="#">Messages</a></li>
</ul>
</div>
@endif

@yield('content')

<script type="text/javascript">
    function active(){
        
    }
$(document).ready(function() {
    $(".nav a").on("click", function(){
        $(".nav").find(".active").removeClass("active");
        $(this).parent().addClass("active");
    });
});
</script>