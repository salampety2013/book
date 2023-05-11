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

                                        @include('dashboard.advertisments._forms',['button_label'=>'تعديل'])
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
