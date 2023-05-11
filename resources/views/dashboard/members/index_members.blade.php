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
							<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
							</li>
							<li class="breadcrumb-item active"> الاعضاء
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
								<h4 class="card-title">جميع الاعضاء </h4>
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
								<div class="card-body card-dashboard">
									<form class="form" action="{{route('admin.members.delAll')}}" method="POST" enctype="multipart/form-data">
										@csrf

										<table class=" table-striped table-bordered display nowrap zero-configuration">

<!--<table class="table display nowrap table-striped table-bordered scroll-horizontal table-responsive">
	<table class="table table-striped table-bordered display nowrap zero-configuration"  cellspacing="0" cellpadding="0">
-->		 
									<thead class=" " align="center">
												<tr>

													<th># </th>
													<th><!--الإسم (AR)-->{{__('Name')}}</th>
                                                     <th><!--البريد (EN) -->{{__('Email')}}</th>
													 <th><!--الموبايل (EN) -->{{__('mobile')}}</th> 
                                                     <th><!--الصوره (EN) -->{{__('pic')}}</th>
 
													<th><!--النوع-->{{__('general.status')}}</th>
													
													<th><!--الإجراءات-->{{__('general.actions')}}</th>
													<th>
														<input type="submit"  style="margin-bottom: 10px" class="btn btn-danger" value="حذف " >
													<!-- 	<input type="image" src="{{asset('images/del.png')}}" alt="delete" width="50" height="50"> -->
														<!--<input type="checkbox" id="select_all" />-->
													</th>
												</tr>
											</thead>
											<tbody>

												@isset($members)
												@foreach($members as $member)
												<tr align="center">

													<td>{{$loop->index+1}}</td>
													<td>{{$member -> name}}</td>
													<td>
														 
														{{$member ->email}}

													</td>
                                                    <td>
														 
														{{$member ->mobile}}

													</td>
													<td>
														@if( file_exists(realpath('assets/images/members/'.$member->img)))

														<img style="width: 100px; height: 100px;" src="{{asset('assets/images/members/'.$member->img)}}">
														@else
														<img style="width: 100px; height: 100px;" src="{{asset('images/noimage.png')}}">

														@endif
													</td>
													<td>{{--$member -> getActive()--}}

														@if($member->status==1)
														<a href="{{ route('admin.members.deactivate',$member -> id)}}">
															<img style="width: 30px; height: 30px;" src="{{asset('images/ok_blue.png')}}" alt="اضغط لالغاء التفعيل"></a>
														@else
														<a href="{{ route('admin.members.activate',$member -> id)}}" alt="اضغط للتفعيل">
															<img style="width: 30px; height: 30px;" src="{{asset('images/del_blue.png')}}" alt="اضغط للتفعيل"></a>

														@endif
													</td>


													
													<td width="10%">
                                                    
 														<div class="btn-group" role="group" aria-label="Basic example">
														 
                                                        
                                                               <a href="{{ route('admin.members.show',$member -> id)}}" class="btn btn-outline-info  mr-1 mb-1  box-shadow-3 " style="width:40px; height:40px;padding:10px 3px 3px 3px"><span class="la la-eye  font-medium-4"></span><!--تعديل--></a>
                                                             <a href="{{ route('admin.members.delete',$member -> id)}}" class="btn btn-outline-info  mr-1 mb-1  box-shadow-3 " style="width:40px; height:40px ;padding:10px 3px 3px 3px"><span class="ft-trash-2 font-medium-4"><!--حذف--></span> </a>
															  
                                                             
                                                            


														</div>
													</td>
													<td align="center" width="5%">

														<input type="checkbox" class="class=" form-group"" name="ids[]" id="delAll" value="{{$member -> id}}">
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