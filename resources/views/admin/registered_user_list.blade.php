@extends('admin.adminlayout.container')

@section('container')<!--
<h1 class="page-title">User List
                    </h1>
                -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">User List</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon-bell"></i> Action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shield"></i> Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-user"></i> Something else here</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-bag"></i> Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->

                    <div class="row">
                       <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit portlet-datatable ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">User List</span>
                                    </div>
                                    
                                </div>
                               
                               
                                <div class="portlet-body">
                                    <table class="table table-responsive  table-striped table-bordered table-hover order-column" id="sample_2">
                                        <thead>
                                            <tr>
                                                
                                                <th> Name </th>
                                                <th> Email </th>
                                                <th> Registered On </th>
                                                <th> Active</th>
                                                
                                                <th> Action </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(! count($users) > 0)
                                                <th>No User Added</th>
                                            @endif
                                                @foreach($users as $user)
                                                  <tr class="odd gradeX">
                                                

                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->created_at->format('d.m.Y') }}</td>
                                                    <td>{{$user->is_active == 1 ? 'Yes' : 'No'}}</td>
                                                    
                                                    
                                                   
                                                    <td>
                                                        {!! Html::linkRoute('admin.user_detail',' View',[$user->id],['class'=>'btn btn-outline btn-circle btn-sm blue jquery-btn-view']) !!}
        
                                                    </td>
                                                  </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
@endsection