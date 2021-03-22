@extends('user.userlayout.container')

@section('container')<!--
<h1 class="page-title">User List
                    </h1>
                -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="#">Trade List</a>
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
                                        <span class="caption-subject font-green sbold uppercase">Trade List</span>
                                    </div>
                                     <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <a class="btn btn-success" href="{{ route('user.trade.create') }}">Create New Trade</a>
                                        </div>
                                            
                                    </div>
                                    
                                </div>
                               
                               
                                <div class="portlet-body">
                                    {{-- <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2"> --}}
                                    <table class="table table-bordered mb-5" >
                                        <thead>
                                            <tr>
                                                
                                                <th>Trade Id</th>
                                                <th>Quantity</th>
                                                <th>Area</th>
                                                <th>Accepected Rate</th>
                                                <th>Crop</th>
                                                <th>Policy Type</th>
                                                <th>Policy Price</th>
                                                <th>Customer Name</th>
                                                <th>Created On</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(! count($trades) > 0)
                                                <th>No Trade Present</th>
                                            @endif
                                                @foreach($trades as $trade)
                                                  <tr class="odd gradeX">
                                                

                                                    <td>{{$trade->id}}</td>
                                                    <td>{{$trade->quantity}}</td>
                                                    <td>{{$trade->area}}</td>
                                                    <td>{{$trade->accepected_rate}}</td>
                                                    <td>{{$trade->crop_name}}</td>
                                                    <td>{{$trade->policy_type}}</td>
                                                    <td>{{$trade->actual_price}}</td>
                                                    <td>{{$trade->created_by_name}}</td>
                                                    <td>{{$trade->created_at->format('d/m/Y') }}</td>
                                                    @if($trade->status_id == 0)
                                                         <td>Pending</td>
                                                    @endif
                                                    @if($trade->status_id == 1)
                                                         <td>Active</td>
                                                    @endif
                                                    @if($trade->status_id == 2)
                                                         <td>Completed</td>
                                                    @endif
                                                    @if($trade->status_id == 3)
                                                         <td>Rejected</td>
                                                    @endif
                                                   
                                                    <td>
                                                        {!! Html::linkRoute('user.trade.detail',' View',[$trade->id],['class'=>'btn btn-outline btn-circle btn-sm blue jquery-btn-view']) !!}
        
                                                    </td>
                                                  </tr>
                                                @endforeach
                                        </tbody>

                                    </table>

                                    <div class="d-flex justify-content-center">
                                        {!! $trades->links() !!}
                                    </div>
                                </div>

                            </div>

                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
@endsection