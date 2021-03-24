@extends('admin.adminlayout.container')

@section('container')
<h1 class="page-title"> User Registration
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
                                <a href="#">User Registration</a>
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
                                        <span class="caption-subject font-dark bold uppercase">User Details</span>
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
                                    <form class="form-horizontal" role="form" action="{{route('user.save_user_details')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <h4>Personal Details</h4>
                                         <hr>
                                         <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Name</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$user->name}}" disabled="true"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="father_name" class="col-md-2 control-label">Father's Name</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" placeholder="Father's Name" name="father_name" value="{{@$user->user_detail->father_name}}" disabled="true"> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="dob" class="col-md-2 control-label">DOB</label>
                                            <div class="col-md-5">
                                                <input type="date" class="form-control" id="dob" placeholder="Date of birth" name="dob"  value="{{@$user->user_detail->dob}}" disabled="true"> 
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="aadhar_number" class="col-md-2 control-label">Aadhar Number</label>
                                            <div class="col-md-5">
                                                <input type="number" class="form-control" id="aadhar_number" placeholder="Aadhar Number" name="aadhar_number" value="{{@$user->user_detail->aadhar_number}}" disabled="true"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="family_member" class="col-md-2 control-label">Family Member</label>
                                            <div class="col-md-5">
                                                <input type="number" class="form-control" id="family_member" placeholder="Family Member" name="family_member" value="{{@$user->user_detail->family_member}}" disabled="true"> 
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="mobile" class="col-md-2 control-label">Mobile Number</label>
                                            <div class="col-md-5">
                                                <input type="tel" maxlength="10" class="form-control" id="mobile" placeholder="Mobile Number" name="mobile" value="{{@$user->user_detail->mobile}}" disabled="true"> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-md-2 control-label">Email</label>
                                            <div class="col-md-5">
                                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$user->email}}" disabled="true"> 
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Address</h4>
                                        <hr>
                                         <div class="form-group">
                                            <label for="state" class="col-md-2 control-label">State</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="state" placeholder="State" name="state" value="{{@$user->user_detail->state}}" disabled="true"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="district" class="col-md-2 control-label">District</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="district" placeholder="District" name="district" name="district" value="{{@$user->user_detail->district}}" disabled="true"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-md-2 control-label">City</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{@$user->user_detail->city}}" disabled="true"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pincode" class="col-md-2 control-label">Pincode</label>
                                            <div class="col-md-5">
                                                <input type="number" class="form-control" id="pincode" placeholder="Pincode" name="pincode" value="{{@$user->user_detail->pincode}}" disabled="true"> 
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="address" class="col-md-2 control-label">Address</label>
                                            <div class="col-md-5">
                                                 <textarea class="form-control" id="address" placeholder="Address" rows="3" name="address" disabled="true">{{@$user->user_detail->address}}</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Farming Area Details</h4>
                                         <hr>
                                        <div class="form-group">
                                            <label for="area" class="col-md-2 control-label">Crop Area in Akad</label>
                                            <div class="col-md-5">
                                                <input type="number" class="form-control" id="area" placeholder="Crop Area in Akad" name="area" value="{{@$user->user_detail->area}}" disabled="true"> 
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="land_type">Land Type</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="land_type" placeholder="Land Type" name="land_type" value="{{@$user->user_detail->land_type}}" disabled="true">
                                                    <option>Self</option>
                                                    <option>Rented</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="crop_types">Types of crop</label>
                                            <div class="col-md-5">
                                                <select multiple class="form-control" id="crop_types" placeholder="Types of crop" name="crop_types">
                                                    <option value="1">Sarso</option>
                                                    <option value="2">Gehu</option>
                                                    <option value="3">Chawal</option>
                                                </select>
                                            </div>
                                        </div>
                                    -->
                                        <hr>
                                        <h4>Bank Details</h4>
                                        <hr>
                                        <div class="form-group">
                                            <label for="bank_name" class="col-md-2 control-label">Bank Name</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="bank_name" placeholder="Bank Name" name="bank_name" value="{{@$user->user_detail->bank_name}}" disabled="true"> 
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label for="name_on_bank" class="col-md-2 control-label">Account Holder Name</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="name_on_bank" placeholder="Account Holder Name" name="name_on_bank" value="{{@$user->user_detail->name_on_bank}}" disabled="true">  
                                            </div>
                                        </div> 

                                         <div class="form-group">
                                            <label for="account_number" class="col-md-2 control-label">Account Number</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="account_number" placeholder="Account Number" name="account_number" value="{{@$user->user_detail->account_number}}" disabled="true"> 
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label for="ifsc_code" class="col-md-2 control-label">IFSC Code</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="ifsc_code" placeholder="IFSC Code" name="ifsc_code" value="{{@$user->user_detail->ifsc_code}}" disabled="true"> 
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="passbook_image" class="col-md-2 control-label">Passbook Image</label>
                                            <div class="col-md-5">

                                                @if(@$user->user_detail->passbook_image) 
                                                     <a href="{{ route('admin.download_image', [$user->id,'passbook_image']) }}" class="btn btn-success">Download Image</a>

                                                @else 

                                                    <a href="#" class="btn btn-danger">No Image Present</a>

                                                @endif   
                                                
                                            </div>
                                        </div>

                                        <hr>
                                        <h4>Upload Files</h4>
                                        <hr>
                                        <div class="form-group">
                                            <label for="passport_size_image" class="col-md-2 control-label">Passport Size Image</label>
                                             <div class="col-md-5">

                                                @if(@$user->user_detail->passport_size_image) 
                                                     <a href="{{ route('admin.download_image', [$user->id,'passport_size_image']) }}" class="btn btn-success">Download Image</a>

                                                @else 

                                                    <a href="#" class="btn btn-danger">No Image Present</a>

                                                @endif   
                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="signature_image" class="col-md-2 control-label">Signature Image</label>
                                            <div class="col-md-5">

                                                @if(@$user->user_detail->signature_image) 
                                                     <a href="{{ route('admin.download_image', [$user->id,'signature_image']) }}" class="btn btn-success">Download Image</a>

                                                @else 

                                                    <a href="#" class="btn btn-danger">No Image Present</a>

                                                @endif   
                                                    
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="aadhar_image" class="col-md-2 control-label">Aadhar Image</label>
                                            <div class="col-md-5">

                                                @if(@$user->user_detail->aadhar_image) 
                                                     <a href="{{ route('admin.download_image', [$user->id,'aadhar_image']) }}" class="btn btn-success">Download Image</a>

                                                @else 

                                                    <a href="#" class="btn btn-danger">No Image Present</a>

                                                @endif   
                                                    
                                             </div>
                                        </div>


                                        <!--
                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-4">
                                                <label class="mt-checkbox">
                                                    <input type="checkbox"> Remember me
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>-->

                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10">
                                                @if(@$user->is_active) 

                                                     <a href="{{ route('admin.update_user_status', $user->id) }}" class="btn btn-danger">Deactivate</a>

                                                @else 

                                                   <a href="{{ route('admin.update_user_status', $user->id) }}" class="btn btn-primary">Activate</a>

                                                @endif  
                                            </div>
                                        </div>
                                    </form>
                                
                                    
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
                    </div>

@endsection