 @extends('layouts.admin')
@section('content')
    
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title"> الاقسام الرئيسية </h3>
				<div class="row breadcrumbs-top">
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('general.index')}}<!--الرئيسية--></a>
							</li>
							<li class="breadcrumb-item active"> coupons
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">
			<!-- DOM - jQuery events table -->
			<section id="dom">
				<div class="row">



					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">جميع كوبونات الخصم </h4>
								<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
										<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
										<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
										<li><a data-action="close"><i class="ft-x"></i></a></li>
									</ul>
								</div>
							</div>

							@include('dashboard.includes.alerts.success')
							@include('dashboard.includes.alerts.errors')

							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
									<form class="form" action="{{route('admin.coupons.delAll')}}" method="POST" enctype="multipart/form-data">
										@csrf

		 	<table class="table table-striped table-bordered display nowrap zero-configuration" style="width:100%;">
<!--<table id="example" class="  table-striped table-bordered display nowrap table-responsive zero-configuration " style="width:100%">--><!--<table class="table display nowrap table-striped table-bordered scroll-horizontal table-responsive">
	<table class="table table-striped table-bordered display nowrap zero-configuration"  cellspacing="0" cellpadding="0">
-->		 
									<thead class="">
												<tr>

													<th ># </th>
                                                    <th >{{--__('general.pic')--}}  ID</th>
													<th>الكود  code{{--__('general.name_ar')--}}</th>
													  
													<th >Coupon Type {{--__('general.main_cat')--}}</th>
                                                    <th > Amount{{--__('general.sub_cat')--}} </th>
 
 <th >{{--__('general.pic')--}}  Expiry Date</th>
  
 
 

													<th  >{{__('general.status')}}<!--الحالة--></th>
													
													<th >{{__('general.actions')}}<!--الإجراءات--></th>
													<th>
														<!-- <input type="submit"  style="margin-bottom: 10px" class="btn btn-danger" value="حذف " > -->
														<input type="image" src="{{asset('images/del.png')}}" alt="delete" width="50" height="50">
														<!--<input type="checkbox" id="select_all" />-->
													</th>
												</tr>
											</thead>
											<tbody>

												@isset($coupons)
												@foreach($coupons as $item)
												<tr>

													<td>{{$loop->index+1}}</td>
													<td>{{$item -> id}}</td>
													<td>
														 
														{{$item->coupon_code}}

													</td>
                                                    <td>
														 
														{{$item->coupon_type}}

													</td>
													<td>
														 
                                                    {{$item->amount}}
                                                    @if($item->amount_type=="percent")
                                                    %
                                                    @else
                                                    $
                                                    @endif
                                                    <td> 

														 
														 {{$item->expiry_date}} <br />

													  {{  date('d-m-Y', strtotime($item->expiry_date)) }}
                                                      <br />

											{{ Carbon\Carbon::parse($item->expiry_date)->format('d-m-Y his') }}
                                         @php 
                                            $date_now=\Carbon\Carbon::now();
                                             $expire_date = Carbon\Carbon::parse($item->expiry_date); // now expire_date is a carbon instance
                                             if($date_now < $expire_date){
                                             
                                            	$date = ($date_now->diff(\Carbon\Carbon::parse($item->expiry_date)));
                                              	$numberofDays =  $date->format('%a');
                                             }else{
                                              	$numberofDays = 0;
                                             }
                                           @endphp
                                           
                                            <br />
                                            
<br />
Days left: {{ $numberofDays }}<br />
 
<br />

 @php  
   $days = $expire_date->diffForHumans(\Carbon\Carbon::now());
  @endphp		
  {{$days}}											</td>
                                                     
													<td> 

														@if($item->status==1)
	 	<a href="{{ route('admin.coupons.deactivate',$item -> id)}}">
<?php /*?><a href="javascript:void(0);" class="updateStatus" id="coupon-{{$item -> id}}" data-updateStatus-id="{{$item -> id}}">
<?php */?>															<img style="width: 30px; height: 30px;" src="{{asset('images/ok_blue.png')}}" alt="اضغط لالغاء التفعيل" data-status="active"></a>
														@else
														<a href="{{ route('admin.coupons.activate',$item -> id)}}" alt="اضغط للتفعيل">
															<img style="width: 30px; height: 30px;" src="{{asset('images/del_blue.png')}}" alt="اضغط للتفعيل"></a>

														@endif
													</td>


													
													<td width="10%">
                                                    
 														<div class="btn-group" role="group" aria-label="Basic example">
														 
                                           
                                                               <a href="{{ route('admin.coupons.create_update',$item -> id)}}" class="btn btn-outline-info  mr-1 mb-1  box-shadow-3 " style="width:40px; height:40px;padding:10px 3px 3px 3px"  ><span class="icon-pencil  font-medium-4"></span></a><!--تعديل-->
                                                             <a href="{{ route('admin.coupons.delete',$item -> id)}}" class="btn btn-outline-info  mr-1 mb-1  box-shadow-3 " style="width:40px; height:40px ;padding:10px 3px 3px 3px"><span class="ft-trash-2 font-medium-4"><!--حذف--></span> </a>
															  
                                                             
                                                            


														</div>
													</td>
													<td align="center" width="5%">

														<input type="checkbox" class="class=" form-group"" name="ids[]" id="delAll" value="{{$item -> id}}">
													</td>
												</tr>
												@endforeach

												@endisset

											</tbody>
										</table>




									</form>
									<div class="justify-content-center d-flex">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 
                
			</section>
		</div>
	</div>
</div>
<script>

 $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
		
		
		
	$("#selectAll").click(function() {
		$("input[type=checkbox]").prop('checked', $(this).prop('checked'));

	});
	
		 $(document).on('click','.updateStatus',function(e){
			// e.preventDefault();
			  var qty = $(this).val();
			   var coupon_id = $(this).attr('data-coupon-id');
			//var cart_id = $(this).data('cart-id');
			  alert("ddd="+coupon_id);
			 
			   
                $.ajax({
					url:"{{ route('admin.coupons.deactivate.ajax')}}",
                    // url: "{{url('/cart/update/ajax')}}",
                    type:"POST",
					 dataType:"json",
					 data: {
                    'coupon_id':$(this).attr('data-coupon-id'),
					'status':$(this).childern(img).attr('status') ,
                 },
					 
                    
                    success:function(data) {
						
						  // alert("done" );
						  // $('#cart-content').html(data.view);
						   if($data.status==0){
							   
							   }else{
							  $('#coupon-'+coupon_id).html(' <img style="width: 30px; height: 30px;" src="{{asset('images/del_blue.png')}}" alt="اضغط للتفعيل">'); 
							  
							  $('#coupon-'+coupon_id).html('<img style="width: 30px; height: 30px;" src="{{asset('images/ok_blue.png')}}" alt="اضغط لالغاء التفعيل" data-status="deActive">'); 
							   }
						    
						 // window.location.reload();
                    },
                });
             
			
			
			}); 
</script>
@stop