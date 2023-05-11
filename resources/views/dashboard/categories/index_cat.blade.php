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
												<th>الإجراءات</th>
												<th><!-- <input type="submit"  style="margin-bottom: 10px" class="btn btn-danger" value="حذف " > -->
												<input type="image" src="{{asset('images/del.png')}}" alt="delete" width="70" height="70" >
											</th>
											</tr>
										</thead>
										<tbody>

											@isset($categories)
											@foreach($categories as $category)
											<tr>
											<td><a href="{{ route('admin.maincategories.show',$category -> id) }}" >{{$loop->index+1}}</a></td> 
													<td>products count={{$category ->products_count}}
                                                        <br>{{$category -> {'name_' . app()->getLocale()} }}</td>
												<!--	<td>{{$category -> name_en}}</td>-->
 													<td>{{$category -> getActive()}}</td>

													<?php //  $base_url=config('app.url');
													//echo $img_path= $base_url.'assets/images/maincategories/'.$category->img;
													$tmp_path='assets/images/maincategories/'.$category->img;
													  $file_path=realpath($tmp_path);
													 
	



													//echo public_path('assets/images/maincategories/'.$category->img)?>
													<td>
														 @if(file_exists(realpath('assets/images/maincategories/'.$category->img)))
														  <img style="width: 150px; height: 100px;" src="{{asset('assets/images/maincategories/'.$category->img)}}" >
 
													@else
													<img style="width: 150px; height: 100px;" src="{{$base_url.'images/noimage.png'}}" >
 													 

													@endif
													</td>
													<td>
														<div class="btn-group" role="group" aria-label="Basic example">
															<a href="{{  route('admin.maincategories.edit',$category -> id) }}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
															
															<i class="fas fa-edit"></i>
															<a href="{{ route('admin.maincategories.delete',$category -> id) }}" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
															
															
															
														</div>
													</td>
												<td align="center" width="5%"> 
													
													<input type="checkbox" class="class="form-group"" name="ids[]" id="delAll" value="{{$category -> id}}">
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
            
            
            <section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Zero configuration</h4>
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
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <p class="card-text">DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>
                                        <td>$433,060</td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                        <td>$162,700</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2012/12/02</td>
                                        <td>$372,000</td>
                                    </tr>
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <td>Sales Assistant</td>
                                        <td>San Francisco</td>
                                        <td>59</td>
                                        <td>2012/08/06</td>
                                        <td>$137,500</td>
                                    </tr>
                                    <tr>
                                        <td>Rhona Davidson</td>
                                        <td>Integration Specialist</td>
                                        <td>Tokyo</td>
                                        <td>55</td>
                                        <td>2010/10/14</td>
                                        <td>$327,900</td>
                                    </tr>
                                    <tr>
                                        <td>Colleen Hurst</td>
                                        <td>Javascript Developer</td>
                                        <td>San Francisco</td>
                                        <td>39</td>
                                        <td>2009/09/15</td>
                                        <td>$205,500</td>
                                    </tr>
                                    <tr>
                                        <td>Sonya Frost</td>
                                        <td>Software Engineer</td>
                                        <td>Edinburgh</td>
                                        <td>23</td>
                                        <td>2008/12/13</td>
                                        <td>$103,600</td>
                                    </tr>
                                    <tr>
                                        <td>Jena Gaines</td>
                                        <td>Office Manager</td>
                                        <td>London</td>
                                        <td>30</td>
                                        <td>2008/12/19</td>
                                        <td>$90,560</td>
                                    </tr>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>Support Lead</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2013/03/03</td>
                                        <td>$342,000</td>
                                    </tr>
                                    <tr>
                                        <td>Charde Marshall</td>
                                        <td>Regional Director</td>
                                        <td>San Francisco</td>
                                        <td>36</td>
                                        <td>2008/10/16</td>
                                        <td>$470,600</td>
                                    </tr>
                                    <tr>
                                        <td>Haley Kennedy</td>
                                        <td>Senior Marketing Designer</td>
                                        <td>London</td>
                                        <td>43</td>
                                        <td>2012/12/18</td>
                                        <td>$313,500</td>
                                    </tr>
                            
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                            </table>
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