 @extends('layouts.admin')
@section('content')

<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title"> الاقسام الرئيسية </h3>
				<div class="row breadcrumbs-top">
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('general.index')}}<!--الرئيسية--></a>
							</li>
							<li class="breadcrumb-item active"> الاقسام الفرعية
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">
			<!-- DOM - jQuery events table -->
			<section id="dom">
				<div class="row">



					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">جميع الاقسام الفرعية </h4>
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
								<div class="card-body card-dashboard table-responsive">
									<form class="form" action="{{route('admin.options.delAll')}}" method="POST" enctype="multipart/form-data">
										@csrf

		 	<!--<table class="table table-striped table-bordered display nowrap zero-configuration" style="width:100%;">-->
<table id="example" class="  table-striped table-bordered display   zero-configuration " style="width:100%"><!--<table class="table display nowrap table-striped table-bordered scroll-horizontal table-responsive">
	<table class="table table-striped table-bordered display nowrap zero-configuration"  cellspacing="0" cellpadding="0">
-->
									<thead class="">
												<tr>

													<th ># </th>
													<th><!--الإسم (AR)-->{{__('general.name_ar')}}</th>

													<th ><!--القسم الرئيسي--> {{__('general.main_cat')}}</th>
                                                   
<th>صوره </th>
  



													<th  >{{__('general.status')}}<!--الحالة--></th>

													<th >{{__('general.actions')}}<!--الإجراءات--></th>
													<th>
														<!-- <input type="submit"  style="margin-bottom: 10px" class="btn btn-danger" value="حذف " > -->
														<input type="image" src="{{asset('images/del.png')}}" alt="delete" width="50" height="50">
														<!--<input type="checkbox" id="select_all" />-->
													</th>
												</tr>
											</thead>
											<tbody>

												@isset($options)
												@foreach($options as $item)
												<tr>

													<td>{{$loop->index+1}}</td>
													<td>{{$item -> {'name_'.app()->getLocale()} }}</td>
													<td>

														{{$item->category->name_ar}}

													</td>
                                                    
													<td>
														@if( file_exists(realpath('assets/images/options/'.$item->img)))

														<img style="width: 70px; height: 70px;" src="{{asset('assets/images/options/'.$item->img)}}">
														@else
														<img style="width: 100px; height: 100px;" src="{{asset('images/noimage.png')}}">

														@endif
													</td>


                                                   
                                                    
													<td>{{--$item -> getActive()--}}

														@if($item->is_active==1)
														<a href="{{ route('admin.options.deactivate',$item -> id)}}">
															<img style="width: 30px; height: 30px;" src="{{asset('images/ok_blue.png')}}" alt="اضغط لالغاء التفعيل"></a>
														@else
														<a href="{{ route('admin.options.activate',$item -> id)}}" alt="اضغط للتفعيل">
															<img style="width: 30px; height: 30px;" src="{{asset('images/del_blue.png')}}" alt="اضغط للتفعيل"></a>

														@endif
													</td>



													<td width="10%">

 														<div class="btn-group" role="group" aria-label="Basic example">


                                                               <a href="{{ route('admin.options.edit',$item -> id)}}" class="btn btn-outline-info  mr-1 mb-1  box-shadow-3 " style="width:40px; height:40px;padding:10px 3px 3px 3px"><span class="icon-pencil  font-medium-4"></span><!--تعديل--></a>
                                                             <a href="{{ route('admin.options.delete',$item -> id)}}" class="btn btn-outline-info  mr-1 mb-1  box-shadow-3 " style="width:40px; height:40px ;padding:10px 3px 3px 3px"><span class="ft-trash-2 font-medium-4"><!--حذف--></span> </a>





														</div>
													</td>
													<td align="center" width="5%">

														<input type="checkbox" class="class=" form-group"" name="ids[]" id="delAll" value="{{$item -> id}}">
													</td>
												</tr>
												@endforeach

												@endisset

											</tbody>
										</table>




									</form>
									<div class="justify-content-center d-flex">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</section>
		</div>
	</div>
</div>
<script>
	$("#selectAll").click(function() {
		$("input[type=checkbox]").prop('checked', $(this).prop('checked'));

	});
</script>
@stop
