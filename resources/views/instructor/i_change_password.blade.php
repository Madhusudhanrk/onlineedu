<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>

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

</head>

<body class="login-container">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ url('index') }}">
				{{-- <img src="{{asset('global_assets/images/logo_light.png" alt=""> --}}
				<span style="color:wight;font-size:17px;">Home</span>
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
					@if(session()->has('pass-status'))
					<p class="alert {{ session()->get('alert-class', 'alert-info') }}">{{ session()->get('pass-status') }}</p>
					@endif
					<!-- Simple login form / ref_no getting from controller passing -->
					<form action="<?=url('i_change-password/'.$ref_no);?>" method="POST">
						{{ csrf_field() }}
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Reset your account Password <small class="display-block">Enter your credentials below</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" id="pass" name="pass" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
								@if ($errors->has('pass')) <p style="color:rgb(233, 131, 14);">{{ $errors->first('pass') }}</p> 
								@endif
                                 <span  id="pass-err" style="color:rgb(233, 131, 14);display:none;">Password should contain alpha, numeric, special charecter, and minimum length 6 digits</span>

							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" id="con_pass" name="con_pass" class="form-control" placeholder="Confirm Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								@if ($errors->has('con_pass')) <p style="color:rgb(233, 131, 14);">{{ $errors->first('con_pass') }}</p> @endif
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Reset Password <i class="icon-circle-right2 position-right"></i></button><br>
								 
								{{-- <a href="{{ url('login') }}" class="txt2 bo1">
									SignIn
								</a> --}}
							</div>

							 
						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2020. <a>Onlineedu</a> by <a target="_blank">Madhusudhan</a>
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
	<script>
		$(document).ready(function(){
            $("#pass").change(function(){
                var password=$("#pass").val();
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
                                    $("#pass").val("");
                                }
                            } else{
                                $("#pass-err").css("display","block");
                                $("#pass").val("");
                            }
            });
		});

	</script>

</body>
</html>
