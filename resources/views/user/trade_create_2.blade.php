@extends('user.userlayout.container')

@section('container')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
    });
});
</script>
<h1 class="page-title"> Create Trade 
                        <small></small>
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Create Trade</a>
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

                    <!--End Page Header -->

                     <div class="row ">
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-dark"></i>
                                        <span class="caption-subject font-dark bold uppercase">Available Policies</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                @if(session()->has('feedback'))
                                    <div class="alert alert-success">
                                        <strong>Success:</strong> {{ session()->get('feedback') }}
                                    </div>
                                    @if(session()->has('failed'))
                                        <div class="alert alert-danger">
                                            <strong>Failed:</strong> {{ session()->get('failed') }}
                                        </div>
                                    @endif
                                @endif
                                <p><b> Crop Name:</b> {{ @$crop->name }}<br/>
                                <p><b> Crop Category:</b> {{ @$crop->category_name }}<br/>
                                <b> Crop Type:</b> {{ $crop->crop_type == 1 ? 'Non-Bonus': 'Bonus'   }}</p>
                                <table class="table table-bordered mb-5 table-bordered sm-12" >
                                    <thead>
                                        <tr>
                                            <th>Policy Type</th>
                                            <th>Price</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($crop->crop_type == 0)
                                            <tr >
                                               <th>Gold</th>
                                               <td>{{ @$crop->gold }}</td>
                                            </tr>
                                            <tr>
                                               <th>Silver</th>
                                               <td>{{ @$crop->silver }}</td>
                                            </tr>
                                        @endif
                                        
                                        <tr>
                                           <th>Normal</th>
                                           <td>{{ @$crop->normal }}</td>
                                        </tr>
                                    </tbody>
                                </table>    
                        
                                <div class="portlet-body">
                                    <form class="form-horizontal" role="form" action="{{ route('user.trade.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <h4>Select Policies:</h4>
                                         <hr>
                                        <div class="form-group">
                                           <label for="normal" class="col-md-2 control-label">Select Policy Type</label>
                                            <div class="col-md-5">


                                                <select class="form-control" id="policy_type" placeholder="Policy Type" name="policy_type" value="">
                                                    @if($crop->crop_type == 0)
                                                        <option value="gold">Gold</option>
                                                        <option value="silver">Silver</option>
                                                    @endif

                                                    
                                                    <option value="normal">Normal</option>
                                                </select>

                                             </div>
                                        </div>
                                       

                              			<div class="form-group">
                              				
                                            <div class="col-md-offset-2 col-md-10">
                                                <button type="submit" class="btn blue pull-left">Save</button>
                                                

                                            </div>
                                        </div>

                                         

                                    </form>
                                    
                                
                                    
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
                    </div>
					@endsection