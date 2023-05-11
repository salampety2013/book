@extends('layouts.admin')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                            <li class="breadcrumb-item"><a href="{{route('admin.coupons')}}"> الاقسام
                                    الفرعية </a>
                            </li>
                            <li class="breadcrumb-item active"> إضافة قسم فرعى
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
                                <h4 class="card-title" id="basic-layout-form"> أضافة قسم فرعى </h4>
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
                                
                                
                                    <form class="form" action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf



                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> <!--بيانات القسم-->{{__('general.cat_info')}} </h4>
                                           
                                               



                                                 



                                          
                                            
                                            
                                                 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><!--Coupon Type-->{{--__('general.name_ar')--}}Coupon Option
                                                        </label>
                                                        <span>
                                                        <input type="radio" value="Automatic"   class="form-control" placeholder="  "  name="coupon_option" required>Automatic  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     <input type="radio"   value="Manuel" class="form-control" placeholder="  "  name="coupon_option" required>Manuel    
                                                     
                                                     
                                                     </span>   @error("coupon_option")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                 

 <div class="col-md-6" style="display:none" id="couponField">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><!-- ( AR ) اسم القسم-->{{__('general.name_ar')}}
                                                        </label>
                                                        <input type="text" id="coupon_code" class="form-control" placeholder="  " value="{{old('coupon_code')}}" name="coupon_code" required>
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
                                                    <select name="categories[]" class="select2 form-control"   multiple="multiple" required>
                                                  
                                                        <option value="" selected="" disabled=""><!--Select Category-->{{__('general.select')}}</option>
                                                        @if($subcategories && $subcategories -> count() > 0)
                                                        
                                                        
                                                             @foreach($subcategories as $subcategory)
                                                             
                                                              <?php  
															  
															//  $subcategory_array=array(explode(",",$coupon->categories_ids ));
				 

				 
                                                             ?>
                   <option  value="{{ $subcategory->id }}"    > {{ $subcategory->name_ar }}</option>
            <!-- <option  value="{{ $subcategory->id }}"  <?php /*?> @if( in_array($subcategory->id,$subcategory_array[count($subcategory_array)-1])) selected @endif<?php */?> > {{ $subcategory->name_ar }}</option>
                       -->                                     
                                                            
                                                            @endforeach
                                                        @endif
<!-- <option value="arabic"     {{-- isset($sizes) ? ($sizes->type == arabic ? 'selected' : '') :''--}} >arabic sizes</option>
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
                                                    <select name="users[]" class="select2 form-control" id="categories[]"  multiple="multiple" required>
                                                  
                                                        <option value="" selected="" disabled=""><!--Select Category-->{{__('general.select')}}</option>
                                                        @if($users && $users -> count() > 0)
                                                        
                                                        
                                                             @foreach($users as $user)
                                                             
                                                              <?php  
															  
															//  $subcategory_array=array(explode(",",$coupon->categories_ids ));
				 

				 
                                                             ?>
                   <option  value="{{ $subcategory->id }}"    > {{ $user->email }}</option>
            <!-- <option  value="{{ $user->id }}"  <?php /*?> @if( in_array($user->id,$user_array[count($user_array)-1])) selected @endif<?php */?> > {{ $user->name_ar }}</option>
                       -->                                     
                                                            
                                                            @endforeach
                                                        @endif
<!-- <option value="arabic"     {{-- isset($sizes) ? ($sizes->type == arabic ? 'selected' : '') :''--}} >arabic sizes</option>
-->                                                    </select>

                                                    @error("cat_id")
                                                    <span class="text-danger">{{$message }}</span>
                                                    @enderror

                                                </div>
                                            </div> 

                                            </div>
                                         </div>
                                         
                                         
                                         <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><!--Coupon Option-->{{--__('general.name_ar')--}}Coupon Type
                                                        </label>
                                                        <span>
                                                        <input type="radio" value="Multiple Times"   class="form-control" placeholder="  "  name="coupon_type" required>Multiple Times &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     <input type="radio"   value="Single Times" class="form-control" placeholder="  "  name="coupon_type" required>Single Times    
                                                     
                                                     
                                                     </span>   @error("coupon_option")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="projectinput1"><!--Coupon Option-->{{--__('general.name_ar')--}}Amount Type
                                                        </label>
                                                        <span>
                                                        <input type="radio" value="Percentage"   class="form-control" placeholder="  "  name="amount_type" required>Percentage  % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     <input type="radio"   value="Fixed" class="form-control" placeholder="  "  name="amount_type" required>Fixed   (In USD)
                                                     
                                                     
                                                     </span>   @error("coupon_option")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                         
                                         <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Expiry Date {{--__('general.code')--}}
                                                        </label>
                                                        <input   type="date" id="expiry_date" class="form-control" placeholder="  " value=" " name="expiry_date" required>
														
                                                        @error("expiry_date")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                               </div>
                                            
                                             
            
            <div class="col-md-6">

	    <div class="form-group">
			<h5>Product Discount Price <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="number" name="discount_price" class="form-control"  required="">
     @error('discount_price') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div>
            </div>
                                            
                                           
			 


			 
			
		 

                                         




   
                                        <div class="col-md-6">
                                            <div class="form-group mt-1">
                                                <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success" checked />
                                                <label for="switcheryColor4" class="card-title ml-1">الحالة </label>

                                                @error("is_active")
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
<script>
$('#select_id').on('change', function()
{
    alert(this.value); //or alert($(this).val());
});

</script>



<script>
    $('input:radio[name="type"]').change(
        function() {
            if (this.checked && this.value == '2') { // 1 if main cat - 2 if sub cat
                $('#cats_list').removeClass('hidden');

            } else {
                $('#cats_list').addClass('hidden');
            }
        });
</script>
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
	///////////////////////////////////End hide coupon field on click//////////
$('#cat_id').on('change', function()
{
   // alert(this.value); //or alert($(this).val());
         
       
          
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{ url('/products/ajax/')}}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
						//alert("yes");
                       var d =$('select[name="subcategory_id"]').empty();
					   $('select[name="subcategory_id"]').append('<option value="" disabled=""> Select SubCategory  </option>'); 
                      					     
					      $.each(data, function(key, value){
							 // alert("val="+value.id);
                             $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.name_ar + '</option>'); 
							   
                          }); 
                    },
                });
            } else {
                alert('danger');
            }
        });
 
    </script>
  
  
  
  
@stop