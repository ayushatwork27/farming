		
									<h1>User Details </h1>



												<div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_11">
                                                        
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="background: #eee;padding: 8px;border: 1px solid #ddd;text-align: center;"> <i class="fa fa-briefcase"></i> User Information</th>
                                                                        <th style="background: #eee;padding: 8px;border: 1px solid #ddd;text-align: center;"> <i class="fa fa-briefcase"></i> User Detalis</th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                    <tr>
                                                                        <td> 
                                                                             Customer Name
                                                                        </td>
                                                                        <td>
                                                                           {{ @$user->name}} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                             Customer Father Name
                                                                        </td>
                                                                        <td>
                                                                           {{ @$user->user_detail->father_name}} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                             Date Of Birth
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->dob}} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                             Aadhar Number
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->aadhar_number}} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                             Family Member
                                                                        </td>
                                                                        <td>
                                                                            {{ @ucfirst($user->user_detail->family_member) }} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            Mobile Number
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->mobile }} 
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    
                                                                    <tr>
                                                                        <td> 
                                                                            Email Id
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->email }} 
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                     <tr>
                                                                        <td> 
                                                                            State
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->state }} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            District
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->district }} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            City
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->city }} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                           Pincode
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->pincode }} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            Address
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->address }} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            Area
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->area }} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            Land Type
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->land_type }} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            Bank Name
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->bank_name }} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            Account Holder Name
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->name_on_bank }} 
                                                                        </td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td> 
                                                                           Ifsc Code
                                                                        </td>
                                                                        <td>
                                                                            {{ @$user->user_detail->ifsc_code }} 
                                                                        </td>
                                                                    </tr>
                                                                    <td> 
                                                                           Ifsc Code
                                                                        </td>
                                                                        <td>
                                                                            
                                        									<img src="{{ $user->user_detail->passbook_image }}" class="pull-right"  alt="Images">
                                   									 		
                                                                        </td>
                                                                    
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                    <!--tab-pane-->
                                                   
                                                    <!--tab-pane-->
                                                </div>
