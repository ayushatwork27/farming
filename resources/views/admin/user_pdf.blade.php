<!DOCTYPE html>
<html>


<body>

	<h4>Personal Details</h4>

	<table style="border: 1px solid black; padding:10px;width: 100%;" >
	  <tr>
	    <th><b>Name:</b></th>
	    <td>{{$user->name}}</td>
	  </tr>
	  <tr>
	    <th><b>Father's Name:</b></th>
	    <td>{{@$user->user_detail->father_name}}</td>
	  </tr>
	   <tr>
	    <th><b>DOB:</b></th>
	    <td>{{@$user->user_detail->dob}}</td>
	  </tr>
	   <tr>
	    <th><b>Aadhar Number:</b></th>
	    <td>{{@$user->user_detail->aadhar_number }}</td>
	  </tr>
	   <tr>
	    <th><b>Family Member:</b></th>
	    <td>{{@$user->user_detail->family_member}}</td>
	  </tr>
	  <tr>
	    <th><b>Mobile Number:</b></th>
	    <td>{{@$user->user_detail->mobile }}</td>
	  </tr>
	  <tr>
	    <th><b>Email:</b></th>
	    <td>{{@$user->email}}</td>
	  </tr>
	 
	</table>

	<h4>Address</h4>

	<table style="border: 1px solid black; padding:10px;width: 100%;" >
	  <tr>
	    <th><b>State:</b></th>
	    <td>{{$user->user_detail->state}}</td>
	  </tr>
	  <tr>
	    <th><b>District:</b></th>
	    <td>{{@$user->user_detail->district}}</td>
	  </tr>
	   <tr>
	    <th><b>City:</b></th>
	    <td>{{@$user->user_detail->city}}</td>
	  </tr>
	   <tr>
	    <th><b>Pincode:</b></th>
	    <td>{{@$user->user_detail->pincode }}</td>
	  </tr>
	   <tr>
	    <th><b>Address:</b></th>
	    <td>{{@$user->user_detail->address }}</td>
	  </tr>
	  <tr>
	    <th><b>Crop Area in Akad:</b></th>
	    <td>{{@$user->user_detail->area }}</td>
	  </tr>
	  <tr>
	    <th><b>Land Type:</b></th>
	    <td>{{@$user->user_detail->land_type}}</td>
	  </tr>
	 
	</table>
	<h4>Bank Details</h4>

	<table style="border: 1px solid black; padding:10px;width: 100%;" >
	  <tr>
	    <th><b>Bank Name:</b></th>
	    <td>{{$user->user_detail->bank_name}}</td>
	  </tr>
	  <tr>
	    <th><b>Account Holder Name:</b></th>
	    <td>{{@$user->user_detail->name_on_bank }}</td>
	  </tr>
	   <tr>
	    <th><b>Account Number:</b></th>
	    <td>{{@$user->user_detail->account_number }}</td>
	  </tr>
	   <tr>
	    <th><b>IFSC Code:</b></th>
	    <td>{{@$user->user_detail->ifsc_code }}</td>
	  </tr>
	 
	</table>

	<h4>Document Details</h4>


	<table style="border: 1px solid black; padding:10px;width: 100%;" >

	  <tr>
	    <th><b>Passbook Image:</b></th>
	    <td>
	    	@if(@$user->user_detail->passbook_image) 
		         <a href="{{ route('admin.download_image', [$user->id,'passbook_image']) }}" class="btn btn-success">Download</a>
		    @else 

		        <a href="#" class="btn btn-danger">No Image Present</a>

		    @endif  
		</td>
	  </tr>
	  <tr>
	    <th><b>Passport Size Image:</b></th>
	    <td>
	    	@if(@$user->user_detail->passport_size_image) 
		         <a href="{{ route('admin.download_image', [$user->id,'passport_size_image']) }}" class="btn btn-success">Download</a>

		    @else 

		        <a href="#" class="btn btn-danger">No Image Present</a>

		    @endif   
		</td>
	  </tr>

	   <tr>
	    <th><b>Signature Image</b></th>
	    <td>
	    	@if(@$user->user_detail->signature_image) 
		         <a href="{{ route('admin.download_image', [$user->id,'signature_image']) }}" class="btn btn-success">Download</a>

		    @else 

		        <a href="#" class="btn btn-danger">No Image Present</a>

		    @endif     
		</td>
	  </tr>

	   <tr>
	    <th><b>Aadhar Image:</b></th>
	    <td>
	    	 @if(@$user->user_detail->aadhar_image) 
		         <a href="{{ route('admin.download_image', [$user->id,'aadhar_image']) }}" class="btn btn-success">Download</a>

		    @else 

		        <a href="#" class="btn btn-danger">No Image Present</a>

		    @endif 
		</td>
	  </tr>
	 
	</table>



{{-- 	<img src="{{ storage_path('app/public/' .$user->user_detail->passbook_image) }}" /> --}}

</body>
</html>

 




