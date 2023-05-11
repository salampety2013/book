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
                            <li class="breadcrumb-item"><a href="{{route('admin.subcategories')}}"> الاقسام
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><!-- ( AR ) اسم القسم-->{{__('general.name_ar')}}
                                                        </label>
                                                        <input type="text" id="name_ar" class="form-control" placeholder="  " value="{{old('name_ar')}}" name="name_ar" required>
                                                        @error("name_ar")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><!-- (EN ) اسم القسم-->{{__('general.name_en')}}
                                                        </label>
                                                        <input type="text" id="name_en" class="form-control" placeholder="  " value="{{old('name_en')}}" name="name_en" required>
                                                        @error("name_en")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>


                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-1">
                                                    <label for="projectinput1">
                                                       <!-- القسم رئيسي-->  {{__('general.main_cat')}}
                                                    </label>
                                                    <!-- <select name="cat_id" class="select2 js-example-programmatic form-control"> -->
                                                    <select name="cat_id" class="form-control" id="cat_id" required>
                                                  
                                                        <option value="" selected="" disabled=""><!--Select Category-->{{__('general.select')}}</option>
                                                        @if($categories && $categories -> count() > 0)
                                                             @foreach($categories as $category)
                                                             <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>

                                                    @error("cat_id")
                                                    <span class="text-danger">{{$message }}</span>
                                                    @enderror

                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group mt-1">
                                                    <label for="projectinput1">
                                                       <!-- القسم الفرعى--> {{__('general.sub_cat')}}
                                                    </label>
                                                    <!-- <select name="cat_id" class="select2 js-example-programmatic form-control"> -->
                                                    <select name="subcategory_id" class="select2 form-control" id="subcategory_id">
                                                    <!-- <select name="sub_cat_id" class="select2 form-control" id="sub_cat_id"> -->
                                                        <option value="" selected="" disabled="">{{__('general.select')}}<!--Select subcategories--></option>
                                                        
                                                             

                                                    </select>

                                                    @error("subcategory_id")
                                                    <span class="text-danger">{{$message }}</span>
                                                    @enderror

                                                </div>
                                            </div>

                                            </div>
                                         </div>
                                         
                                         <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{__('general.code')}}
                                                        </label>
                                                        <input type="text" id="code" class="form-control" placeholder="  " value="{{old('code')}}" name="code" required>
                                                        @error("code")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                               </div>
                                            
                                            <div class="col-md-4">

				<div class="form-group">
			<h5>Product Selling Price <span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="number" name="price" class="form-control" required="">
     @error('price') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
				
			</div>
            
            <div class="col-md-4">

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
                                            
                                           <div class="row"> <!-- start 8th row  -->
			<div class="col-md-6">

	    <div class="form-group">
			<h5>Long Description AR <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="details_ar" rows="10" cols="80" required="">
		Long Description 
						</textarea>  
	 		 </div>
		</div>
				
			</div> <!-- end col md 6 -->

			<div class="col-md-6">

	     <div class="form-group">
			<h5>Long Description English <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor2" name="details_en" rows="10" cols="80">
		Long Description English
						</textarea>       
	 		 </div>
		</div>
				 
				
			</div> <!-- end col md 6 -->		 
			
		</div>
			 


			 
			
		 

                                        <div class="form-group">
                                            <label> صوره القسم </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="img" name="img">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('img')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>




  <div class="col-md-12">

                                                <h4 class="form-section"><i class="ft-home"></i> صور المنتج </h4>
                                                <div class="form-group">
                                                    <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                        <div class="dz-message">يمكنك رفع اكثر من صوره هنا</div>
                                                    </div>
                                                    <br><br>
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
                                        
                                        
<div class="row">

<div class="col-md-6">
			<div class="form-group">
			 
		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
				<label for="checkbox_2">Hot Deals</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_3" name="featured" value="1">
				<label for="checkbox_3">Featured</label>
			</fieldset>
		</div>
	</div>
</div>



<div class="col-md-6">
	<div class="form-group">
		 
		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_4" name="special_offer" value="1">
				<label for="checkbox_4">Special Offer</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_5" name="special_deals" value="1">
				<label for="checkbox_5">Special Deals</label>
			</fieldset>
		</div>
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
<script>
$('#select_id').on('change', function()
{
    alert(this.value); //or alert($(this).val());
});

</script>



<!--<script>

             var uploadedDocumentMap = {}
            Dropzone.options.dpzMultipleFiles = {
                paramName: "dzfile", // The name that will be used to transfer the file
                //autoProcessQueue: false,
                maxFilesize: 5, // MB
                clickable: true,
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
                dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
                dictCancelUpload: "الغاء الرفع ",
                dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
                dictRemoveFile: "حذف الصوره",
                dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
                headers: {
                    'X-CSRF-TOKEN':
                        "{{ csrf_token() }}"
                }

                ,
                url: "{{ route('admin.products.images.store') }}", // Set the url
                success:
                    function (file, response) {
                        $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    }
                ,
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedDocumentMap[file.name]
                    }
					
                    $('form').find('input[name="document[]"][value="' + name + '"]').remove()
                }
                ,
                // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
                init: function () {

                        @if(isset($event) && $event->document)
                    var files ={!! json_encode($event->document) !!}
                        for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                    @endif
                }
            }



    </script>-->
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

     /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });*/
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
  <!-- // CK EDITOR  --> 
  <script src="{{ asset('assets/admin/vendors/js/editors/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('assets/admin/vendors/js/editors/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
  <script src="{{ asset('assets/admin/vendors/js/editors/editor.js') }}"></script>
  
  
  
  
 <script>

             var uploadedDocumentMap = {}
            Dropzone.options.dpzMultipleFiles = {
                paramName: "dzfile", // The name that will be used to transfer the file
                //autoProcessQueue: false,
                maxFilesize: 5, // MB
                clickable: true,
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
                dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
                dictCancelUpload: "الغاء الرفع ",
                dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
                dictRemoveFile: "حذف الصوره",
                dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
                headers: {
                    'X-CSRF-TOKEN':
                        "{{ csrf_token() }}"
                }

                ,
                url: "{{ route('admin.products.images.store') }}", // Set the url
                success:
                    function (file, response) {
                        $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    }
                ,
                removedfile: function (file) {
                  
				    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name  
						
                    } else {
                        name = uploadedDocumentMap[file.name]
                    }
					
					$.ajax({
						headers: {
							  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							  },
						type: 'POST',
						url: "{{ route('admin.products.images.delete') }}",
						
						
						data: {filename: name},
						success: function (data){ 
						$('form').find('input[name="document[]"][value="' + data.name + '"]').remove()
                          console.log("File has been successfully removed!!");
							alert(data.success +" File has been successfully removed!");
						},
						error: function(e) {
							console.log(e);
						}});
					
                   
					
                }
                ,
                // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
                init: function () {

                        @if(isset($event) && $event->document)
                    var files ={!! json_encode($event->document) !!}
                        for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                    @endif
                }
            }
    </script> 
<!--https://appdividend.com/2018/05/31/laravel-dropzone-image-upload-tutorial-with-example/   gooood 
https://www.webslesson.info/2020/04/drag-and-drop-multiple-file-upload-in-laravel-7-using-dropzonejs.html
https://www.tech-prastish.com/blog/implement-dropzone-in-laravel/     شرح مثال مشابه
https://laraveldaily.com/multiple-file-upload-with-dropzone-js-and-laravel-medialibrary-package/
-->
@stop