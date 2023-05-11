
<!-- <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" style="background-color:#8a8b8f ;"> -->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
{{--auth('admin')-> user()->type--}}
<div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

             
                
               @can("sliders")

        <li class="nav-item"><a href=""><i class="la la-home"></i>
                              <span class="menu-title" data-i18n="nav.dash.main">   السلايدر   </span>
                              <span
                                  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Slider::count()}}</span>
                          </a>
                          <ul class="menu-content">
                              <li  @if($routename=='admin.sliders')  class="active" @endif  ><a class="menu-item" href="{{route('admin.sliders')}}"
                                                    data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                              </li>
                              <li  @if($routename=='admin.sliders.create')  class="active" @endif  >
                              <a class="menu-item" href="{{route('admin.sliders.create')}}" data-i18n="nav.dash.crypto">أضافة
                                     إضافه صور للسلايدر </a>
                              </li>
                               <li  @if($routename=='admin.sliders.createMultiple')  class="active" @endif  >
                              <a class="menu-item" href="{{route('admin.sliders.createMultiple')}}" data-i18n="nav.dash.crypto">إضافة صور بدون عنوان
                                     إضافه صور للسلايدر </a>
                              </li>
                          </ul>
                      </li>

                       @endcan
              @can("categories")
           <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الأقسام الرئيسية  </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{ \App\Models\Category::count() }} </span>
                </a>
                <ul class="menu-content">
                    <li    @if($routename=='admin.maincategories')  class="active" @endif   ><a class="menu-item" href="{{route('admin.maincategories')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل    </a>
                    </li>
                    <li  @if($routename=='admin.maincategories.create')  class="active" @endif ><a class="menu-item" href="{{route('admin.maincategories.create')}}"
                           data-i18n="nav.dash.crypto">
                            إضافة قسم جديد </a>
                    </li>
                </ul>
            </li>
				 @endcan

                 <li class=" nav-item"><a href="#"><i class="la la-clipboard"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">الاعلانات</span>
                 <span class="badge badge badge-info float-right mr-2"> {{\App\Models\Advertisment::count()}}</span>
                        </a>

                                                                                        <ul class="menu-content">
                         @can("list_advertisments")
                          <li  @if($routename=='admin.advertisments')  class="active" @endif  ><a class="menu-item" href="{{route('admin.advertisments')}}" data-i18n="nav.invoice.invoice_summary">   عرض كل الاعلانات
                                 </a>
                          </li>
                          @endcan
                       @can("add_advertisment")

                            <li  @if($routename=='admin.advertisments.create')  class="active" @endif  ><a class="menu-item" href="{{route('admin.advertisments.create')}}" data-i18n="nav.invoice.invoice_template">
                          إضافة إعلان    </a>
                          </li>

                          
                          @endcan

                      </ul>
                  </li>

                  @can("options")
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                      <span class="menu-title" data-i18n="nav.dash.main">الاضافات على الاعلانات  </span>
                      <span
                          class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Option::count()}}</span>
                  </a>
                  <ul class="menu-content">
                      <li  @if($routename=='admin.options')  class="active" @endif  ><a class="menu-item" href="{{route('admin.options')}}"
                                            data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                      </li>
                      <li  @if($routename=='admin.options.create')  class="active" @endif  >
                      <a class="menu-item" href="{{route('admin.options.create')}}" data-i18n="nav.dash.crypto">أضافة
                               جديد </a>
                      </li>
                  </ul>
              </li>
              @endcan

             
              
              

              
           


             
            
              @can("coupons")



            <li class=" nav-item"><a href="#"><i class="la la-paint-brush"></i><span class="menu-title"
                                                                                     data-i18n="nav.color_palette.main"> الخصومات على المنتجات                         </span></a>
                <ul class="menu-content">
                     <li  @if($routename=='admin.coupons')  class="active" @endif  ><a class="menu-item" href="{{route('admin.coupons')}}" data-i18n="nav.invoice.invoice_summary">   عرض
                           </a>
                    </li>
                      <li  @if($routename=='admin.coupons.create_update')  class="active" @endif  ><a class="menu-item" href="{{route('admin.coupons.create_update')}}" data-i18n="nav.invoice.invoice_template">
                    إضافة      </a>
                    </li>

                </ul>
            </li> @endcan
              @can("currencies")


 <li class=" nav-item"><a href="#"><i class="la la-paint-brush"></i><span class="menu-title"
                                                                                     data-i18n="nav.color_palette.main"> العملات                        </span></a>
                <ul class="menu-content">
                     <li  @if($routename=='admin.currencies')  class="active" @endif  ><a class="menu-item" href="{{route('admin.currencies')}}" data-i18n="nav.invoice.invoice_summary">   عرض
                           </a>
                    </li>
                      <li  @if($routename=='admin.currencies.create')  class="active" @endif  ><a class="menu-item" href="{{route('admin.currencies.create')}}" data-i18n="nav.invoice.invoice_template">
                    إضافة      </a>
                    </li>

                </ul>
            </li>
                       @endcan

            


          
               @can("pages")

            <li class=" nav-item"><a href="#"><i class="la la-paint-brush"></i><span class="menu-title"
                                                                                     data-i18n="nav.color_palette.main"> الصفحات                        </span></a>
                <ul class="menu-content">
                     <li  @if($routename=='admin.pages')  class="active" @endif  ><a class="menu-item" href="{{route('admin.pages')}}" data-i18n="nav.invoice.invoice_summary">   عرض
                           </a>
                    </li>
                      <li  @if($routename=='admin.pages.create')  class="active" @endif  ><a class="menu-item" href="{{route('admin.pages.create')}}" data-i18n="nav.invoice.invoice_template">
                    إضافة      </a>
                    </li>

                </ul>
            </li>

                @endcan
                             @can("managers")


             <li class=" nav-item"><a href="#"><i class="la la-group"></i><span class="menu-title"
                                                                                     data-i18n="nav.color_palette.main"> المديرين                        </span></a>
                <ul class="menu-content">
                     <li  @if($routename=='admin.managers.index')  class="active" @endif  ><a class="menu-item" href="{{route('admin.managers.index')}}" data-i18n="nav.invoice.invoice_summary">   عرض
                           </a>
                    </li>
                      <li  @if($routename=='admin.managers.create')  class="active" @endif  ><a class="menu-item" href="{{route('admin.managers.create')}}" data-i18n="nav.invoice.invoice_template">
                    إضافة      </a>
                    </li>

                </ul>
            </li>

             @endcan


            <li class=" nav-item"><a href="#"><i class="la la-group"></i><span class="menu-title"
                                                                                     data-i18n="nav.color_palette.main"> الصلاحيات                        </span></a>
                <ul class="menu-content">
                     <li  @if($routename=='admin.roles.index')  class="active" @endif  ><a class="menu-item" href="{{route('admin.roles.index')}}" data-i18n="nav.invoice.invoice_summary">   عرض
                           </a>
                    </li>
                      <li  @if($routename=='admin.roles.create')  class="active" @endif  ><a class="menu-item" href="{{route('admin.roles.create')}}" data-i18n="nav.invoice.invoice_template">
                    إضافة      </a>
                    </li>

                </ul>
            </li>  @can("brands")

              <li class="nav-item"><a href=""><i  class="la la-group"></i>
                      <span class="menu-title" data-i18n="nav.dash.main">    الاعضاء</span>
                      <span
                          class="badge badge badge-success badge-pill float-right mr-2">{{\App\Models\User::count()}}</span>
                  </a>
                  <ul class="menu-content">
                      <li  @if($routename=='admin.members')  class="active" @endif  ><a class="menu-item" href="{{route('admin.members')}}"
                                            data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                      </li>

                  </ul>
              </li>
@endcan


             





        

            
            
            

            

          




           
            
            
            <li class=" navigation-header">
                <span data-i18n="nav.category.support">Support</span><i class="la la-ellipsis-h ft-minus"
                                                                        data-toggle="tooltip"
                                                                        data-placement="right"
                                                                        data-original-title="Support"></i>
            </li>
            <li class=" nav-item"><a href="http://support.pixinvent.com/"><i class="la la-support"></i><span
                        class="menu-title" data-i18n="nav.support_raise_support.main">Raise Support</span></a>
            </li>
            <li class=" nav-item">
                <a href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/documentation"><i
                        class="la la-text-height"></i>
                    <span class="menu-title" data-i18n="nav.support_documentation.main">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</div>
