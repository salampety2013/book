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
                            <li class="breadcrumb-item"><a href="{{route('admin.coupons')}}">All Coupons
                                     </a>
                            </li>
                            <li class="breadcrumb-item active"> Add Coupon
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
                                <h4 class="card-title" id="basic-layout-form"> Add Coupon </h4>
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
                                  @if(isset($coupons))
                    <form method="get" action="{{ route('admin.coupons.add_edit_coupon' , $coupons->id) }}"  enctype="multipart/form-data">
                           
                          <input name="id" value="{{$coupons -> id}}" type="hidden">
                    @else
 <form class="form" action="{{route('admin.coupons.add_edit_coupon')}}" method="POST" enctype="multipart/form-data">                     
                    @endif
                       
                                
                                   
                                        @csrf



                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> <!--بيانات القسم-->{{__('general.cat_info')}} </h4>
                                           
                                               



                                                 



                                          
                                            
                                            
                                                 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><!--Coupon Type-->{{--__('general.name_ar')--}}Coupon Option
                                                        </label>
                                                        <span>
 <input type="radio" value="Automatic" id="automatic"  class="form-control" placeholder="  "  name="coupon_option"  {{isset($coupons) ? (($coupons->coupon_option == "Automatic") ? 'checked' : '') :'checked'}}   required>Automatic  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     <input type="radio" id="manuel"  value="Manuel" class="form-control" placeholder="  "  name="coupon_option"  {{ isset($coupons) ? ($coupons->coupon_option == "Manuel" ? 'checked' : '') :''}}   required>Manuel    
                                                     
                                                     
                                                     </span>   @error("coupon_option")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                 

 <div class="col-md-6"   style="display:{{ isset($coupons) ? ($coupons->coupon_option == "Manuel" ? 'block' : 'none') :'none'}}" id="couponField">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><!-- ( AR ) اسم القسم-->{{__('general.name_ar')}}
                                                        </label>
                                                        <input type="text" id="coupon_code" class="form-control" placeholder="  " value=" {{ isset($coupons) ? $coupons->coupon_code : old('coupon_code') }} " name="coupon_code" >
                                                        @error("coupon_code")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            

                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-1">
                                                    <label for="projectinput1">
                                                        القسم <!--رئيسي-->  {{--__('general.cats')--}}
                                                    </label>
                                                    <!-- <select name="cat_id" class="select2 js-example-programmatic form-control"> -->
                                                    <select name="categories_ids[]" class="select2 form-control"   multiple="multiple" required>
                                                  
                                                        <option value="" selected="" disabled=""><!--Select Category-->{{__('general.select')}}</option>
                                                        @if($subcategories && $subcategories -> count() > 0)
                                                        
                                                        
                                                             @foreach($subcategories as $subcategory)
                                                             
                                                              <?php  
															  
															//  $subcategory_array=array(explode(",",$coupon->categories_ids ));
				 

				 
                                                             ?>
                   <?php /*?><option  value="{{ $subcategory->id }}"    > {{ $subcategory->name_ar }}</option><?php */?>
            <option  value="{{ $subcategory->id }}"   @if( in_array($subcategory->id,$selcted_subcategories)) selected @endif > {{ $subcategory->name_ar }}</option>
                                                           
                                                            
                                                            @endforeach
                                                        @endif
