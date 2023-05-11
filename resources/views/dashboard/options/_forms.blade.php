<div class="form-group">
    <div class="text-center">

    </div>
</div>
<?php /*?>value="{{$option ->name_ar}}"
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
                <input type="text" id="name_ar" class="form-control" placeholder="  " value="{{old('name_ar',$option ->name_ar)}}" name="name_ar" required>
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
                <input type="text" id="name_en" class="form-control" placeholder="  " value="{{old('name_en',$option ->name_en)}}" name="name_en" required>
                @error("name_en")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>



    </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mt-1">
                <label for="projectinput1">
                    <!-- القسم رئيسي--> {{__('general.main_cat')}}
                </label>
                <!-- <select name="cat_id" class="select2 js-example-programmatic form-control"> -->

                <select name="cat_id" class="form-control" id="cat_id" required>

                    < value="" selected="" disabled="">
                        <!--Select Category-->{{__('general.select')}}</>

                    @if($categories && $categories -> count() > 0)
                    @foreach($categories as $category)


                    <option value="{{old('cat_id',$category->id)}}" @if( $category->id==$option->cat_id) selected @endif>{{ $category->name_ar }} </option>
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


<div class="col-md-6">
    <div class="form-group">
        <label> icon </label>
        <img src="{{asset('assets/images/options/'.$option->img)}}" class="rounded-circle  height-150" alt="صورة القسم  ">
        <label id="projectinput7" class="file center-block">
            <input type="file" id="file" name="img">
            <span class="file-custom"></span>
        </label>
        @error('img')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>


    @if($category->id=='')
    <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success"  checked   />

@else
  <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success" @if($category -> is_active == 1)checked @endif />
  @endif

</div>

<div class="form-actions">
<button type="button" class="btn btn-warning mr-1" onclick="history.back();">
        <i class="ft-x"></i> تراجع
    </button>
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i> {{$button_label ?? 'حفظ'}}
    </button>
</div>
