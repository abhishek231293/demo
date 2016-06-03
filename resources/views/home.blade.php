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
                            <i class="fa fa-envelope fa-5x">
                            </i>
                        </div>
                        <div class="col-sm-9 text-right">
                            <div class="huge">06</div>
                            <div>New Messages!</div>
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
                            <div class="huge">6</div>
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
                            <div class="huge">28</div>
                            <div>Deactive Members!</div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