<!-- <option value="arabic"     {{-- isset($coupons) ? ($coupons->type == arabic ? 'selected' : '') :''--}} >arabic coupons</option>
-->                                                    </select>

                                                    @error("cat_id")
                                                    <span class="text-danger">{{$message }}</span>
                                                    @enderror

                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group mt-1">
                                                    <label for="projectinput1">
                                                       <!-- القسم رئيسي-->  الاعضاء{{--__('general.sub_cat')--}}
                                                    </label>
                                                    <!-- <select name="cat_id" class="select2 js-example-programmatic form-control"> -->
                                                    <select name="users_ids[]" class="select2 form-control" id="categories[]"  multiple="multiple" required>
                                                  
                                                        <option value="" selected="" disabled=""><!--Select Category-->{{__('general.select')}}</option>
                                                        @if($users && $users -> count() > 0)
                                                        
                                                        
                                                             @foreach($users as $user)
                                                             
                                                              <?php  
															  
															//  $subcategory_array=array(explode(",",$coupon->categories_ids ));
				 

				 
                                                             ?>
                  <?php /*?> <option  value="{{ $user->email }}"    > {{ $user->email }}</option><?php */?>
             <option  value="{{ $user->email }}"  @if( in_array($user->email,$selcted_users)) selected @endif > {{ $user->email }}</option>
                                                            
                                                            
                                                            @endforeach
                                                        @endif
<!-- <option value="arabic"     {{-- isset($coupons) ? ($coupons->type == arabic ? 'selected' : '') :''--}} >arabic coupons</option>
-->                                                    </select>

                                                    @error("cat_id")
                                                    <span class="text-danger">{{$message }}</span>
                                                    @enderror

                                                </div>
                                            </div> 

                                            </div>
                                         </div>
                                         <div class="row">
                                         
                                         <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><!--Coupon Option-->{{--__('general.name_ar')--}}Coupon Type
                                                        </label>
           <input type="radio" {{isset($coupons)? ($coupons-> coupon_type=="Single Times" ? 'checked' :'')  :'checked'}}  value="Single Times" class="form-control" placeholder="  "  name="coupon_type" required> Single Times    
                                      
                                                        <input type="radio" value="Multiple Times"   class="form-control" placeholder="  "  name="coupon_type" {{isset($coupons)? ($coupons-> coupon_type=="Multiple Times" ? 'checked' :'')  :''}}   > <label  >Multiple Times</label>
                                                        
                                                          
                                     
                                                     
                                                  
                                                     
                                                        @error("coupon_option")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                
                                                </div>
                                                 <div class="col-md-6">
                                         <div class="form-group">
                                                        <label for="projectinput1"><!--Coupon Option-->{{--__('general.name_ar')--}}Amount Type
                                                        </label>
                                                        <span>
                                                        <input type="radio" value="Percentage"   class="form-control" placeholder="  "  name="amount_type"  {{isset($coupons)? ($coupons-> amount_type=="Percentage" ? 'checked' :'')  :'checked'}} >Percentage  % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     <input type="radio"     value="Fixed" class="form-control" placeholder="  "  name="amount_type" {{isset($coupons)? ($coupons-> amount_type=="Fixed" ? 'checked' :'')  :''}}>Fixed   (In USD)
                                                     
                                                     
                                                     </span>   @error("coupon_option")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    </div></div>
                                         <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Expiry Date {{--__('general.code')--}}
                                                        </label>
                                                        
                                                        
                                                        <input   type="date" id="expiry_date" class="form-control"   name="expiry_date"  placeholder="dd-mm-yyyy"  value="{{isset($coupons) ? $coupons->expiry_date :  old('expiry_date') }}" 
        min="2022-01-01" max="2050-12-31" required>
        
														
                                                        @error("expiry_date")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                               </div>
                                            
                                             
            
            <div class="col-md-6"  >

	    <div class="form-group">
			<h5>Amount Value <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="number" name="amount"  value="{{isset($coupons) ? $coupons->amount : ''}}"   class="form-control" required  >
     
      @error('amount') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div>
            </div>
                                            
   
                                        <div class="col-md-6">
                                            <div class="form-group mt-1">
                                             
                                                <input   type="checkbox" value="1" name="status" id="switcheryColor4" class="switchery" data-color="success"   {{  isset($coupons)  ? ($coupons->status == 1 ? 'checked' : ''   ) :'checked' }}
                                                 />
                                                <label for="switcheryColor4" class="card-title ml-1">الحالة </label> 

                                                @error("status")
                                                <span class="text-danger">{{$message }}</span>
                                                @enderror
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