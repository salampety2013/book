@extends('layouts.admin')
@section('content')
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
-->
  <meta name="csrf-token" content="{{ csrf_token() }}" />>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.orders')}}">All shipping
                                     </a>
                            </li>
                            <li class="breadcrumb-item active"> Add shipping
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> Add shipping </h4>
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
                                <div class="card-body">
                                  
                    <form method="post" action="{{ route('admin.orders.add_edit_shipping' , $order_shipping->id) }}"  enctype="multipart/form-data">
                           
                          <input name="id" value="{{$order_shipping -> id}}" type="hidden">
                   
                    
                       
                                
                                   
                                        @csrf



                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> <!--بيانات القسم-->بيانات الشحن{{--__('general.cat_info')--}} </h4>
                                           
                                               
                                                  

									 <div class="col-md-6"     >
                                                    <div class="form-group">
                                                        <label for="projectinput1">Couurier Name / شركة الشحن<!-- ( AR ) اسم القسم-->{{--__('general.name_ar')--}}<br />
 
                                                        </label>
                                                        <input type="text"   class="form-control" placeholder="  " value=" {{ isset($order_shipping) ? $order_shipping->courier_name : old('courier_name') }} " name="courier_name" >
                                                        @error("courier_name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-6"     >
                                                    <div class="form-group">
                                                        <label for="projectinput1">Tracking Number  <!-- ( AR ) اسم القسم-->{{--__('general.name_ar')--}}
                                                        </label>
                                                        <input type="text"  class="form-control" placeholder="  " value=" {{ isset($order_shipping) ? $order_shipping->tracking_number : old('tracking_number') }} " name="tracking_number" >
                                                        @error("tracking_number")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

    
                                        </div>
                                        
                                        


                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>

@stop

@section('script')
 



<!--<script>
    $('input:radio[name="type"]').change(
        function() {
            if (this.checked && this.value == '2') { // 1 if main cat - 2 if sub cat
                $('#cats_list').removeClass('hidden');

            } else {
                $('#cats_list').addClass('hidden');
            }
        });
</script>

<script>
	$(document).ready(function(){
$("#txtFromDate").datepicker({
     minDate: '0',
    onSelect: function(selected) {
      $("#txtToDate").datepicker("option","minDate", selected)
    }
});
$("#txtToDate").datepicker({
     minDate: '0',
    onSelect: function(selected) {
       $("#txtFromDate").datepicker("option","maxDate", selected)
    }
});  
});
 </script>-->
 
 
 
<script type="text/javascript">
            $(function () {
                $("#expiry_date").datepicker({ 
                    dateFormat: 'dd/mm/yy' 
                });
            });
        </script>

<script type="text/javascript">

     /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });*/ 
	
	
	/////////////////show hide coupon field on click ///////////////
	$('#automatic').on('click', function()
{$('#couponField').hide();
	
 
});
$('#manuel').on('click', function()
{$('#couponField').show();
	 
});
	///////////////////////////////////End hide amountField on click//////////
	
	 
	

    </script>
  
  
  
  
@stop