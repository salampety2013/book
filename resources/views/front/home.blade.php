@extends('layouts.site')

@section('slider')


     <div id="displayTop" class="displaytopone">

                <div class="container">
                  <div class="row">
                    <div class="nov-row  nov_row-no-padding "  data-nov-full-width="true" data-nov-stretch-content="true">
                    <div class="nov-row-wrap row">
                      <div id="nov-slider" class="slider-wrapper theme-default col-xl-12 col-lg-12 col-md-12"
    	 data-effect="random"
    	 data-slices="15"
    	 data-animSpeed="300"
    	 data-pauseTime="10000"
    	 data-startSlide="0"
    	 data-directionnav="false"
    	 data-controlNav="true"
    	 data-controlNavThumbs="false"
    	 data-pauseOnHover="true"
    	 data-manualAdvance="false"
    	 data-randomStart="false">
		<div class="nov_preload">
			<div class="process-loading active">
	            <div class="loader">
	                <div class="dot"></div>
	                <div class="dot"></div>
	                <div class="dot"></div>
	                <div class="dot"></div>
	                <div class="dot"></div>
	            </div>
	        </div>
		</div>  @isset($sliders)



		<div class="nivoSlider">
         @foreach($sliders as $slider)

 					<a href="">
				<img src="{{asset('assets/images/sliders/'.$slider->img)   ?? ''}} " alt=""  />
			</a>

             @endforeach


          <!-- <a href="#">
				<img src="{{asset('assets/front/modules/novnivoslider/images/fd4d1071197697047b743d95d7eb1d4e12dbc789_1.jpg')}}" alt="" title="#htmlcaption_49" />
			</a>
				  	<a href="#">
				<img src="{{asset('assets/front/modules/novnivoslider/images/b8945ba6615c071b3023f0db7111ef0f44ccd05a_2.jpg')}}" alt="" title="#htmlcaption_50" />
			</a>
					<a href="#">
				<img src="{{asset('assets/front/modules/novnivoslider/images/5aa54427945d748797165674e281af915b83e9bf_3.jpg')}}" alt="" title="#htmlcaption_51" />
			</a> -->
				</div>
                @endisset

					<div id="htmlcaption_49" class="nivo-html-caption">
				<div class="nov-slider-ct">
					<div class="nov-center slider-none">
													<div class="nov-title effect-0" >
								Slider Home1 01
							</div>
																					<div class="nov-description effect-0" >
								<p>Slider Home1 01</p>
							</div>
																					<div class="nov-html effect-0">
								<p>Slider Home1 01</p>
							</div>
											</div>
				</div>
			</div>
					<div id="htmlcaption_50" class="nivo-html-caption">
				<div class="nov-slider-ct">
					<div class="nov-center slider-none">
													<div class="nov-title effect-0" >
								Slider Home1 02
							</div>
																					<div class="nov-description effect-0" >
								<p>Slider Home1 02</p>
							</div>
																					<div class="nov-html effect-0">
								<p>Slider Home1 02</p>
							</div>
											</div>
				</div>
			</div>
					<div id="htmlcaption_51" class="nivo-html-caption">
				<div class="nov-slider-ct">
					<div class="nov-center slider-none">
													<div class="nov-title effect-0" >
								Slider Home1 03
							</div>
																					<div class="nov-description effect-0" >
								<p>Slider Home1 03</p>
							</div>
																					<div class="nov-html effect-0">
								<p>Slider Home1 03</p>
							</div>
											</div>
				</div>
			</div>
		    </div>
</div></div><div class="nov_row-full-width clearfix w-100"></div>
                  </div>
                </div>
            </div>
    @stop
@section('content')


    <div id="main">


              <section id="content" class="page-home pagehome-one">
          <div class="container">
            <div class="row">
              <div class="nov-row spacing-15 col-lg-12 col-xs-12" ><div class="nov-row-wrap row"><div class="nov-image col-lg-4 col-md-4">
 <div class="block">
    <div class="block_content">
    <div class="effect">
      <a href="#"> <img class="img-fluid" src="{{asset('assets/front/modules/novpagemanage/img/66a96e8019b9f475262b900e1da04490.jpg')}}" alt="banner-1" title="banner-1"></a>
    </div>
  </div>
 </div>
