<div class="form-group">
    <div class="text-center">

    </div>
</div>
<?php /*?>value="{{$advertisment ->name_ar}}"
<?php */?>



<div class="form-body">

    <h4 class="form-section"><i class="ft-home"></i>
        <!--بيانات القسم-->{{__('general.cat_info')}} </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput1">
                    <!-- ( AR ) اسم القسم-->{{__('general.name_ar')}}
                </label>
                <input type="text" id="name_ar" class="form-control" placeholder="  " value="{{old('name_ar',$advertisment ->name_ar)}}" name="name_ar" required>
                @error("name_ar")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>



        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput1">
                    <!-- (EN ) اسم القسم-->{{__('general.name_en')}}
                </label>
                <input type="text" id="name_en" class="form-control" placeholder="  " value="{{old('name_en',$advertisment ->name_en)}}" name="name_en" required>
                @error("name_en")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>



    </div>
{{--  <div class="col-md-6">
        <div class="form-group mt-1">
            <label for="projectinput1">
                <!-- الماركة --> {{__('general.brand')}}
            </label>
            <select name="brand_id" class="select2 js-example-programmatic form-control" required>
                <!-- <select name="cat_id" class="form-control" id="cat_id" required>-->

                <option value="" selected="" disabled="">
                    <!--Select Category-->{{__('general.select')}}</option>
                @if($brands && $brands -> count() > 0)
                @foreach($brands as $brand)
                <option value="{{ $brand->id }}" @if( $brand->id==$advertisment->brand_id) selected @endif >{{ $brand->name_ar }}</option>
                @endforeach
                @endif

            </select>

            @error("brand")
            <span class="text-danger">{{$message }}</span>
            @enderror

        </div>--}}
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mt-1">
                <label for="projectinput1">
                    <!-- القسم رئيسي--> {{__('general.main_cat')}}
                </label>
                <!-- <select name="cat_id" class="select2 js-example-programmatic form-control"> -->
                <select name="cat_id" class="form-control" id="cat_id" required>

                    <option value="" selected="" disabled="">
                        <!--Select Category-->{{__('general.select')}}</option>
                    @if($categories && $categories -> count() > 0)
                    @foreach($categories as $category)
                    <option value="{{old('cat_id',$category->id)}}" @if( $category->id==$advertisment->cat_id) selected @endif>{{ $category->name_ar }}</option>
                    @endforeach
                    @endif

                </select>

                @error("cat_id")
                <span class="text-danger">{{$message }}</span>
                @enderror

            </div>
        </div>




    </div>
</div>

