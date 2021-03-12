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
                                        <span class="caption-subject font-dark bold uppercase">Create Trade</span>
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
                                @endif
                                <h2><b> {{ @$crop->name }}</b></h2>
                                <ul >
                                     <li class="list-group-item list-group-item-success">Gold : {{ @$crop->gold }}</li>
                                     <li class="list-group-item list-group-item-secondary">Silver : {{ @$crop->silver }}</li>
                                     <li class="list-group-item active">Normal : {{ @$crop->normal }} </li>
                                </ul>
                        
                                <div class="portlet-body">
                                    <form class="form-horizontal" role="form" action="{{ route('user.save_user_tradedetail') }}" method="POST">
                                        {{ csrf_field() }}
                                        <h4>Trade Details</h4>
                                         <hr>

                                         
                                         
                                        
                                        <!--  <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Quantity</label>
                                            <div class="col-md-5">
                                                <input type="number" name="quantity" class="form-control" placeholder="Quantity" > 
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="category" class="col-md-2 control-label">Area</label>
                                            <div class="col-md-5">
                                                <input type="number" name="area" class="form-control" placeholder="Area" >
                                            </div>
                                        </div> -->

                                        <div class="form-group">
                                           <label for="normal" class="col-md-2 control-label">Select Policy Type</label>
                                            <div class="col-md-5">


                                                <select class="form-control" id="policy_type" placeholder="Policy Type" name="policy_type" value="">
                                                    <option value="gold">Gold</option>
                                                    <option value="silver">Silver</option>
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