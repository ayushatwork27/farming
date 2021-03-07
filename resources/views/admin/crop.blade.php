@extends('admin.adminlayout.container')

@section('container')
<!--
<h1 class="page-title">User List
                    </h1>
                -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Crop List</a>
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
                                        <span class="caption-subject font-green sbold uppercase">Crop List</span>
                                    </div>
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <a class="btn btn-success" href="{{ route('admin.createcrop') }}">Create New Crop</a>
                                        </div>
                                            
                                    </div>
                                    
                                </div>
                                 <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                                        <thead>
                                            <tr>
                                                
                                                <th> Name </th>
                                                <th> Category </th>
                                                <th> Normal </th>
                                                <th> Silver </th>
                                                <th> Gold </th>
                                                <th> Registered On </th>
                                                <th> Active</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(! count($crops) > 0)
                                                <tr  class="odd gradeX">
                                                      <th colspan="8">No Crop Added</th>
                                                </tr>
                                              
                                            @endif
                                                @foreach($crops as $crop)
                                                  <tr class="odd gradeX">
                                                    <td>{{$crop->name}}</td>
                                                    <td>{{$crop->category}}</td>
                                                    <td>{{$crop->normal}}</td>
                                                    <td>{{$crop->silver}}</td>
                                                    <td>{{$crop->gold}}</td>
                                                    <td>{{$crop->created_at->format('d.m.Y') }}</td>
                                                    <!-- <td>{{$crop->is_active == 1 ? 'Yes' : 'No'}}</td> -->
                                                   <td>@if($crop ?? ''->active == '1') 

                                                    <a href="{{url('admin/status_update',$crop->id)}}" class="btn btn-success">Active</a>

                                                     @else 

                                                    <a href="{{url('admin/status_update',$crop->id)}}" class="btn btn-danger">Inactive</a>

                                                     @endif                                   </td>
                                                   
                                                    <td>
                                                        {!! Html::linkRoute('admin.updatecrop',' Edit',[$crop->id],['class'=>'btn btn-outline btn-circle btn-sm blue jquery-btn-view']) !!}

        
                                                    </td>
                                                  </tr>
                                                @endforeach
                                        </tbody>
                                    </table>

                                   {{-- {{$users->links()}}  --}} 
                                </div>                            

                        </div>
                     
                               
                               

                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
@endsection
<script>

  $(function() {

    $('.toggle-class').change(function() {

        var status = $(this).prop('checked') == true ? 1 : 0; 

        var user_id = $(this).data('id'); 

         

        $.ajax({

            type: "GET",

            dataType: "json",

            url: '/changeStatus',

            data: {'status': status, 'user_id': user_id},

            success: function(data){

              console.log(data.success)

            }

        });

    })

  })

</script>