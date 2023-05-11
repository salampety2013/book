@extends('layouts.admin')
@section('content')

  <meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الفرعية </a>
                            </li>
                            <li class="breadcrumb-item"><a href=""> الاقسام الفرعية </a>
                            </li>
                            <li class="breadcrumb-item active"> تعديل - {{$advertisment -> name_ar}}
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
                                <h4 class="card-title" id="basic-layout-form"> تعديل - {{$advertisment -> name_ar}} </h4>
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
                                    <form class="form" action="{{route('admin.advertisments.update',$advertisment -> id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input name="id" value="{{$advertisment -> id}}" type="hidden">

                                        <div class="form-group">
                                            <div class="text-center">

                                            </div>
                                        </div>
<?php /*?>value="{{$advertisment ->name_ar}}"
<?php */?>



                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> <!--بيانات القسم-->{{__('general.cat_info')}} </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><!-- ( AR ) اسم القسم-->{{__('general.name_ar')}}
                                                        </label>
                                                        <input type="text" id="name_ar" class="form-control" placeholder="  " value="{{$advertisment -> name_ar}}" name="name_ar" required>
                                                        @error("name_ar")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><!-- (EN ) اسم القسم-->{{__('general.name_en')}}
                                                        </label>
                                                        <input type="text" id="name_en" class="form-control" placeholder="  "  value="{{$advertisment -> name_en}}"  name="name_en" required>
                                                        @error("name_en")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>
<div class="col-md-6">

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
                                                             <option value="{{ $category->id }}" @if( $category->id==$advertisment->cat_id) selected @endif>{{ $category->name_ar }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>

                                                    @error("cat_id")
                                                    <span class="text-danger">{{$message }}</span>
                                                    @enderror

                                                </div>
                                            </div>




                                         <div class="row">
                                         <div class="col-md-3">

	    <div class="form-group">
			<h5>advertisment Quantity <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="number" name="total_quantity" class="form-control" value="{{$advertisment -> total_quantity}}" step="1" min="1" required="">
     @error('total_quantity')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>

			</div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{__('general.code')}}
                                                        </label>
                                                        <input type="text" id="code" class="form-control" placeholder="  " value="{{$advertisment->code}}" name="code" required>
                                                        @error("code")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                               </div>

                                            <div class="col-md-3">

				<div class="form-group">
			<h5>advertisment Selling Price <span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="number" name="price" class="form-control" value="{{$advertisment -> price}}" required="">
     @error('price')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>

			</div>

            <div class="col-md-3">

	    <div class="form-group">
			<h5>advertisment Discount Price <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="number" name="discount_price" class="form-control"  value="{{$advertisment -> discount_price}}"  required="">
     @error('discount_price')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>

			</div>
            </div>

              <!-------------------------date-------------------------------->
  @if(isset($advertisment -> flash_sale)&& $advertisment -> flash_sale == "flash_sale")

           <div class="row"> <!-- start 8th row  -->
			<div class="col-md-6">

	    <div class="form-group">
			<h5> Start Date  <span class="text-danger">*</span></h5>
			<div class="controls">
<!--   <input   type="datetime-local" />-->
 <input   type="date" id="start_date" class="form-control"   name="start_date"     value="{{$advertisment->start_date}}"
        min="2022-01-01" max="2050-12-31" required>{{--$advertisment->start_date--}}




								   	 <!--	  <input type="text" id="txtStartDate" name="start_date" class="start_date" />
-->			</div>

			</div> <!-- end col md 6 -->
  </div>


        <div class="col-md-6">

	    <div class="form-group">
			<h5>End Date<span class="text-danger">*</span></h5>
			<div class="controls">

         <input   type="date" id="end_date" class="form-control"   name="end_date"  placeholder="{{$advertisment->end_date}}"  value="{{$advertisment->end_date}}"
        min="2022-01-01" max="2050-12-31" required>
 								 {{$advertisment->end_date}}<br />




								   	 <!--	  <input type="text" id="txtStartDate" name="start_date" class="start_date" />
-->			</div>

			</div> <!-- end col md 6 -->
  </div>
        </div>

        	@endif

 	<!---------------------------------end date------------------------>





                                           <div class="row"> <!-- start 8th row  -->
			<div class="col-md-6">

	    <div class="form-group">
			<h5>Long Description AR <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="details_ar" rows="10" cols="80" required="">
		 {{$advertisment -> details_ar}}
						</textarea>
	 		 </div>
		</div>

			</div> <!-- end col md 6 -->

			<div class="col-md-6">

	     <div class="form-group">
			<h5>Long Description English <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor2" name="details_en" rows="10" cols="80">
		 {{$advertisment -> details_en}}
						</textarea>
	 		 </div>
		</div>


			</div> <!-- end col md 6 -->

		</div>
			  <div class="col-md-6">
