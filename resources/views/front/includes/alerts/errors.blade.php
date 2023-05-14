
@if(Session::has('error'))
    <div class="col-lg-10 col-md-4 col-xs-12   mr-2 ml-2" align="center" >
            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                    id="type-error">{{Session::get('error')}}
            </button>
    </div>
@endif
