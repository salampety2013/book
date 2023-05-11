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
                            <li class="breadcrumb-item"><a href="{{route('admin.currencies')}}"> العملات
                                     </a>
                            </li>
                            <li class="breadcrumb-item active"> إضافة عملة   
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة عملة </h4>
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
                                    <form class="form" action="{{route('admin.currencies.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf



                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> بيانات العملات </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> ( AR ) اسم العملة
                                                        </label>
                                                        <input type="text" id="name_ar" class="form-control" placeholder="  " value="{{old('name_ar')}}" name="name_ar">
                                                        @error("name_ar")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> (EN ) اسم العملة
                                                        </label>
                                                        <input type="text" id="name_en" class="form-control" placeholder="  " value="{{old('name_en')}}" name="name_en">
                                                        @error("name_en")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>
                                            
                                 
            
<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الكود
                                                        </label>
                                                        <input type="text" codeid="code" class="form-control" placeholder="  " value="{{old('code')}}" name="code">
                                                        @error("code")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">symbol الرمز
                                                        </label>symbol
                                                        <input type="text" id="symbol" class="form-control" placeholder="  " value="{{old('symbol')}}" name="symbol">
                                                        @error("symbol")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>
<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                              
             
                
                                       <label for="projectinput1">Exchange Rate القيمة 
                                                        </label>
                                                        <input type="text" id="exchange_rate" class="form-control" placeholder="  " value="{{old('exchange_rate')}}" name="exchange_rate">
                                                        @error("exchange_rate")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Tax Value قيمة الضريبة
                                                        </label>
                                                        <input type="text" id="tax_value" class="form-control" placeholder="  " value="{{old('tax_value')}}" name="tax_value">
                                                        @error("tax_value")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>

                                             







                                        </div>

                                        <div class="form-group">
                                            <label> صوره  </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="img" name="img">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('img')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mt-1">
                                                <input type="checkbox" value="1" name="status" id="switcheryColor4" class="switchery" data-color="success" checked />
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
@stop