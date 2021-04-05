@extends('admin.adminlayout.container')

@section('container')

<h1 class="page-title"> Create New Crop 
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
                                <a href="#">Create New Crop</a>
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
                                        <span class="caption-subject font-dark bold uppercase">Create New Crop</span>
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

                                <div class="portlet-body">
                                    <form class="form-horizontal" role="form" action="{{ route('admin.store') }}" method="POST">
                                        {{ csrf_field() }}

                                         
                                        <h4>Crop Details</h4>
                                         <hr>
                                         <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10">
                                                @if(@$crop->active) 
                                                    @if(@$crop->id)
                                                         <a href="{{ route('admin.update_crop_status', @$crop->id) }}" class="btn btn-danger">Deactivate</a>
                                                    @endif
                                                    

                                                @else 
                                                    @if(@$crop->id)
                                                        <a href="{{ route('admin.update_crop_status', @$crop->id) }}" class="btn btn-primary">Activate</a>
                                                    @endif

                                                   

                                                @endif  
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Name</label>
                                            <div class="col-md-5">
                                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ @$crop->name}}"> 
                                            </div>
                                            <input type="hidden" name="id" class="form-control" placeholder="id" value="{{ @$crop->id}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="category" class="col-md-2 control-label">Category</label>
                                            <div class="col-md-5">
                                                
                                                 <select class="form-control" id="crop_type" placeholder="Category Type" name="category_id">
                                                    @foreach($categories as $category)
                                                    <option value="{{ @$category->category_id }}" <?php if(@$crop->category_id == $category->category_id) { ?> selected="selected"<?php } ?>>{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category" class="col-md-2 control-label">Crop Type</label>
                                            <div class="col-md-5">
                                               
                                                <select class="form-control" id="crop_type" placeholder="Crop Type" name="crop_type" value="{{@$crop->crop_type}}">
                                                    <option value="0" <?php if(@$crop->crop_type == "0") { ?> selected="selected"<?php } ?>>Bonus</option>
                                                    <option value="1" <?php if(@$crop->crop_type == "1") { ?> selected="selected"<?php } ?>>Non-Bonus</option>
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <hr>
                                        <h4>Rate Of Fasal</h4>
                                        <hr>
                                         <div class="form-group">
                                            <label for="normal" class="col-md-2 control-label">Normal</label>
                                            <div class="col-md-5">
                                                <input type="text" name="normal" class="form-control" placeholder="Normal Price" value="{{ @$crop->normal}}"> 
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="normal" class="col-md-2 control-label">Terms and Condition For Normal Policy</label>
                                            <div class="col-md-9">

                                               
                                                <textarea data-provide="markdown" rows="10" data-error-container="#editor_error" name="normal_terms">{{ @$crop->normal_terms}}</textarea>
                                                 <div id="editor1_error"> </div>
                                            </div>
                                        </div>
 -->

                                        <div class="form-group">
                                            <label for="silver" class="col-md-2 control-label">Silver</label>
                                            <div class="col-md-5">
                                                <input type="text" name="silver" class="form-control" placeholder="Silver Price" value="{{ @$crop->silver}}">
                                            </div>
                                        </div>
                                       <!--  <div class="form-group">
                                            <label for="normal" class="col-md-2 control-label">Terms and Condition For Silver Policy</label>
                                            <div class="col-md-9">
                                               
                                                <textarea  data-provide="markdown" rows="10" data-error-container="#editor_error" name="silver_terms"> {{ @$crop->silver_terms}}</textarea>
                                                 <div id="editor1_error"> </div>
                                            </div>
                                        </div> -->

                                          <div class="form-group">
                                            <label for="gold" class="col-md-2 control-label">Gold</label>
                                            <div class="col-md-5">
                                                <input type="text" name="gold" class="form-control" placeholder="Gold Price" value="{{ @$crop->gold}}">
                                            </div>  
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="normal" class="col-md-2 control-label">Terms and Condition For Gold Policy</label>
                                            <div class="col-md-9">

                                               
                                                <textarea data-provide="markdown" rows="10" data-error-container="#editor_error" name="gold_terms">{!! @$crop->gold_terms !!}</textarea>
                                                 <div id="editor1_error"> </div>
                                            </div>
                                        </div> -->
                              			
                                           


                              			<div class="form-group">
                              				
                                            <div class="col-md-offset-2 col-md-10">
                                                <button type="submit" class="btn blue pull-left">Save</button>
                                                <a class="btn btn-primary pull-right" href="{{ route('admin.index') }}">Back</a>

                                            </div>
                                        </div>

                                         

                                    </form>
                                    
                                
                                    
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
                    </div>
					@endsection

                                        
                                            
                                            