@extends('layouts.app')
@section('content')

<div class="container container1">
    <div class="row">
        
        <div class="col-md-3">
            <div class="panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-comments fa-5x">
                            </i>
                        </div>
                        <div class="col-sm-9 text-right">
                            <div class="huge">5</div>
                            <div>New Comments!</div>
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

    <div class="row col-md-12 row4">

        <div id="bar_chart_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

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
