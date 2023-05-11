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
							<li class="breadcrumb-item"><a href="{{--route('admin.dashboard')--}}">الرئيسية</a>
							</li>
							<li class="breadcrumb-item active"> الاقسام الرئيسية
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
								<h4 class="card-title">جميع الاقسام الرئيسية </h4>
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

							<div    id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
								<div class="card-body card-dashboard">
								<form class="form" action="{{route('admin.maincategories.delAll',app()->getLocale())}}" method="POST" enctype="multipart/form-data">
                                        @csrf
 									<!--<table  class="table display nowrap table-striped table-bordered scroll-horizontal table-responsive  "> --><table class="table table-striped table-bordered display nowrap zero-configuration">
										<thead class="">
											<tr>
												
												<th># </th>
												<th>الاسم (AR) </th>
												<!--<th>الاسم (EN) </th>-->
												 
												<th>الحالة</th>
												<th>صوره </th>
												 
												<th><!-- <input type="submit"  style="margin-bottom: 10px" class="btn btn-danger" value="حذف " > -->
												<input type="image" src="{{asset('images/del.png')}}" alt="delete" width="70" height="70" >
											</th>
											</tr>
										</thead>
										<tbody>

											@isset($category)
                                         {{--   write it    @php
                                           $products= $category->products()->latest()->paginate(2) ; 
                                            @endphp 
                                            @foreach($products  as $product)    or write--}}
											 @foreach($products=$category->products()->latest()->paginate(2) as $product)
											<tr>
											<td>{{$loop->index+1}}</td> 
													<td> 
                                                        <br>{{$product -> {'name_' . app()->getLocale()} }}</td>
												<!--	<td>{{$category -> name_en}}</td>-->
 													<td>{{$product -> getActive()}}</td>

													<?php //  $base_url=config('app.url');
													//echo $img_path= $base_url.'assets/images/maincategories/'.$category->img;
													$tmp_path='assets/images/maincategories/'.$product->img;
													  $file_path=realpath($tmp_path);
													 
	



													//echo public_path('assets/images/maincategories/'.$category->img)?>
													<td>
														 @if(file_exists(realpath('assets/images/products/'.$product->img)))
														  <img style="width: 150px; height: 100px;" src="{{asset('assets/images/products/'.$product->img)}}" >
 
													@else
													<img style="width: 150px; height: 100px;" src="{{$base_url.'images/noimage.png'}}" >
 													 

													@endif
													</td>
													<td>
														<div class="btn-group" role="group" aria-label="Basic example">
 															
															 
 															
															
															
														</div>
													</td>
												<td align="center" width="5%"> 
													
                                              
											</td>
											</tr>
											@endforeach
											
											@endisset
												
										</tbody>
									</table>

								 
										
 
								</form>
									<div class="justify-content-center d-flex">
                                    {{ $products->withQueryString()->links('vendor.pagination.bootstrap-4') }}	 
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

@stop