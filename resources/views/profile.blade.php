@extends('layouts.header')
@section('content')
    <div class="main-content container">
    <div class="row">
        <div class="col-md-12">
            <div class="row panel panel-profile">
                <div class="panel-heading col-md-3 col-lg-2">

                    <img src="{{url('images/profile_image/'.($userDetail[0]['profile_image'] ? $userDetail[0]['profile_image'] : 'no_images.jpg') )}}" height="150px" width="150px" alt="" class="img-circle"><br>

                    <h4 class="profile-title">{{$userDetail[0]['name']}}</h4>
                    <p class="profile-info">{{$userDetail[0]['designation']}}</p>

                    <button class="btn btn-default" data-toggle="modal" data-target="#demo-modal"><i class="fa fa-btn fa-edit"> Edit </i></button>

                        <form  class="form-group modal multi-step" id="demo-modal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title step-1" data-step="1">
                                        Personal Information
                                        <i data-dismiss="modal" class="pull-right glyphicon glyphicon-remove"></i>
                                    </h4>
                                    <h4 class="modal-title step-2" data-step="2">
                                        Contact Details
                                        <i data-dismiss="modal" class="pull-right glyphicon glyphicon-remove"></i>
                                    </h4>
                                    <h4 class="modal-title step-3" data-step="3">
                                        <i data-dismiss="modal" class="pull-right glyphicon glyphicon-remove"></i>
                                        Accout Information
                                    </h4>
                                    <h4 class="modal-title step-4" data-step="4">
                                        <i data-dismiss="modal" id="closeButton" class="pull-right glyphicon glyphicon-remove"></i>

                                        Social Information
                                    </h4>
                                </div>

                                <div class="modal-body step step-1">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" value="{{$userDetail[0]['name']}}" name="name" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">Designation:</label>
                                        <input type="text" class="form-control" value="{{$userDetail[0]['designation']}}" id="designation" name ="designation">
                                    </div>

                                </div>

                                <div class="modal-body step step-2">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" value="{{$userDetail[0]['email']}}" name="email" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="number">Phone Number:</label>
                                        <input type="number" class="form-control" value="{{$userDetail[0]['phine_number']}}" id="phone_number" name ="phone_number">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" value="{{$userDetail[0]['address']}}" id="address" name ="address">
                                    </div>
                                </div>

                                <div class="modal-body step step-3">
                                    <div class="form-group">
                                        <label for="username">User Name</label>
                                        <input type="text" value="{{$userDetail[0]['user_name']}}"  class="form-control" name="user" id="user">
                                    </div>
                                    <div class="form-group">
                                        <label for="eid">Employee Id</label>
                                        <input type="text" value="{{$userDetail[0]['employee_id']}}"  class="form-control" id="eid" name ="eid">
                                    </div>
                                    <div class="form-group">
                                        <label for="hod">HOD:</label>
                                        <input type="text" value="{{$userDetail[0]['hod']}}" class="form-control" id="hod" name ="hod">
                                    </div>
                                    <div class="form-group">
                                        <label for="lead">Team Lead:</label>
                                        <input type="text" value="{{$userDetail[0]['team_lead']}}"  class="form-control" id="lead" name ="lead">
                                    </div>
                                </div>

                                <div class="modal-body step step-4">
                                    <div class="form-group">
                                        <label for="skype">Skype Id</label>
                                        <input type="text" value="{{$userDetail[0]['skype_id']}}"  class="form-control" name="skype" id="skype">
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook">Facebook Link</label>
                                        <input type="text" value="{{$userDetail[0]['facebook_link']}}"  class="form-control" id="facebook" name ="facebook">
                                    </div>
                                    <div class="form-group">
                                        <label for="git">Git Hub Link:</label>
                                        <input type="text" value="{{$userDetail[0]['github_link']}}"  class="form-control" id="git" name ="git">
                                    </div>
                                    <div class="form-group">
                                        <label for="blog">Blog Link:</label>
                                        <input type="text" class="form-control" value="{{$userDetail[0]['web_link']}}"  id="blog" name ="blog">
                                    </div>
                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-primary step step-1" data-step="1" onclick="sendEvent('2',event)">Continue</button>

                                    <button type="button" class="btn btn-default step step-2" data-step="2" onclick="sendEvent('1',event)" >Previous</button>
                                    <button type="button" class="btn btn-primary step step-2" data-step="2" onclick="sendEvent('3',event)">Continue</button>

                                    <button type="button" class="btn btn-default step step-3" data-step="3" onclick="sendEvent('2',event)" >Previous</button>
                                    <button type="button" class="btn btn-primary step step-3" data-step="3" onclick="sendEvent('4',event)">Continue</button>

                                    <button type="button" class="btn btn-default step step-4" data-step="4" onclick="sendEvent('3',event)" >Previous</button>
                                    <button type="button" class="btn btn-primary step step-4" data-step="4" onclick="updateUserData('{{$userId}}',event)">Finish</button>
                                    <br/><br/>
                                    <h4 class="modal-title step-1" data-step="1">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="color:black; width:0%">
                                                0%
                                            </div>
                                        </div>
                                    </h4>

                                    <h4 class="modal-title step-2" data-step="2">
                                        <div class="progress">
                                            <div class="progress-bar-warning progress-bar-striped active" role="progressbar"
                                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="text-align: center; width:25%">
                                                25%
                                            </div>
                                        </div>
                                    </h4>
                                    <h4 class="modal-title step-3" data-step="3">
                                        <div class="progress">
                                            <div class="progress-bar-danger progress-bar-striped active" role="progressbar"
                                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="text-align: center; width:50%">
                                                50%
                                            </div>
                                        </div>
                                    </h4>

                                    <h4 class="modal-title step-4" data-step="4">
                                        <div class="progress">
                                            <div class="progress-bar-success progress-bar-striped active" role="progressbar"
                                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="text-align: center; width:75%">
                                                75%
                                            </div>
                                        </div>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-body col-md-9 col-lg-10">
                    <h4 class="first">About Me</h4>
                    <p style="text-align: justify;">
                        {{$userDetail[0]['about']}}
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Contact Information</h4>
                            <dl class="dl-horizontal">
                                <dt>Email Address: </dt>
                                <dd>{{$userDetail[0]['email']}}</dd>
                                <dt>Phone Number: </dt>
                                <dd>+91-{{$userDetail[0]['phine_number']}}</dd>

                                <dt>Address: </dt>
                                <dd>{{$userDetail[0]['address']}}</dd>

                            </dl>
                        </div>
                        <div class="col-md-6">
                            <h4>Account Information</h4>
                            <dl class="dl-horizontal">
                                <dt>Username: </dt>
                                <dd>{{$userDetail[0]['user_name']}}</dd>
                                <dt>Member Since: </dt>
                                <dd>{{date('d F Y',strtotime($userDetail[0]['created_at']))}}</dd>
                                <dt>Employee ID: </dt>
                                <dd>{{$userDetail[0]['employee_id']}}</dd>
                                <dt>HOD: </dt>
                                <dd>{{$userDetail[0]['hod']}}</dd>
                                <dt>Team Lead: </dt>
                                <dd>
                                    {{$userDetail[0]['team_lead']}}
                                </dd>
                            </dl>
                        </div>

                        <div class="col-md-6">
                            <h4>Social Information</h4>
                            <dl class="dl-horizontal">
                                <dt>Skype ID: </dt>
                                <dd>{{$userDetail[0]['skype_id']}}</dd>

                                <dt>Facebook ID: </dt>
                                <dd>{{$userDetail[0]['facebook_link']}}</dd>

                                <dt>Git Hub: </dt>
                                <dd>{{$userDetail[0]['github_link']}}</dd>

                                <dt>Blog: </dt>
                                <dd>{{$userDetail[0]['web_link']}}</dd>

                            </dl>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")

<script>
    sendEvent = function($id,e) {
        e.preventDefault();
        $('#demo-modal').trigger('next.m.'+$id);
    }
</script>
@endsection