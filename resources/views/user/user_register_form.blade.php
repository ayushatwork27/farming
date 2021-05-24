@extends('user.userlayout.container')

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
                                @if($errors->has('bank_name'))
                                    <div class="alert alert-danger">
                                        <strong id="" class="text-danger">
                                                    {{ $errors->first('bank_name') }}
                                        </strong>
                                    </div>
                                    
                                @endif
                                @if($errors->has('terms'))
                                    <div class="alert alert-danger">
                                        <strong id="" class="text-danger">
                                                    {{ $errors->first('terms') }}
                                        </strong>
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
                                                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$user->name}}"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="father_name" class="col-md-2 control-label">Father's Name</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" placeholder="Father's Name" name="father_name" value="{{@$user_detail->father_name}}"> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="dob" class="col-md-2 control-label">DOB</label>
                                            <div class="col-md-5">
                                                <input type="date" class="form-control" id="dob" placeholder="Date of birth" name="dob"  value="{{@$user_detail->dob}}"> 
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="aadhar_number" class="col-md-2 control-label">Aadhar Number</label>
                                            <div class="col-md-5">
                                                <input type="number" class="form-control" id="aadhar_number" placeholder="Aadhar Number" name="aadhar_number" value="{{@$user_detail->aadhar_number}}"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="family_member" class="col-md-2 control-label">Family Member</label>
                                            <div class="col-md-5">
                                                <input type="number" class="form-control" id="family_member" placeholder="Family Member" name="family_member" value="{{@$user_detail->family_member}}"> 
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="mobile" class="col-md-2 control-label">Mobile Number</label>
                                            <div class="col-md-5">
                                                <input type="tel" maxlength="10" class="form-control" id="mobile" placeholder="Mobile Number" name="mobile" value="{{@$user_detail->mobile}}"> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-md-2 control-label">Email</label>
                                            <div class="col-md-5">
                                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$user->email}}"> 
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Address</h4>
                                        <hr>
                                         <div class="form-group">
                                            <label for="state" class="col-md-2 control-label">State</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="state" placeholder="Chhattisgarh" name="state" value="{{@$user_detail->state}}" readonly="readonly"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="district" class="col-md-2 control-label">District</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="district" placeholder="District" name="district" name="district" value="{{@$user_detail->district}}"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-md-2 control-label">City / Village</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{@$user_detail->city}}"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pincode" class="col-md-2 control-label">Pincode</label>
                                            <div class="col-md-5">
                                                <input type="number" class="form-control" id="pincode" placeholder="Pincode" name="pincode" value="{{@$user_detail->pincode}}"> 
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="address" class="col-md-2 control-label">Address</label>
                                            <div class="col-md-5">
                                                 <textarea class="form-control" id="address" placeholder="Address" rows="3" name="address">{{@$user_detail->address}}</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Farming Area Details</h4>
                                         <hr>
                                        <div class="form-group">
                                            <label for="area" class="col-md-2 control-label">Crop Area in Akad</label>
                                            <div class="col-md-5">
                                                <input type="number" class="form-control" id="area" placeholder="Crop Area in Akad" name="area" value="{{@$user_detail->area}}"> 
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="land_type">Land Type</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="land_type" placeholder="Land Type" name="land_type" value="{{@$user_detail->land_type}}">
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
                                                <input type="text" class="form-control" id="bank_name" placeholder="Bank Name" name="bank_name" value="{{@$user_detail->bank_name}}"> 
                                            </div>
                                        </div> 
                                        @if($errors->has('bank_name'))
                                            <div class="alert alert-danger">
                                                <strong id="" class="text-danger">
                                                            {{ $errors->first('bank_name') }}
                                                </strong>
                                            </div>
                                            
                                        @endif

                                        <div class="form-group">
                                            <label for="name_on_bank" class="col-md-2 control-label">Account Holder Name</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="name_on_bank" placeholder="Account Holder Name" name="name_on_bank" value="{{@$user_detail->name_on_bank}}">  
                                            </div>
                                        </div> 

                                         <div class="form-group">
                                            <label for="account_number" class="col-md-2 control-label">Account Number</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="account_number" placeholder="Account Number" name="account_number" value="{{@$user_detail->account_number}}"> 
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label for="ifsc_code" class="col-md-2 control-label">IFSC Code</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="ifsc_code" placeholder="IFSC Code" name="ifsc_code" value="{{@$user_detail->ifsc_code}}"> 
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="passbook_image" class="col-md-2 control-label">Passbook Image</label>
                                            <div class="col-md-5">
                                                <input type="file" id="passbook_image" placeholder="passbook_image" name="passbook_image">
                                                <p class="help-block">*png / *jpeg are only allowed</p>
                                            </div>
                                        </div>

                                        <hr>
                                        <h4>Upload Files</h4>
                                        <hr>
                                        <div class="form-group">
                                            <label for="passport_size_image" class="col-md-2 control-label">Passport Size Image</label>
                                            <div class="col-md-5">
                                                <input type="file" id="passport_size_image" placeholder="passport_size_image" name="passport_size_image">
                                                <p class="help-block">*png / *jpeg are only allowed</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="signature_image" class="col-md-2 control-label">Signature Image</label>
                                            <div class="col-md-5">
                                                <input type="file" id="signature_image" placeholder="signature_image" name="signature_image">
                                                <p class="help-block">*png / *jpeg are only allowed</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="aadhar_image" class="col-md-2 control-label">Aadhar Image</label>
                                            <div class="col-md-5">
                                                <input type="file" id="aadhar_image" placeholder="aadhar_image" name="aadhar_image">
                                                <p class="help-block">*png / *jpeg are only allowed</p>
                                            </div>
                                        </div>
                                         

                                        
                                        <div class="clear"></div>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="mt-checkbox">
                                                    <input type="checkbox" name="terms" value=true > Do you agree to Terms & Conditions
                                                    <span></span> <button type="button" class="btn btn-success" id="policy_details" data-item-id="1">Read</button>
                                                </label>
                                            </div>
                                        </div>
                                        @if($errors->has('terms'))
                                            <div class="alert alert-danger">
                                                <strong id="" class="text-danger">
                                                            {{ $errors->first('terms') }}
                                                </strong>
                                            </div>
                                            
                                        @endif

                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10">
                                                <button type="submit" class="btn blue">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                
                                    
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
                    </div>

                     <!-- Privacy Modal -->
                    <div class="modal fade" id="policy-modal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" align="center"><b>Terms & Conditions</b></h4>
                          </div>
                          <div class="modal-body">
                            <div class="c-content-feedback-1 c-option-1" >
                                <div class="c-container" style="padding: 10px;background: #eef1f5!important;">
                                    <div class="c-content-title-1 c-inverse">

                                        <div class="c-line-left">Privacy Policy</div>
                                        <p class="c-font-lowercase">
                                            <ul>
                                                <li>
                                                    The motive behind our association with farmers is to move toward success with farmers and for farmers.
                                                </li>
                                                <li>
                                                    We want to work on quantity as well as the quality of a product.
                                                </li>
                                                <li>
                                                   We want to give farmers what they deserve for their hard work.
                                                </li>
                                                <li>
                                                    “Annadata Sukhi Bhav" is the motto of our business, for us, Annadata means a farmer who works day and night to supply basic food to the whole nation.
                                                    As we said earlier we want to move toward success with farmers and for farmers, in continuation of the same, all suggestions of the farmer for their betterment and better productivity are always welcomed.
                                                </li>
                                                <li>
                                                   With the hope of working with farmers and for farmers we are maintaining a database of farmers that includes basic details such as name, email, phone, etc. that can be used by Shree traders as and when used. 
                                                </li>
                                            </ul>
                                        </p>


                                        <div class="c-line-left">Terms & Conditions</div>
                                        <p class="c-font-lowercase">
                                            <ul>
                                                <li>
                                                    Our work is based on the business model approved by the Shree traders and the Shree traders is not bound to share the same with the ultimate consumer to maintain confidentiality; however, the Shree traders  will make provide complete detail in respect of policy which contains the working terms with farmers. 
                                                </li>
                                                <li>
                                                   Shree traders will distribute bonus at the end of every financial year which depends upon the profit earned by Shree Traders during the year in compliance with the policy followed by the Shree traders, of which few conditions are as follows:
                                                   <ul>
                                                       <li>
                                                           Distribution of bonus depends upon the quality of the product (to be measured with the verified techniques), past working relation, etc.
                                                       </li>
                                                       <li>
                                                          There will be some exception for the distribution of bonus such as the occurrence of natural calamities like Earthquakes., Landslides.,Famines & Droughts.,Hurricanes, Tornados, and Cyclones, Extreme precipitation and flooding, Extreme Temperature (Heat & Cold), Global Pandemic, etc. However, the Shree traders is always bound for repayment of the principal trading amount which is pending.
                                                       </li>
                                                   </ul>
                                                </li>

                                                <li>
                                                   The Shree traders will work as per the scheme introduced and farmers have to follow the same after taking into consideration all terms and conditions of the respective scheme. However, the farmer cannot force the Shree traders for a refund before the completion of the scheme.
                                                </li>
                                                <li>
                                                   In case farmers force the Shree traders for any activity which is out of the range of the scheme, the Shree traders reserves full right to act as per the terms and conditions decided at the time of introduction of the scheme.
                                                </li>
                                                <li>
                                                   The Shree traders will enter into an agreement with farmers containing all the terms and conditions of the business before initiation of any business relationship and both parties will be bound to such agreement. 
                                                </li>
                                                <li>
                                                  If any technical issue faced by the farmer during online submission or completion of procedure they can switch for offline mode for completion of the trade process.
                                                </li>
                                                <li>
                                                   If the farmer is proven guilty for any misconduct, default, misappropriation of funds, then the Shree traders has the right to block the respective account of such person and also blacklist the person to avoid happening of any future event.
                                                </li>
                                            </ul>
                                        </p>
                                        <p class="c-font-lowercase">
                                            I have read the above mentioned Privacy policy and Terms and Conditions and I agree to it and ready to start a new business relationship with Shree traders.
                                        </p>

                                       {{--  <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="mt-checkbox">
                                                    <input type="checkbox" name="terms"> Do you agree to Terms & Conditions
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      <!-- /Privacy Modal -->


<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('click', "#policy_details", function() {
      
        $('#policy-modal').modal()
      })

    });
</script>

@endsection