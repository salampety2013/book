 @extends('layouts.admin')
@section('content')
 
 <div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title"> طلبات سلة التسوق </h3>
				<div class="row breadcrumbs-top">
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('general.index')}}<!--الرئيسية--></a>
							</li>
							<li class="breadcrumb-item active">  طلبات سلة التسوق
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
								<h4 class="card-title">عرض  طلبات سلة التسوق</h4>
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
                            
								<div class="card-body card-dashboard  table-responsive">
                                
                                

                                
                                
									<form class="form" action= {{route('admin.orders.updateStatus')}}  method="POST" enctype="multipart/form-data">
										@csrf
                                          <div class="mt-5">
         <a href="{{--route('student.export') --}}" class="btn btn-primary">
             Export Data
        </a>
        <a href="{{-- route('student.create') --}}" class="btn btn-primary">
            Add Data
         </a>
    </div>
<div class="justify-content-right d-flex">
<a href="{{route('admin.orders.fileExport','xlsx')}}" class="btn btn-info  mr-2 mb-2  box-shadow-3 "  > Export Excel </a>
<a href="{{route('admin.orders.fileExport','csv')}}" class="btn btn-info  mr-2 mb-2  box-shadow-3 "  > Export CSV </a>
									  
                                    </div>

		 	<!--<table class="table table-striped table-bordered display nowrap zero-configuration" style="width:100%;">-->
<table id="example" class="  table-striped table-bordered    zero-configuration " style="width:100%"><!--<table class="table display nowrap table-striped table-bordered scroll-horizontal table-responsive">
	<table class="table table-striped table-bordered display nowrap zero-configuration"  cellspacing="0" cellpadding="0">
-->		 
 <thead class="">
 <tr>

  
 <th><!--الإسم (AR)-->{{--__('general.name_ar')--}}#  رقم </th>
 <th><!--الإسم (AR)-->{{--__('general.name_ar')--}} اسم العميل</th>
  <th><!--الإسم (AR)-->{{--__('general.name_ar')--}}   المنتجات</th>
  <th><!--الإسم (AR)-->{{--__('general.name_ar')--}}  طريقة الدفع </th>
  <th><!--الإسم (AR)-->{{--__('general.name_ar')--}}   التاريخ</th>
    <th><!--الإسم (AR)-->{{--__('general.name_ar')--}}   الأجمالى</th>
 
    <th><!--الإسم (AR)-->{{--__('general.currency_code')--}}   العملة</th>

  <th  >{{__('general.status')}}<!--الحالة--></th>
   <th  >التفاصيل</th>
   <th  >Add Shipping Code</th>
   
<th >{{__('general.actions')}}<!--الإجراءات--></th>
	<th>
														 
														<!--<input type="image" src="{{asset('images/del.png')}}" alt="delete" width="50" height="50">-->
														<!--<input type="checkbox" id="select_all" />-->
 <select name="order_status">
 <option value="New">New</option>

<option value="pendding">pendding</option>
<option value="Hold">Hold</option>
<option value="Canceled">Canceled</option>
<option value="In Process">In Process</option>
<option value="Paid"> Paid</option>
<option value="Shipped"> Shipped</option>
 <option value="Delivered">Delivered</option>
</select>
<input type="submit"  style="margin-bottom: 10px" class="btn btn-info" value="تعديل " >
 </th>

												</tr>
											</thead>
											<tbody>

												@isset($orders)
												@foreach($orders as $order)
												<tr align="center">

													<!--<td>{{--$loop->index+1--}}</td>-->
													

													<td>  
  {{$order->id}}
       </td>
       <td>  
  {{$order->full_name}}
       </td>
       
      <td>
          @foreach(  $order->orders_products as $pro_detail)
          
           
          {{$pro_detail->name}}<br />
			quantity: {{$pro_detail->quantity}}<br />

          @endforeach 
      </td>
                                                                   
            

     
      
        <td>    {{$order->pay_type}}</td>                                                               
                                                                
                                                           
                                                                   
    <td>
           
         {{date('d-m-Y',strtotime($order->created_at))}}     </td>
            
      
        <td>  {{$order->grand_total}}{{$order->currency_symbol}}     </td>
           <td>    {{$order-> currency_code}}</td>       
                          <td>
           @php
        if($order->order_status== "New"){
       $class="badge badge-warning";
        
        } elseif($order->order_status== "pendding"){
         $class="badge badge-info";
         } elseif($order->order_status== "Hold"){
         $class="badge badge-danger";
        
        } elseif($order->order_status== "Canceled"){
         $class="badge badge-danger";
         
        } elseif($order->order_status== "In Process"){
         $class="badge badge-info";
        
       } elseif($order->order_status== "shipped"){
         $class="badge badge-dark";
         
        }elseif($order->order_status== "Delivered"){
         $class="badge badge-success";
     } else{
         $class="badge badge-dark";
         
     }
 @endphp
        <span class="{{$class}}">{{$order->order_status}} </span><br />

          
      </td>
        
          <td>    <a href="{{route('admin.orders.viewOrderDetails',$order->id)}}" type="button"  > view  
                                    </a>                                </td> 
                                    
            <td>    <a href="{{route('admin.orders.edit_shipping',$order->id)}}" type="button"  >
            @if($order->courier_name=="" && $order->tracking_number=="" )
             Add Shipping  
             @else 
             Edit
             @endif
                                    </a>   <br />
                                   {{ $order->courier_name ."---".
$order->tracking_number}}<br />

                                                                 </td> 
                                    
           
                                    
                                                                
													<td width="10%">
                                                    
 														<div class="btn-group" role="group" aria-label="Basic example">
														 
                                                            
<!--    <a href="{{-- route('admin.orders.edit',$order -> id)--}}" class="btn btn-outline-info  mr-1 mb-1  box-shadow-3 " style="width:40px; height:40px;padding:10px 3px 3px 3px"><span class="icon-pencil  font-medium-4"></span>تعديل</a>
-->                                                             <a href="{{  route('admin.orders.delete',$order ->id) }}" class="btn btn-outline-info  mr-1 mb-1  box-shadow-3 " style="width:40px; height:40px ;padding:10px 3px 3px 3px"><span class="ft-trash-2 font-medium-4"><!--حذف--></span> </a>
															   {{--route('admin.orders.viewOrderDetails',['id'=>$order->id,'type'=>'print'])--}}
 @if($order->order_status=="Shipped" || $order->order_status=="Delivered")
<!--     <a href="javascript:;" onclick="window.open({{--route('admin.orders')--}}, '_blank');"       type="button"  > 
-->          <a href=" {{route('admin.orders.viewOrderDetails',['id'=>$order->id,'type'=>'print'])}}" target="_new"       type="button"  > 

    print  
    
                                    </a>  &nbsp;  &nbsp;  &nbsp;  
        <a href=" {{route('admin.orders.PDFOrderDetails',$order->id)}}" target="_new"       type="button"  > 

    PDF   </a>
    <a href=" {{route('admin.orders.sendEmail',$order->id)}}"       type="button"  > 

    send Email 
                                    </a>
                                    
                                   <!-- <a href="{{--route('admin.orders.fileExport',1)--}}"         > 

     export
                                    </a>-->                                                    
@endif
														
                                                        
                                                        </div>
													</td>
													<td align="center" width="5%">

														<input type="checkbox"  class=" form-group"  name="ids[]" id="delAll" value="{{$order -> id}}">
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
	$("#selectAll").click(function() {
		$("input[type=checkbox]").prop('checked', $(this).prop('checked'));

	});
</script>
@stop