</div>
<div class="nov-image col-lg-4 col-md-4">
 <div class="block">
    <div class="block_content">
    <div class="effect">
      <a href="#"> <img class="img-fluid" src="{{asset('assets/front/modules/novpagemanage/img/022031ef3a1ecf00ebe9cc712fa17d1f.jpg')}}" alt="banner-2" title="banner-2"></a>
    </div>
  </div>
 </div>
</div>
<div class="nov-image col-lg-4 col-md-4">
 <div class="block">
    <div class="block_content">
    <div class="effect">
      <a href="#"> <img class="img-fluid" src="{{asset('assets/front/modules/novpagemanage/img/deaa8eca1653ec42bc4c045875a674ca.jpg')}}" alt="banner-3" title="banner-3"></a>
    </div>
  </div>
 </div>
</div>
</div></div>
<!---------------------------------- new arrival   -------------------------->
<!---------------------------------- new arrival   -------------------------->
<!---------------------------------- new arrival   -------------------------->
<!---------------------------------- new arrival   -------------------------->
<!---------------------------------- new arrival   -------------------------->




       <!---------------------------------- End      new arrival tab-------------------------->


<!----------------------------------    HOT DEALS   -------------------------->







<!----------------------------------  End  HOT DEALS   -------------------------->
<!----------------------------------  End  HOT DEALS   -------------------------->


</div></div>

<!---------------------------------- End  new arrival   -------------------------->

<!---------------------------------- End  new arrival   -------------------------->




<div class="nov-row spacing-bg-30 col-lg-12 col-xs-12" >
<div class="nov-row-wrap row"><div class="nov-html col-xl-3 col-lg-3 col-md-3">
    <div class="block">
                <div class="block_content">
            <div class="nov-row-wrap row">
<div class="nov-image col-lg-12 col-md-12">
<div class="block">
<div class="block_content">
<div class="effect"><a href="#">
 <img class="img-fluid" src="http://images.vinovathemes.com/prestashop_savemart/banner-home1-04.jpg" alt="banner 1-1" title="banner 1-1" /></a></div>
</div>
</div>
</div>
</div>
<div class="nov-row-wrap row">
<div class="nov-image col-lg-12 col-md-12">
<div class="block">
<div class="block_content">
<div class="effect"><a href="#">
 <img class="img-fluid" src="http://images.vinovathemes.com/prestashop_savemart/banner-home1-07.jpg" alt="banner 1-1" title="banner 1-4" /></a></div>
</div>
</div>
</div>
</div>
        </div>
    </div>
</div>
<div class="nov-html col-xl-6 col-lg-6 col-md-6">
    <div class="block">
                <div class="block_content">
            <div class="nov-row-wrap row">
<div class="nov-image col-lg-12 col-md-12">
<div class="block">
<div class="block_content">
<div class="effect"><a href="#">
<img class="img-fluid" src="http://images.vinovathemes.com/prestashop_savemart/banner-home1-05.jpg" alt="banner 1-1" title="banner 1-2" /></a></div>
</div>
</div>
</div>
</div>
        </div>
    </div>
</div>
<div class="nov-html col-xl-3 col-lg-3 col-md-3">
    <div class="block">
                <div class="block_content">
            <div class="nov-row-wrap row">
<div class="nov-image col-lg-12 col-md-12">
<div class="block">
<div class="block_content">
<div class="effect"><a href="#"> <img class="img-fluid" src="http://images.vinovathemes.com/prestashop_savemart/banner-home1-06.jpg" alt="banner 1-3" title="banner 1-3" /></a></div>
</div>
</div>
</div>
</div>
<div class="nov-row-wrap row">
<div class="nov-image col-lg-12 col-md-12">
<div class="block">
<div class="block_content">
<div class="effect"><a href="#"> <img class="img-fluid" src="http://images.vinovathemes.com/prestashop_savemart/banner-home1-08.jpg" title="banner 1-5" alt="banner 1-5" /></a></div>
</div>
</div>
</div>
</div>
        </div>
    </div>
