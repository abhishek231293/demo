@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header" data-original-title="">
                        <h2><i class="fa fa-user"></i><span class="break"></span>Members</h2>
                           
                    </div>
                    <div class="box-content">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <div class="row row2">
                                    <div class="col-md-10">
                                       
                                            {{ csrf_field() }}
                                            <div class="form control-group">
                                                 <form class="search-form" action="{{ url('/task') }}" method="GET">
                                                    <select class="form-control" id="status" name="status" >
                                                        <option value=""> --Select Status-- </option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                     
                                                    <select class="form-control" id="status" name="role">
                                                        <option value=""> --Select Department-- </option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{$role->role}}">{{$role->role}}</option>
                                                        @endforeach
                                                    </select>
                                                     
                                                     <input placeholder="Enter Name" class="form-control" id="member_name" name="member_name">
                                                     
                                                     <button class="form-control btn-danger" type="submit">
                                                         Go
                                                     </button>
                                                </form>
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

                                        <tr class="odd">
                                            <td class=" sorting_1">{{$task->name}}</td>
                                            <td class=" ">{{$task->role}}</td>
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
                                                    <a class="btn btn-info" href="">
                                                        <i class="fa fa-edit "></i>
                                                    </a>
                                                </div>

                                                <div style="display:inline-block;">
                                                    <form  action="task/{{$task->id}}" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                            <button class="btn btn-danger" type="submit">
                                                                <i class="fa fa-trash-o">    </i>
                                                            </button>
                                                    </form>
                                                </div >

                                            </td>
                                        </tr>
                                        @endforeach
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
