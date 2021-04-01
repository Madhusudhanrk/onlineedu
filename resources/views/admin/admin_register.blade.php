<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin SignUp</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('lassets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('lassets/css/core.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('lassets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('lassets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script src="{{asset('global_assets/js/core/libraries/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script src="{{asset('lassets/js/app.js')}}"></script>
	<!-- /theme JS files -->
	<script>
		$(document).ready(function(){
			$("#password").change(function(){
				var password=$("#password").val();
				var strength=0;
					if (password.match(/([a-zA-Z])/)) strength += 1
					if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
					if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
					if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
							if (password.length >=6) {
								if (strength > 2) {
									$("#pass-err").css("display","none");
								} else{
									$("#pass-err").css("display","block");
									$("#password").val("");
								}
							} else{
								$("#pass-err").css("display","block");
								$("#password").val("");
							}
			});
		});

	</script>
</head>

<body class="login-container">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{url('index')}}">
				{{-- <img src="global_assets/images/logo_light.png" alt=""> --}}
				<span style="color:wight;font-size:17px;">Admin Register</span>
			</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				{{-- <li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li> --}}

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
					</a>
				</li>

				{{-- <li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right"> Options</span>
					</a>
				</li> --}}
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
			
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">
					@if(Session::has('admin-register-status'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('admin-register-status') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
					</p>
				@endif
					<!-- Simple login form -->
				<form action="{{url('doadmin_register')}}" method="POST">
					{{ csrf_field() }}

						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Register your account <small class="display-block">Enter your credentials below</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="email" name="reference_admin_email" class="form-control" placeholder="Reference Admin Email">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="email" name="admin_email" class="form-control" placeholder="New Admin Email">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="password" id="password" class="form-control" placeholder="Password" minlength="6" maxlength="8">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								@if ($errors->has('password')) <p style="color:rgb(233, 131, 14);">{{ $errors->first('password') }}</p> 
                                @endif
                            <span  id="pass-err" style="color:rgb(233, 131, 14);display:none;">Password should contain alpha, numeric, special charecter, and minimum length 6 digits</span>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" minlength="6" maxlength="8">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								@if ($errors->has('cpassword')) <p style="color:rgb(233, 131, 14);">{{ $errors->first('cpassword') }}</p> @endif
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">New Admin <i class="icon-circle-right2 position-right"></i></button><br>
								<span class="txt2">
									Already Admin? 
								</span>
								<a href="{{url('admin_login')}}" class="txt2 bo1">
									SignIn
								</a> <br>
								<span style="color:red">Note: Give same email for both Reference and new admin if ur the first admin in the system</span>
							</div>

							{{-- <div class="text-center">
								<a href="login_password_recover.html">Forgot password?</a>
							</div> --}}
						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2020. <a href="#">Onlineedu</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Madhusudhan</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
