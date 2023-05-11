@extends('layouts.site')
@section('content')
<meta name="csrf_token" content="{{ csrf_token() }}" />
    <nav data-depth="1" class="breadcrumb-bg">
        <div class="container no-index">
            <div class="breadcrumb">

                <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('home')}}">
                            <span itemprop="name">Home</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                </ol>
            </div>
        </div>
    </nav>
    <div class="container no-index">
        <div class="row">
            <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="main">
                    <div class="page-header">
                        <h1 class="page-title hidden-xs-up">
                            Log in to your account
                        </h1>
                    </div>
                    <section id="content" class="page-content">
                        <section class="login-form">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <section>
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            Name :
                                        </label>
                                        <div class="col-md-6">

                                            <input class="form-control" name="name" value="{{ old('name') }}"
                                                   type="text" >
                                            @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            email :
                                        </label>
                                        <div class="col-md-6">

                                            <input class="form-control" name="email" value="{{ old('email') }}"
                                                   type="email" id="check-email" >
                                            @error('email')
                                            
                                            <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-2 right">
                                       <img src="{{asset('images/LoaderIcon.gif')}}" id="loaderIcon" style="display:none"  width="70"  />
                                      
										  </div>
                                        <div class="col-md-2  right" id="check-email-msg">
                                        </div >
                                        <div class="col-md-2 form-control-comment right">
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            Mobile :
                                        </label>
                                        <div class="col-md-6">

                                            <input class="form-control" name="mobile" value="{{ old('mobile') }}"
                                                   type="text" id="check-mobile">
                                            @error('mobile')
                                            <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        
                                         <div class="col-md-2 right">
                                       <img src="{{asset('images/LoaderIcon.gif')}}" id="loaderIcon-mobile" style="display:none"  width="70"  />
                                      
										  </div>
                                        <div class="col-md-2  right" id="check-mobile-msg">
                                        </div >
                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            Password :
                                        </label>
                                        <div class="col-md-6">

                                            <div class="input-group js-parent-focus">
                                                <input class="form-control js-child-focus js-visible-password"
                                                       name="password" type="password" value=""
                                                       >
                                                <span class="input-group-btn">
                                    <button class="btn" type="button" data-action="show-password" data-text-show="Show"
                                            data-text-hide="Hide">
                                      Show
                                    </button>
                     </span>
                                            </div>
                                            @error('password')
                                            <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            confirm Password :
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group js-parent-focus">
                                                <input class="form-control js-child-focus js-visible-password"
                                                       name="password_confirmation" type="password" value=""
                                                       >
                                                <span class="input-group-btn">
                                    <button class="btn" type="button" data-action="show-password" data-text-show="Show"
                                            data-text-hide="Hide">
                                      Show
                                    </button>
                     </span>
                                            </div>

                                        </div>
                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-md-10 offset-md-2">
                                            <div class="forgot-password">
                                                <a href="password-recovery.html" rel="nofollow">
                                                    Forgot your password?
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <footer class="form-footer clearfix">
                                    <div class="row no-gutters">
                                        <div class="col-md-10 offset-md-2">
                                            <input type="hidden" name="submitLogin" value="1">
                                            <button class="btn btn-primary" data-link-action="sign-in" type="submit"
                                                    class="form-control-submit">
                                                Sign up
                                            </button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                        <div class="row no-gutters">
                            <div class="col-md-10 offset-md-2">
                                <div class="no-account">
                                    <a href="{{route('login')}}" data-link-action="display-register-form">
                                        Have account? Login Here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <footer class="page-footer">
                        <!-- Footer content -->
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <br>
 
<!--<script src="{{asset('assets/form_validation/jquery.js')}}"></script>
	<script src="{{asset('assets/form_validation/jquery.validate.js')}}"></script>
	<script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});

	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			}
		});

		// propose username by combining first- and lastname
		$("#username").focus(function() {
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			if (firstname && lastname && !this.value) {
				this.value = firstname + "." + lastname;
			}
		});

		 
	});
	</script>
-->
 @stop
    @section('scripts')
<script>


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		
		
		$('#check-email').on('change', function()
{
     //alert(this.value); //or alert($(this).val());
  // var address_id = $(this).attr('data-address-id');
   document.getElementById('loaderIcon').style.display = 'block';
             var user_email = $(this).val();
            if(user_email) {
                $.ajax({
                    url: "{{route('site.check_email')}}",
                    type:"POST",
                    dataType:"json",
					data:{user_email:user_email},
                    success:function(data) {
						// alert("yes");
                        document.getElementById('loaderIcon').style.display = 'none';
			 //$('#display-product-colors').html('<p>Data added successfully !</p><input type="radio"  value="gooo">'); 
						// $("#display-product-colors").append(" <span>color: </span>.");
						  $('#check-email-msg').html(data); 
					  // $('select[name="city_id"]').append('<option value="" disabled=""> Select city  </option>'); 
                     // 					     
					      
                    },
                });
            } else {
                alert('danger');
            }
        });
 

$('#check-mobile').on('change', function()
{
     //alert(this.value); //or alert($(this).val());
  // var address_id = $(this).attr('data-address-id');
   document.getElementById('loaderIcon-mobile').style.display = 'block';
             var user_mobile = $(this).val();
            if(user_mobile) {
                $.ajax({
                    url: "{{route('site.check_mobile')}}",
                    type:"POST",
                    dataType:"json",
					data:{user_mobile:user_mobile},
                    success:function(data) {
						// alert("yes");
                        document.getElementById('loaderIcon-mobile').style.display = 'none';
			 //$('#display-product-colors').html('<p>Data added successfully !</p><input type="radio"  value="gooo">'); 
						// $("#display-product-colors").append(" <span>color: </span>.");
						  $('#check-mobile-msg').html(data); 
					  // $('select[name="city_id"]').append('<option value="" disabled=""> Select city  </option>'); 
                     // 					     
					      
                    },
                });
            } else {
                alert('danger');
            }
        });
 

function checkAvailability_email() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability_email.php",
	data:'email='+$("#email").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status_email").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
     </script>   
@stop
  