<div class="form-group">
                                                    <label> صوره الاعلان الرئيسية </label>
                                                    <img src="{{asset('assets/images/advertisments/'.$advertisment->img)}}" class="rounded-circle  height-150" alt="صورة القسم  ">
                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="file" name="img">
                                                        <span class="file-custom"></span>
                                                    </label>
                                                    @error('img')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>




</div>




  <div class="col-md-12">
 												 @isset($advertisment -> images)
                                                <h4 class="form-section"><i class="ft-home"></i> صور الاعلان </h4>
                                                <div class="form-group">
                                                     <!--style="width: 18rem;"-->
                                                     <div class="row">


                                                        @foreach($advertisment -> images as $image)

                                                     <div class="card col-md-2  mr-1"   align="center"  style="width: 18rem;border: 2px solid #eeeeee">

   {{--    @if( file_exists(realpath('assets/images/advertisments/'.$image->img)))--}}



													{{--	<img class="card-img-top"   alt="Card image cap" src="{{asset('assets/images/advertisments/'.$image->img)}}">--}}
													<img class="card-img-top"   alt="Card image cap" src="{{$image->img}}" >
														{{--@else--}}
														{{--<img class="card-img-top"   alt="Card image cap" src="{{asset('images/noimage.png')}}">

														{{--@endif--}}
   <div class="card-body">
   <!-- <h5 class="card-title">Card title{{$image->img}}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
-->     <a href="{{ route('admin.advertisments.deleteIimage',$image -> id)}}" class="btn btn-outline-danger  mr-1 mb-1  box-shadow-1 " style="width:40px; height:40px ;padding:10px 3px 3px 3px"><span class="ft-trash-2 font-medium-4"><!--حذف--></span> </a>

  </div>
</div>
                                                      @endforeach
                                                    @endisset
                                                     </div>

                                                </div>


                                            </div>


                                            <div class="col-md-12">

                                                <h4 class="form-section"><i class="ft-home"></i> رفع صور جديدة للاعلان   </h4>
                                                <div class="form-group">
                                                    <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                        <div class="dz-message">يمكنك رفع اكثر من صوره هنا</div>
                                                    </div>
                                                    <br><br>
                                                </div>


                                            </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-1">
                                                <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success" @if($advertisment -> is_active == 1)checked @endif />
                                                <label for="switcheryColor4" class="card-title ml-1">الحالة </label>

                                                @error("is_active")
                                                <span class="text-danger">{{$message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group mt-1">
                                                <input type="checkbox" value="1" name="has_Variants" id="switcheryColor4" class="switchery" data-color="success"    @if($advertisment -> has_Variants == 1)checked @endif  />
                                                <label for="switcheryColor4" class="card-title ml-1">هل المنتج له مقاسات والوان </label>

                                                @error("has_Variants")
                                                <span class="text-danger">{{$message }}</span>
                                                @enderror
                                            </div>
                                        </div>




<div class="row">

<div class="col-md-6">
			<div class="form-group">

		<div class="controls">
         @if(isset($advertisment -> flash_sale)&& $advertisment -> flash_sale == "flash_sale")

			<fieldset>
				<input type="checkbox" id="checkbox_2" name="flash_sale" value="flash_sale" checked>
				<label for="checkbox_2">Hot Deals</label>
			</fieldset>@endif
			<fieldset>
				<input type="checkbox" id="checkbox_3" name="new_arrival"  @if($advertisment -> new_arrival == "new_arrival")checked @endif value="new_arrival">
				<label for="checkbox_3">New Arrival</label>
			</fieldset>

		</div>
	</div>
</div>



<div class="col-md-6">
	<div class="form-group">

		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_4" name="new_trends" value="new_trends"  @if($advertisment -> new_trends == "new_trends")checked @endif />
				<label for="checkbox_4">  Trending Now</label>
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
                    url: "{{ url('admin/advertisments/ajax/')}}/"+category_id,
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
                url: "{{ route('admin.advertisments.images.store') }}", // Set the url
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
						url: "{{ route('admin.advertisments.images.delete') }}",


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

    @stop
