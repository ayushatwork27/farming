@extends('user.userlayout.container')

@section('container')
<!--
<h1 class="page-title">User List
                    </h1>
                -->
                
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Trade List</a>
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
                                            <a class="btn btn-success" href="{{ route('user.trade_user_list') }}">Create New Trade</a>
                                        </div>
                                            
                                    </div>
                                    
                                </div>
                                 <div class="portlet-body" >
                                   <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                                        <thead>
                                            <tr>
                                                
                                                <th> Name </th>
                                                <th> Crop </th>
                                                <th> Quantity </th>

                                                <th> Area</th>
                                                <th> Accepected rate </th>
                                                <th> Policy type </th>
                                                <th> Actual price</th>
                                                <th> Date</th>

                                                <th> Action </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(! count(array(@$trades)) > 0)
                                                <tr  class="odd gradeX">
                                                      <th colspan="8">No trade Added</th>
                                                </tr>
                                              
                                            @endif
                                                @foreach($trades as $trade)
                                                  <tr class="odd gradeX">
                                                    <td>{{$trade->name}}</td>
                                                    <td>{{$trade->category}}</td>
                                                    <td>{{$trade->quantity}}</td>
                                                    <td>{{$trade->area}}</td>
                                                    <td>{{$trade->accepected_rate}}</td>
                                                    <td>{{$trade->policy_type}}</td>
                                                    <td>{{$trade->actual_price}}</td>
                                                    <td>{{$trade->created_at->format('d/m/Y') }}</td>

                                                    <td>{!! Html::linkRoute('user.trade_show',' View',[$trade->id],['class'=>'btn btn-outline btn-circle btn-sm blue jquery-btn-view']) !!}</td>
                                                    
                                                   
                                                   
                                                   
                                                  </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">  
                                     <div class="col-lg-12">
                                     {{ $trades->links() }}
                                     </div>
                                    </div>
                                </div>                            

                          </div>
                       </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

@endsection
