<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login_ass/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_ass/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_ass/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_ass/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_ass/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_ass/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_ass/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_ass/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_ass/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_ass/css/util.css">
	<link rel="stylesheet" type="text/css" href="login_ass/css/main.css">
<!--===============================================================================================-->
<!-- Core JS files -->
<script src="{{asset('global_assets/js/plugins/loaders/pace.min.js')}}"></script>
<script src="{{asset('global_assets/js/core/libraries/jquery.min.js')}}"></script>
<script src="{{asset('global_assets/js/core/libraries/bootstrap.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
<!-- /core JS files -->
<script>
	$("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 1000 ); // 5 secs

});
</script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-color: #2D3092">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
			{{-- Register success message --}}
			@if(Session::has('register-status'))
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('register-status') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
				</p>
			@endif
			{{-- Register success message --}}
			@if(Session::has('login-status'))
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('login-status') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
				</p>
			@endif
			 
				<form action="dologin" method="post" class="login100-form validate-form flex-sb flex-w">
					{{ csrf_field() }}
					

					{{-- <a href="#" class="btn-face m-b-20">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a> --}}

					{{-- <a href="#" class="btn-google m-b-20">
						<img src="login_ass/images/icons/icon-google.png" alt="GOOGLE">
						Google
					</a> --}}
					
					<span style="color:#2D3092;text-decoration:underline" class="login100-form-title p-b-53">
						User Login
					</span>
					{{-- <div class="p-t-31 p-b-9"> --}}
						<span class="txt1">
							User Email
						</span>
					{{-- </div> --}}
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="useremail" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

						<a href="{{url('u_email_exist')}}" class="txt2 bo1 m-l-5">
							Forgot?
						</a>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="userpassword" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						{{-- <button class="login100-form-btn">
							Sign In
						</button> --}}
						<input class="login100-form-btn" type="submit" name="submit" id="submit" value="Sign In" >

					</div>
					 

					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Not a member?
						</span>

						<a href="{{url('signup')}}" class="txt2 bo1">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="login_ass/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login_ass/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login_ass/vendor/bootstrap/js/popper.js"></script>
	<script src="login_ass/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login_ass/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login_ass/vendor/daterangepicker/moment.min.js"></script>
	<script src="login_ass/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login_ass/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login_ass/js/main.js"></script>

</body>
</html>