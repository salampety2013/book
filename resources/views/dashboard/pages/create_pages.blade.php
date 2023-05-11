@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.pages')}}">  
                                      الصفحات المتغيرة </a>
                            </li>
                            <li class="breadcrumb-item active"> إضافة  صفحة متغيرة
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة  صفحة متغيرة</h4>
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
                                    <form class="form" action="{{route('admin.pages.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf



                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i>   </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> ( AR )  العنوان  
                                                        </label>
                                                        <input type="text" id="title_ar" class="form-control" placeholder="  " value="{{old('title_ar')}}" name="title_ar">
                                                        @error("title_ar")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> (EN )   العنوان
                                                        </label>
                                                        <input type="text" id="title_en" class="form-control" placeholder="  " value="{{old('title_en')}}" name="title_en">
                                                        @error("title_en")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>
                                            
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  meta_title 
                                                        </label>
                                                        <input type="text" id="meta_title" class="form-control" placeholder="  " value="{{old('meta_title')}}" name="meta_title">
                                                        @error("meta_title")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">meta_description
                                                        </label>
                                                        <input type="text" id="meta_description" class="form-control" placeholder="  " value="{{old('meta_description')}}" name="meta_description">
                                                        @error("meta_description")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>
                                            
           <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">meta_keywords
                                                        </label>
                                                        <input type="text" id="meta_description" class="form-control" placeholder="  " value="{{old('meta_keywords')}}" name="meta_description">
                                                        @error("meta_keywords")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>                                 

 

                                             
	<div class="col-md-6">

	    <div class="form-group">
			<h5>Long Description AR <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="description_ar" rows="10" cols="80" required="">
		 
						</textarea>  
	 		 </div>
		</div>
				
			</div> <!-- end -->

			<div class="col-md-6">

	     <div class="form-group">
			<h5>Long Description English <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor2" name="description_en" rows="10" cols="80">
		Long Description English
						</textarea>       
	 		 </div>
		</div>
				 
				
			</div> <!-- end col md 6 -->		 
			







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

@stop