<div class="row">
   {{-- <div class="col-md-3">

        <div class="form-group">
            <h5>advertisment Quantity <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="number" name="total_quantity" class="form-control" value="{{old('total_quantity',$advertisment ->total_quantity)}}" step="1" min="1" required="">
                @error('total_quantity')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="projectinput1"> {{__('general.code')}}
            </label>
            <input type="text" id="code" class="form-control" placeholder="  " value="{{old('code',$advertisment ->code)}}" name="code" required>
            @error("code")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>--}}

    <div class="col-md-6">

        <div class="form-group mt-1">
            <h5>  Selling Price <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="number" name="price" class="form-control" value="{{old('price',$advertisment ->price)}}" required="">
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>

    <div class="col-md-6 mt-1">

        <div class="form-group">
            <h5>  Discount Price <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="number" name="discount_price" class="form-control" value="{{old('discount_price',$advertisment ->discount_price)}}" required="">
                @error('discount_price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>
</div>

<!-------------------------date-------------------------------->
@if(isset($advertisment -> flash_sale)&& $advertisment -> flash_sale == "flash_sale")

<div class="row">
    <!-- start 8th row  -->
    <div class="col-md-6">

        <div class="form-group">
            <h5> Start Date <span class="text-danger">*</span></h5>
            <div class="controls">
                <!--   <input   type="datetime-local" />-->
                <input type="date" id="start_date" class="form-control" name="start_date" value="{{old('start_date',$advertisment ->start_date)}}" min="2022-01-01" max="2050-12-31" required>{{--$advertisment->start_date--}}




                <!--	  <input type="text" id="txtStartDate" name="start_date" class="start_date" />
-->
            </div>

        </div> <!-- end col md 6 -->
    </div>


    <div class="col-md-6">

        <div class="form-group">
            <h5>End Date<span class="text-danger">*</span></h5>
            <div class="controls">

                <input type="date" id="end_date" class="form-control" name="end_date" placeholder="{{$advertisment->end_date}}" value="{{old('end_date',$advertisment ->end_date)}}" min="2022-01-01" max="2050-12-31" required>
                {{$advertisment->end_date}}<br />




                <!--	  <input type="text" id="txtStartDate" name="start_date" class="start_date" />
-->
            </div>

        </div> <!-- end col md 6 -->
    </div>
</div>

@endif

<!---------------------------------end date------------------------>


<div class="col-md-6" >
                                                <div class="form-group mt-1">
                                                    <label for="projectinput1">
اختار الاضافات                                                     </label>
                                                    <select name="options_ids[]" class="select2 js-example-programmatic form-control" multiple="multiple"  id="options"   >

                                                    <!--<select name="option_id" class="select2 form-control block" multiple="multiple" id="responsive_multi"
                      style="width: 75%">-->

                                                        <option value="" selected="" disabled="">Select options</option>

                                                         @php $options_array=array(explode(",",$advertisment->options_ids ));@endphp
                                                          @if($options && $options -> count() > 0)
                                                             @foreach($options as $option)

                                                             <?php

				                                        // if(in_array($stock_array[count($stock_array)-1] ,$arr2))

															 //  $var = explode(",",$stocks->option_id);

                                                      //  $stock_array = $var[1];

                                                             ?>
                                                          <option value="{{ $option->id }}"  @if( in_array($option->id,$options_array[count($options_array)-1])) selected @endif> {{ $option->name_en }}</option>
                                                        @endforeach
                                                        @endif

                                                    </select>

                                                    @error("option_id")
                                                    <span class="text-danger">{{$message }}</span>
                                                    @enderror

                                                </div>
                                            </div>



<div class="row">
    <!-- start 8th row  -->
    <div class="col-md-6">

        <div class="form-group">
            <h5>Long Description AR <span class="text-danger">*</span></h5>
            <div class="controls">
                <textarea id="editor1" name="details_ar" rows="10" cols="80" required="">
                {{$advertisment -> details_ar}}
                </textarea>
            </div>
        </div>

    </div> <!-- end col md 6 -->

    <div class="col-md-6">

        <div class="form-group">
            <h5>Long Description English <span class="text-danger">*</span></h5>
            <div class="controls">
                <textarea id="editor2" name="details_en" rows="10" cols="80">
                {{$advertisment -> details_en}}
                </textarea>
            </div>
        </div>


    </div> <!-- end col md 6 -->

</div>
<div class="col-md-6">
    <div class="form-group">
        <label> صوره الاعلان الرئيسية </label>
        <img src="{{asset('assets/images/advertisments/'.$advertisment->img)}}" class="rounded-circle  height-150" alt="صورة القسم  ">
        <label id="projectinput7" class="file center-block">
            <input type="file" id="file" name="img">
            <span class="file-custom"></span>
        </label>
        @error('img')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>




</div>




<div class="col-md-12">
    @isset($advertisment -> images)
    <h4 class="form-section"><i class="ft-home"></i> صور الاعلان </h4>
    <div class="form-group">
        <!--style="width: 18rem;"-->
        <div class="row">


            @foreach($advertisment -> images as $image)

            <div class="card col-md-2  mr-1" align="center" style="width: 18rem;border: 2px solid #eeeeee">

                {{-- @if( file_exists(realpath('assets/images/advertisments/'.$image->img)))--}}



                {{--<img class="card-img-top"   alt="Card image cap" src="{{asset('assets/images/advertisments/'.$image->img)}}">--}}
                <img class="card-img-top" alt="Card image cap" src="{{$image->img}}">
                {{--@else--}}
                {{--<img class="card-img-top"   alt="Card image cap" src="{{asset('images/noimage.png')}}">

                {{--@endif--}}
                <div class="card-body">
                    <!-- <h5 class="card-title">Card title{{$image->img}}</h5>
<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
--> <a href="{{ route('admin.advertisments.deleteIimage',$image -> id)}}" class="btn btn-outline-danger  mr-1 mb-1  box-shadow-1 " style="width:40px; height:40px ;padding:10px 3px 3px 3px"><span class="ft-trash-2 font-medium-4">
                            <!--حذف--></span> </a>

                </div>
            </div>
            @endforeach
            @endisset
        </div>

    </div>


</div>


<div class="col-md-12">

    <h4 class="form-section"><i class="ft-home"></i> رفع صور جديدة للمنتج </h4>
    <div class="form-group">
        <div id="dpz-multiple-files" class="dropzone dropzone-area">
            <div class="dz-message">يمكنك رفع اكثر من صوره هنا</div>
        </div>
        <br><br>
    </div>


</div>
<div class="col-md-6">
    <div class="form-group mt-1">
         @if($advertisment->id=='')
                <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success"  checked   />

        @else
              <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success" @if($advertisment -> is_active == 1)checked @endif />

       @endif
         <label for="switcheryColor4" class="card-title ml-1">الحالة </label>

        @error("is_active")
        <span class="text-danger">{{$message }}</span>
        @enderror
    </div>
</div>
<div class="col-md-6">

    <div class="form-group mt-1">
        <input type="checkbox" value="1" name="has_Variants" id="switcheryColor4" class="switchery" data-color="success" @if($advertisment -> has_Variants == 1)checked @endif />
        <label for="switcheryColor4" class="card-title ml-1">هل الاعلان له مقاسات والوان </label>

        @error("has_Variants")
        <span class="text-danger">{{$message }}</span>
        @enderror
    </div>
</div>




<div class="row">

    <div class="col-md-6">
        <div class="form-group">

            <div class="controls">
                @if(isset($advertisment -> flash_sale)&& $advertisment -> flash_sale == "flash_sale")

                <fieldset>
                    <input type="checkbox" id="checkbox_2" name="flash_sale" value="flash_sale" checked>
                    <label for="checkbox_2">Hot Deals</label>
                </fieldset>@endif
                <fieldset>
                    <input type="checkbox" id="checkbox_3" name="new_arrival" @if($advertisment -> new_arrival == "new_arrival")checked @endif value="new_arrival">
                    <label for="checkbox_3">New Arrival</label>
                </fieldset>

            </div>
        </div>
    </div>



    <div class="col-md-6">
        <div class="form-group">

            <div class="controls">
                <fieldset>
                    <input type="checkbox" id="checkbox_4" name="new_trends" value="new_trends" @if($advertisment -> new_trends == "new_trends")checked @endif />
                    <label for="checkbox_4"> Trending Now</label>
                </fieldset>

            </div>
        </div>
    </div>
</div>




<div class="form-actions">
    <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
        <i class="ft-x"></i> تراجع
    </button>
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i> {{$button_label ?? 'حفظ'}}
    </button>
</div>
