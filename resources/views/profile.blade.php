@extends('layouts.header')
@section('content')
    <div class="main-content container">
    <div class="row">
        <div class="col-md-12">
            <div class="row panel panel-profile">
                <div class="panel-heading col-md-3 col-lg-2">
                    <img src="{{url('images/profile_image/'.$userDetail[0]['profile_image'])}}" height="150px" width="150px" alt="" class="img-circle"><br>
                    <h4 class="profile-title">{{$userDetail[0]['name']}}</h4>
                    <p class="profile-info">{{$userDetail[0]['designation']}}</p>
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
                                <dd>+91-{{$userDetail[0]['phone_number']}}</dd>
                                <dt>Skype ID: </dt>
                                <dd>{{$userDetail[0]['skype_id']}}</dd>
                                <dt>Address: </dt>
                                <dd>{{$userDetail[0]['address']}}</dd>
                                <dt>External Links: </dt>
                                <dd>
                                    <a href="{{$userDetail[0]['facebook_link']}}">Facebook</a> /
                                    <a href="{{$userDetail[0]['github_link']}}">Git Hub</a> /
                                    <a href="{{$userDetail[0]['blog_link']}}">Blog</a>
                                </dd>
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
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection