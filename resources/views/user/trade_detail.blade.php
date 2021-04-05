@extends('user.userlayout.container')

@section('container')
<h1 class="page-title"> Trade Details 
                        <small></small>
                    </h1>
                   
                    <!-- END PAGE HEADER-->
                    <div class="profile">
                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab"> Overview </a>
                                </li>
                               
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8 profile-info">
                                                    <h1 class="font-green sbold uppercase">
                                                        {{ @$trade->name}}</h1>
                                                    <p>
                                                        </p>
                                                    <p>
                                                        
                                                    </p>
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-calendar"></i> <strong>Created on:</strong> 
                                                            {{@$trade->created_at->format('d.m.Y')}} 
                                                        </li>
                                                         <li>
                                                            <i class="fa fa-calendar"></i> <strong>Last Updated on:</strong> 
                                                            {{@$trade->updated_at->format('d.m.Y')}} 
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-trademark"></i> <strong>Trade Status</strong> 
                                                            {{@ucfirst($trade->status)}} 
                                                        </li>


                                                       
                                                    </ul>
                                                </div>
                                                <div class="clear"></div>
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-12">
                                                          @if(session()->has('feedback'))
                                                            <div class="alert alert-success">
                                                                <strong>Success:</strong> {{ session()->get('feedback') }}
                                                            </div>
                                                           @endif
                                                           @if(session()->has('failed'))
                                                            <div class="alert alert-danger">
                                                                <strong>Failed:</strong> {{ session()->get('failed') }}
                                                            </div>
                                                           @endif
                                                    </div>
                                                </div>

                                                <!--end col-md-8-->
                                               
                                                
                                            </div>
                                            
                                            <!--end row-->
                                            <div class="tabbable-line tabbable-custom-profile">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_11" data-toggle="tab"> Trade Information </a>
                                                    </li>
                                                    
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_11">
                                                        
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th> <i class="fa fa-briefcase"></i> Trade</th>
                                                                        <th> <i class="fa fa-briefcase"></i> Detail</th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td> 
                                                                             Crop
                                                                        </td>
                                                                        <td>
                                                                           {{ @$trade->crop_name}} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                             Quantity
                                                                        </td>
                                                                        <td>
                                                                           {{ @$trade->quantity}} Kg
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                             Area
                                                                        </td>
                                                                        <td>
                                                                            {{ @$trade->area}} Acre
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                             Accepected Rate
                                                                        </td>
                                                                        <td>
                                                                            {{ @$trade->accepected_rate}} Rs.
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                             Policy Type
                                                                        </td>
                                                                        <td>
                                                                            {{ @ucfirst($trade->policy_type) }} 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            Actual Price
                                                                        </td>
                                                                        <td>
                                                                            {{ @$trade->actual_price }} Rs.
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            Customer Name
                                                                        </td>
                                                                        <td>
                                                                            {{ @$trade->created_by_name }} 
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td> 
                                                                            Total Amount
                                                                        </td>
                                                                        <td>
                                                                            {{ @$trade->total_amount }} Rs.
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            Total Trading Amount
                                                                        </td>
                                                                        <td>
                                                                            {{ @$trade->total_trading_amount }} Rs.
                                                                        </td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td> 
                                                                            Bonus Amount
                                                                        </td>
                                                                        <td>
                                                                            {{ @$trade->bonus_amount }} Rs.
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            Number Of Installment
                                                                        </td>
                                                                        <td>
                                                                            {{ @$trade->installment_number }} 
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--tab-pane-->
                                                   
                                                    <!--tab-pane-->
                                                </div>
                                            </div>

                                            <div class="clear"></div>
                                            @if(count($trade->trade_details) > 0)

                                              <div class="tabbable-line tabbable-custom-profile" >
                                                  <ul class="nav nav-tabs">
                                                      <li class="active">
                                                          <a href="#tab_1_11" data-toggle="tab"> Trade Details </a>
                                                      </li>
                                                      
                                                  </ul>
                                                  <div class="tab-content">
                                                      <div class="tab-pane active" id="tab_1_11">
                                                          
                                                          <div class="portlet-body">
                                                              <table class="table table-striped table-bordered table-advance table-hover">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>Serial Number</th>
                                                                          <th>Quantity</th>
                                                                          <th>Amount</th>
                                                                          <th>Bonus Amount</th>
                                                                          <th>Next Trading Date</th>
                                                                          <th>Barcode</th>
                                                                          <th>Status</th>
                                                                      </tr>
                                                                      
                                                                  </thead>
                                                                    <tbody>
                                                                      @if(! count($trade->trade_details) > 0)
                                                                          <th>Trade Not Approved Yet</th>
                                                                      @endif
                                                                          @foreach($trade->trade_details as $trade_detail)
                                                                            <tr class="odd gradeX">
                                                                              <td>{{@$i+=1}}</td>
                                                                              <td>{{$trade_detail->quantity}} Kg</td>
                                                                              <td>{{$trade_detail->amount}} Rs</td>
                                                                              <td>{{$trade_detail->bonus_amount}} Rs</td>
                                                                              <td>{{$trade_detail->trading_date->format('d/m/Y') }}</td>
                                                                              <td>{{$trade_detail->barcode}}</td>

                                                                              @if($trade_detail->status_id == 0)
                                                                                   <td>Pending</td>
                                                                              @endif
                                                                              @if($trade_detail->status_id == 1)
                                                                                   <td>Received But Payment Not Done</td>
                                                                              @endif
                                                                              @if($trade_detail->status_id == 2)
                                                                                   <td>Payment Done</td>
                                                                              @endif
                                                                              @if($trade_detail->status_id == 3)
                                                                                   <td>Rejected</td>
                                                                              @endif
                                                                             
                                                                             
                                                                            </tr>
                                                                          @endforeach
                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                      </div>
                                                      <!--tab-pane-->
                                                     
                                                      <!--tab-pane-->
                                                  </div>
                                              </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- Attachment Modal -->
                    <div class="modal fade" id="edit-modal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" align="center"><b>Approve Trade</b></h4>
                          </div>
                          <div class="modal-body">
                            <form role="form" action="{{ route('admin.trade.approve') }}" method="POST">
                              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                              <div class="box-body">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">No. of Installment</label> 
                                  <input type="number" class="form-control" name="installment_number" placeholder="No. of Installment" id="installment_number">
                                
                                </div>
                                  <input type="hidden" class="form-control" name="trade_id"  id="trade_id1" value="{{$trade->id}}">
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                      <!-- /Attachment Modal -->


<script type="text/javascript">
    $(document).ready(function() {
      /**
       * for showing edit item popup
       */

      $(document).on('click', "#edit-item", function() {
        $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

        var options = {
          'backdrop': 'static'
        };
        $('#edit-modal').modal(options)
      })

      // on modal show
      $('#edit-modal').on('show.bs.modal', function() {
        var id = $("#trade_id").val(); 
        console.log(id);
       // $('#installment_number').val(id)


      })

      // on modal hide
      $('#edit-modal').on('hide.bs.modal', function() {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#edit-form").trigger("reset");
      })
    })
</script>
@endsection