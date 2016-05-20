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
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row">
                                <div class="col-lg-6">
                                    <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                        <label>Search: <input type="text" aria-controls="DataTables_Table_0"></label>
                                    </div>
                                </div>

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
                                    <td class=" ">{{$task->created_at}}</td>
                                    <td class=" ">{{$task->updated_at}}</td>
                                    <td class=" ">
                                        <a class="btn btn-success" href="">
                                            <i class="fa fa-search-plus "></i>
                                        </a>
                                        <a class="btn btn-info" href="">
                                            <i class="fa fa-edit "></i>
                                        </a>
                                        <form  action="task/{{$task->id}}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fa fa-trash-o "></i>
                                                </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                {{--<tr class="even">--}}
                                    {{--<td class=" sorting_1">Adinah Ralph</td>--}}
                                    {{--<td class=" ">2012/06/01</td>--}}
                                    {{--<td class=" ">Admin</td>--}}
                                    {{--<td class=" ">--}}
                                        {{--<span class="label label-default">Inactive</span>--}}
                                    {{--</td>--}}
                                    {{--<td class=" ">--}}
                                        {{--<a class="btn btn-success" href="table.html#">--}}
                                            {{--<i class="fa fa-search-plus "></i>--}}
                                        {{--</a>--}}
                                        {{--<a class="btn btn-info" href="table.html#">--}}
                                            {{--<i class="fa fa-edit "></i>--}}
                                        {{--</a>--}}
                                        {{--<a class="btn btn-danger" href="table.html#">--}}
                                            {{--<i class="fa fa-trash-o "></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div><!--/col-->

    </div><!--/row-->

</div>

@endsection