</div>
</div></div>



<!---------------------------------- 	Hot Trending  -------------------------->


<div class="nov-row  col-lg-12 col-xs-12" ><div class="nov-row-wrap row">
<div class="nov-productlist   productlist-slider      col-xl-12 col-lg-12 col-md-12 col-xs-12 ">
	<div class="block block-product clearfix">
					<h2 class="title_block">
								Hot Trending
			</h2>
				<div class="block_content">
							<div id="productlist62234088" class="product_list grid owl-carousel owl-theme" data-autoplay="false" data-autoplayTimeout="6000" data-loop="false" data-margin="0" data-dots="false" data-nav="true" data-items="5" data-items_large="3" data-items_tablet="3" data-items_mobile="2" >

                                      @isset($new_trends)
                                              @php $counter=1;  @endphp
                                    @foreach($new_trends as $advertisment)
                                    <div class="item  text-center">
			<div class="product-miniature js-product-miniature item-two first_item" data-id-product="1" data-id-product-attribute="40" itemscope itemtype="http://schema.org/Product">
		  @include('front.products.products-partial_content')
		</div>

	</div>
     @endforeach
                                          @endisset



 								</div>
					</div>
	</div>
</div>
</div></div>

<!---------------------------------- End	Hot Trending  -------------------------->
<!---------------------------------- End	Hot Trending  -------------------------->
<!---------------------------------- End	Hot Trending  -------------------------->










<div class="nov-row spacing-30 effect-special col-lg-12 col-xs-12" ><div class="nov-row-wrap row"><div class="nov-image col-lg-6 col-md-6 nov-image-mta">
 <div class="block">
    <div class="block_content">
    <div class="effect">
      <a href="#"> <img class="img-fluid" src="{{asset('assets/front/modules/novpagemanage/img/a9d8e9ce47e3138b5cd86f6c58255a52.jpg')}}" alt="banner1-9" title="banner1-9"></a>
    </div>
  </div>
 </div>
</div>
<div class="nov-image col-lg-6 col-md-6">
 <div class="block">
    <div class="block_content">
    <div class="effect">
      <a href="#"> <img class="img-fluid" src="{{asset('assets/front/modules/novpagemanage/img/677f44c996a6bcedd7ebe43cb4a63028.jpg')}}" alt="banner1-10" title="banner1-10"></a>
    </div>
  </div>
 </div>
</div>
</div></div>






<!----------------------------------Brands-------------------------->
<!----------------------------------Brands-------------------------->
<!----------------------------------Brands-------------------------->

{{--
<div class="nov-row  col-lg-12 col-xs-12" >
<div class="nov-row-wrap row"><div class="nov-manufacture col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
	<div class="block" >
				<div class="block_content">
			<div id="manufacture385362060" class="owl-carousel owl-theme owl-loaded owl-drag" data-autoplay="true" data-autoplaytimeout="6000" data-loop="true" data-dots="false" data-nav="false" data-margin="30" data-items="6" data-items_large="4" data-items_tablet="3" data-items_mobile="2">

                                                      @isset($brands)
                                              @php $counter=1;  @endphp
                                    @foreach($brands as $brand)
                                                    <div class="item">
											<div class="logo-manu">
							<a href="{{route('products',['slug'=>$brand -> slug_ar,'type'=>'brands'] )}} " title="view products">
							<img class="img-fluid"   src="{{asset('assets/images/brands/'.$brand->img)   ?? ''}} " alt=""/></a>
						</div>
										</div>



                                         @endforeach
                                @endisset
							</div>
		</div>
	</div>
</div>
</div></div>

--}}
<!---------------------------------End -Brands-------------------------->
<!---------------------------------End -Brands-------------------------->
<!---------------------------------End -Brands-------------------------->

            </div>
          </div>
        </section>






  </div>


@stop
