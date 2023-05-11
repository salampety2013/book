@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href=""> </a>
                            </li>
                            <li class="breadcrumb-item"><a href=""> الاعضاء   </a>
                            </li>
                            <li class="breadcrumb-item active"> تفاصيل العضو -   {{ $member -> name  }}
                             

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
                                <h4 class="card-title" id="basic-layout-form">    الاعضاء </h4>
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
                                    <form class="form" action="{{route('admin.members.show',$member -> id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input name="id" value="{{$member -> id}}" type="hidden">

                                        <div class="form-group">
                                            <div class="text-center">

                                            </div>
                                        </div>




                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> بيانات العضو </h4>
                                            
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">{{ __("Name") }}
                                                        </label>
                                                        <input type="text" id="name_ar" class="form-control" placeholder="  " value="{{$member ->name}}" name="name" disabled="disabled">
                                                        @error("name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">{{ __("email") }}
                                                        </label>
                                                        <input type="text" class="form-control" placeholder="  " value="{{$member->email}}" name="email" disabled="disabled">
                                                        @error("email")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">{{ __("Details") }}
                                                        </label>
                                                        <input type="text" class="form-control" placeholder="  " value="{{$member->email}}" name="mobie" disabled="disabled">
                                                        @error("mobie")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                             
                                                 
                                                <div class="form-group">
                                                    <label> صوره   </label>
                                                    <img src="{{asset('assets/images/members/'.$member->img)}}" class="rounded-circle  height-150" alt="صورة   ">
                                                   <!-- <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="file" name="img">
                                                        <span class="file-custom"></span>
                                                    </label>
                                                    @error('img')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror-->
                                                </div>





                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1" name="status" id="switcheryColor4" class="switchery" data-color="success" disabled="disabled" @if($member -> status == 1)checked @endif/>
                                                        <label for="switcheryColor4" class="card-title ml-1">الحالة </label>

                                                        @error("status")
                                                        <span class="text-danger">{{$message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>



                                           <!-- <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                    </form>

                                </div>-->
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