@extends('layouts.app')
@section('content')

<div class="container container1">
    <div class="row">
        
        <div class="col-md-3">
            <div class="panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-film fa-5x">
                            </i>
                        </div>
                        <div class="col-sm-9 text-right">
                            <div class="huge">{{$imageCount}}</div>
                            <div>Total Image!</div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-wechat fa-5x">
                            </i>
                        </div>
                        <div class="col-sm-9 text-right">
                            <div class="huge">{{$activeUser + $deactiveUser}}</div>
                            <div>Total Member!</div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-user fa-5x">
                            </i>
                        </div>
                        <div class="col-sm-9 text-right">
                            <div class="huge">{{$activeUser}}</div>
                            <div>Active Members!</div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-ban fa-5x">
                            </i>
                        </div>
                        <div class="col-sm-9 text-right">
                            <div class="huge">{{$deactiveUser}}</div>
                            <div>Deactive Members!</div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="panel panel-default row3">
        <div class="panel-heading">
            <h3 class="panel-title"><b>Total Members & Images</b></h3>
        </div>
        <div id="bar_chart_container" class="panel-body">
        </div>
    </div>

</div>

@endsection

@section('script')

<script type="text/javascript">
    var CSRF_TOKEN = "<?=csrf_token(); ?>";
    $(document).ready()
    {
        $.ajax({
            url: "create",
            type: "post",
            data: {_token: CSRF_TOKEN},
            success: function(result){
                createBarChart(result);
            }
        });
    }


</script>
@endsection
