 
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="app-content content">
	<div class="content-wrapper">
		<!--<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title"> طلبات سلة التسوق </h3>
				<div class="row breadcrumbs-top">
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('general.index')}}</a>
							</li>
							<li class="breadcrumb-item active">  طلبات سلة التسوق
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>-->
		<div class="content-body">
			<!-- DOM - jQuery events table -->
			<section id="dom">
				<div class="row">



					<div class="col-12">
						<div class="card">
							<!--<div class="card-header">
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
							</div>-->

							@include('dashboard.includes.alerts.success')
							@include('dashboard.includes.alerts.errors')
<div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
            <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            Company Name, Inc
             <br />

             invoice  Order #{{$order_details->id}}
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header --> 
          @isset($order_details)
         <div class="invoice-header">
            <div class="invoice-from">
               
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{$user_details->name}}</strong><br>
                  Phone:{{$user_details->mobile}}<br>
                   Email: {{$user_details->email}}<br>
                </address>
            </div>
            <div class="invoice-to">
                
               <address class="m-t-5 m-b-5"><strong class="text-inverse"></strong>
                   Date: {{$order_details->created_at}}<br>
                  {{$order_details->pincode}},{{$order_details->country}},{{$order_details->city}}<br>
                 {{$order_details->address}}<br>
                  
               </address>
            </div>
           <!-- <div class="invoice-date">
               <small>{{date('d-m-Y',strtotime($order_details->created_at))}}</small>
               <div class="date text-inverse m-t-5">August 3,2012</div>
               <div class="invoice-detail">
                  #0000123DSS<br>
                  Services Product
               </div>-->
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
           
				
               <table class="table table-invoice table-striped">
                  <thead>
                     <tr align="center">
                        
                        <th class="text-center" width="10%">Order #</th>
                        <th class="text-center" width="10%">Name</th>
                        
                        <th class="text-right" width="20%">price</th>
                        <th class="text-center" width="10%">Description</th>
                        <th class="text-center" width="10%">quantity</th>
                        <th class="text-center" width="10%">Sub Total</th>
                        
                     </tr>
                  </thead>
                  <tbody>
                   @php $total=0; @endphp
                  @foreach($order_details->orders_products as $pro_detail)
                     <tr>
                          <td class="text-center"> {{$pro_detail->id}} </td>
                        <td class="text-center"> {{$pro_detail->name}} </td>
                        <td class="text-center">  {{$pro_detail->price}} </td>
                        @php $sub_total=($pro_detail->price)*($pro_detail->quantity);
                        $total+=$sub_total;
                        @endphp
                        <td><span class="text-inverse"> size : {{$pro_detail->size}} </span><br>
                        
                           <small> Color :  {{$pro_detail->color}}<br />
                           
                            </small>
                        </td>
                        <td>
                            {{$pro_detail->quantity}}<br />
                        </td>
                        <td>
                          {{ $sub_total }} $<br />
                        </td>
                        
                     </tr>
                      
                       @endforeach
           <tr>  <td >Total:</td>
           <td colspan="4">{{--$total--}}{{$order_details->sub_total}} $</td>
                     </tr>
                     <tr>  <td colspan="1">coupon:</td>
                     <td colspan="4">{{$order_details->coupon_amount}} $</td>
                     </tr>
                     <tr>  <td  >shipping Charge:</td>
                     <td colspan="4">{{$order_details->shipping_charges}} $</td>
                     </tr>
                     <tr>  <td  > Vat (Tax){{$order_details->tax}}% :</td>
                     <td colspan="4">{{$order_details->tax_amount}}  $</td>
                     </tr>
                     <tr>  <th colspan="1">Grand Total:</th>
                     <td colspan="4">{{$order_details->grand_total}} $</td>
                     </tr>
                  </tbody>
               </table>
                 @endisset 
                
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>SUBTOTAL</small>
                        <span class="text-inverse">$4,500.00</span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-plus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>PAYPAL FEE (5.4%)</small>
                        <span class="text-inverse">$108.00</span>
                     </div>
                  </div>
               </div>
               <div class="invoice-price-right">
                  <small>TOTAL</small> <span class="f-w-600">$4508.00</span>
               </div>
            </div>
            <!-- end invoice-price -->
         </div>
         <!-- end invoice-content -->
         <!-- begin invoice-note -->
         <div class="invoice-note">
            * Make all cheques payable to [Your Company Name]<br>
            * Payment is due within 30 days<br>
            * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
         </div>
         <!-- end invoice-note -->
         <!-- begin invoice-footer -->
         <div class="invoice-footer">
            <p class="text-center m-b-5 f-w-600">
               THANK YOU FOR YOUR BUSINESS
            </p>
            <p class="text-center">
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
            </p>
         </div>
         <!-- end invoice-footer -->
      </div>
   </div>
							 
						</div>
					</div>
				</div> 
                
			</section>
		</div>
	</div>
</div>
<style>
body{
    margin-top:20px;
    background:#eee;
}

.invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}
 </style>
 