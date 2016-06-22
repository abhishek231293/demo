@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row row2">
            <div class="col-lg-12">
                <div class="box">

                    <div class="box-content">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <div class="row">
                                    <div class="col-md-12">
                                       
                                            {{ csrf_field() }}
                                            <div id="taskListFilterDiv" class="col-md-10 form control-group">
                                                <form id="taskList" class="search-form" action="{{ url('/task') }}" method="GET">
                                                    <select class="form-control" id="status" name="status" >
                                                        <option value=""> --Select Status-- </option>
                                                        <option <?php echo (isset($_REQUEST['status']) && $_REQUEST['status'] == '1' ) ? 'Selected' : '' ?> value="1">Active</option>
                                                        <option <?php echo (isset($_REQUEST['status']) && $_REQUEST['status'] == '0'   ) ? 'Selected' : '' ?> value="0">Deactive</option>
                                                    </select>
                                                     
                                                    <select class="form-control" id="role" name="role">
                                                        <option value=""> --Select Department-- </option>
                                                        @foreach ($roles as $role)
                                                            <option <?php echo (isset($_REQUEST['role']) && $_REQUEST['role'] == $role->role ) ? 'Selected' : '' ?> value="{{$role->role}}">{{$role->role}}</option>
                                                        @endforeach
                                                    </select>
                                                     
                                                    <input value="<?php echo (isset($_REQUEST['member_name']) ? $_REQUEST['member_name'] : '' ) ?>" placeholder="Enter Name" class="form-control" id="member_name" name="member_name">
                                                     
                                                    <button id="taskListGo" class="form-control btn-success" type="submit">
                                                        <span class="glyphicon glyphicon-search"></span> 
                                                            Go
                                                    </button>
                                                   
                                                     <button onclick="resetFilter('#taskListFilterDiv','#taskListGo',false)" class="form-control btn-danger" type="reset">
                                                         <span class="glyphicon glyphicon-refresh"></span> 
                                                         <a  style="text-decoration: none; color: white; ">Reset </a>
                                                     </button>
                                                </form>

                                            </div>
                                        <div class="col-md-2">
                                            <button type="button" class="pull-right btn btn-info" data-toggle="modal" data-target="#newMemberModal">
                                                <span class="glyphicon glyphicon-plus"></span> New Member
                                            </button>
                                            <!-- Modal -->
                                            <div id="newMemberModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Add New Member</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row" style="padding: 10px; margin-top: 2%;">
                                                                <form class="form" method="POST" action="{{ url('/task') }}">
                                                                    {!! csrf_field() !!}

                                                                        <div class="col-md-12">
                                                                            <div class="col-md-2">
                                                                                <label for="name">Name</label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input type="text" style="width: 100%;" name="name" class="form-control" id="name" placeholder="Enter Name.">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 row2">
                                                                            <div class="col-md-2">
                                                                                <label for="role">Role</label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input style="width: 100%;" type="text" name="role" class="form-control" id="role" placeholder="Enter Role.">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 row2">
                                                                            <div class="col-md-2">
                                                                                <label for="contact">Contact</label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input maxlength="10" style="width: 100%;" type="text" name="contact" class="form-control" id="contact" placeholder="Enter Contact Number.">
                                                                            </div>
                                                                        </div>

                                                                        <button style="position: relative; left: 330px;  " type="submit" class="row2 btn btn-primary">
                                                                            Add
                                                                        </button>

                                                                        <button style="position: relative; left: 340px;  " type="button" class="row2 btn btn-default" data-dismiss="modal">
                                                                            Close
                                                                        </button>
                                                                    </form>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                            </div>
                            <div class="row row2">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 240px;">
                                                Name
                                            </th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 242px;">
                                                Role
                                            </th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 141px;">
                                                Contact
                                            </th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 287px;">
                                                Creation Date
                                            </th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 287px;">
                                                Updation Date
                                            </th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 287px;">
                                               Status
                                            </th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 287px;">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        
                                            @foreach ($tasks as $task)

                                            <tr class="odd" id="{{$task->id}}">
                                            <td class="sorting_1">{{ucwords(trans($task->name))}}</td>
                                            <td class="">{{ucwords(trans($task->role))}}</td>
                                            <td class=" ">{{$task->contact}}</td>
                                            <td class=" ">{{date('d-m-y H:i:s',strtotime($task->created_at) )}}</td>
                                            <td class=" ">{{date('d-m-y H:i:s',strtotime($task->updated_at))}}</td>
                                            <td class=" ">
                                                @if ($task->is_active == 0)
                                                <div style="display:inline-block;">
                                                    <form name="deactive" action="task/{{$task->id}}" method="POST">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}
                                                            <button  name='deactive' class="btn btn-danger" type="submit">
                                                                <i class="fa "><b> Deactive </b></i>
                                                            </button>
                                                    </form>
                                                </div >
                                                @else
                                                <div style="display:inline-block;">
                                                    <form action="task/{{$task->id}}" method="POST">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}
                                                            <button name='active' class="btn btn-success" type="submit">
                                                                <i class="fa">Active</i>
                                                            </button>
                                                    </form>
                                                </div>
                                               @endif    
                                            </td>
                                            <td class="">
                                                
                                                <div style="display:inline-block;">
                                                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal_{{$task->id}}">
                                                            <i class="fa fa-edit "></i>
                                                        </button>
                                                    </form>
                                                </div>

                                                <div style="display:inline-block;">
                                                    <form  action="task/{{$task->id}}" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        
                                                        <a style="text-decoration: none;"  class="btn btn-danger" onclick="confirmPopupDialoge(event,'{{ $task->id }}')">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>

                                                        <input style="display: none;" type="submit" id="delete_{{ $task->id }}">
                                                    </form>
                                                </div>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal_{{$task->id}}" tabindex="-1" role="dialog" 
                                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                                   <div class="modal-dialog">
                                                       <div class="modal-content">
                                                           <!-- Modal Header -->
                                                           <div class="modal-header">
                                                               <button type="button" class="close" 
                                                                  data-dismiss="modal">
                                                                      <span aria-hidden="true">&times;</span>
                                                                      <span class="sr-only">Close</span>
                                                               </button>
                                                               <h4 class="modal-title" id="myModalLabel">
                                                                   Edit Detail
                                                               </h4>
                                                           </div>

                                                           <!-- Modal Body -->
                                                           <div class="modal-body">

                                                                <form role="form" method="GET" action="task/{{$task->id}}/edit">
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-2">
                                                                           <label for="name">Name</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" style="width: 100%;"  name="name" class="form-control"
                                                                                id="name" value="{{$task->name}}" placeholder="Enter Name."/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 row2">
                                                                        <div class="col-md-2">
                                                                           <label for="role">Role</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input style="width: 100%;" type="text" name="role" class="form-control"
                                                                         id="role" value="{{$task->role}}" placeholder="Enter Role."/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 row2">
                                                                        <div class="col-md-2">
                                                                           <label for="contact">Contact</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                         <input style="width: 100%;" type="text" name="number" value="{{$task->contact}}" class="form-control"
                                                                         id="number" placeholder="Enter Contact Number."/>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <button style="position: relative; left: 300px;  " type="submit" class="row2 btn btn-primary">
                                                                    Update
                                                                </button>
                                                                        
                                                                <button style="position: relative; left: 310px;  " type="button" class="row2 btn btn-default" data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                            </form>  
                                                               

                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                            <div style="margin-top:20px; margin-bottom: 30px;" class="pull-left box-header" data-original-title="">
                                                <button type="button" class="btn btn-primary">
                                                    <b>Total Members</b>
                                                    <span class="badge"> {{ $tasks->total()}} </span>
                                                </button>
                                            </div>

                                            <div class="pull-right box-header" data-original-title="">
                                                <?php echo $tasks->appends(request()->only('status','role','member_name'))->render(); ?>
                                            </div>
                                        </tbody>
                                    </table>    
                                                         
                                </div>            
                            </div>  
                    </div>
                </div>
            </div>
        </div><!--/col-->

    </div><!--/row-->

</div>
@endsection
