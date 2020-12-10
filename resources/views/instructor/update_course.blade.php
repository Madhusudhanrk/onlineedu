<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Course</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{asset('lassets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{asset('lassets/css/core.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{asset('lassets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{asset('lassets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/plugins/loaders/pace.min.js') }}"></script>
	<script src="{{asset('global_assets/js/core/libraries/jquery.min.js') }}"></script>
	<script src="{{asset('global_assets/js/core/libraries/bootstrap.min.js') }}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

	<script src="{{asset('lassets/js/app.js') }}"></script>
	<script src="{{asset('global_assets/js/demo_pages/form_layouts.js') }}"></script>
	<!-- /theme JS files -->

	<!-- form validation------------->
	<script> 
			  
		function isAlphabet(evt){
		 var ch = String.fromCharCode(evt.which); 
		 if(!(/[a-zA-Z ]/.test(ch))){
		   evt.preventDefault();
		 }
		}

		function isDes(evt){
		 var ch = String.fromCharCode(evt.which); 
		 if(!(/[a-zA-Z,. ]/.test(ch))){
		   evt.preventDefault();
		 }
		}
	   
		// function isInputNumber(evt){
		//    phone_number = String.fromCharCode(evt.which);
		//    var reg = /[0-9]/;
		//    if(!(reg.test(phone_number))){
		// 	 evt.preventDefault();
		//    }
		// }
		
	</script>   
		
		 
	<!-- /form validation------------->   

</head>

<body>

	<!-- Main navbar -->
	@include('instructor.main_navbar')
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			@include('instructor.sidebar')

			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><a href="{{url('index')}}">Home</a></span> - Update Course</h4>
						</div>

						{{-- <div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div> --}}
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{url('index')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Update Course</li>
						</ul>

						{{-- <ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul> --}}
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Horizontal form options -->
					<div class="row">
						<div class="col-md-6">

							<!-- Basic layout-->
							<form action="{{url('doupdate_course/'.$course_list->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
								{{ csrf_field() }}
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Course Details</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>
									@if(Session::has('new-course-status'))
									<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('new-course-status') }}
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									</p>
							@endif

									 
									<div class="panel-body">
										<div class="form-group">
										<label class="col-lg-3 control-label">Course Name:</label>
											<div class="col-lg-9">
												<input type="text" name="course_name" class="form-control" value = '<?php echo $course_list->course_name;?>' onkeypress="isAlphabet(event)" minlength="15" maxlength="35" required>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-lg-3 control-label">Course Category:</label>
											<div class="col-lg-9">
												<select class="select" name="course_type" required>
													{{-- <optgroup label="Web development"> --}}
														<option value="{{$course_list->course_type}}">{{$course_list->course_type}}</option> 
														<option value="web">Web development</option>
														{{-- <option value="Larvel">Larvel</option>
														<option value="Python">Python</option>
														<option value="Django">Django</option>
														<option value="HTML">HTML</option> --}}
													</optgroup>
													{{-- <optgroup label="Digital Marketting"> --}}
														<option value="digital">Digital Marketting</option>
														{{-- <option value="ads">Ads</option>														  --}}
													</optgroup>
													{{-- <optgroup label="Graphic Designing"> --}}
														<option value="graphic">Graphic Designing</option>
														{{-- <option value="Painting">Painting</option>									 --}}
													</optgroup>
													{{-- <optgroup label="Languages"> --}}
														<option value="languages">Languages</option>
														{{-- <option value="Telugu">Telugu</option>
														<option value="Kannada">Kannada</option> --}}
													</optgroup>
													{{-- <optgroup label="Hacking"> --}}
														<option value="video">Video Editing</option>
														{{-- <option value="Gain_Access">Gain Access</option> --}}
													</optgroup>
												</optgroup>
												{{-- <optgroup label="Hacking"> --}}
													<option value="app">App Development</option>
													{{-- <option value="Gain_Access">Gain Access</option> --}}
												</optgroup>
												</select>
											</div>
										</div>

										 
										<div class="form-group">
											<label class="col-lg-3 control-label">Upload Course:</label>
											<div class="col-lg-9">
												<?php
													//  $ip = "123.456.789.000"; // some IP address
  													//  $iparr = split ("\.", $ip); 
   
													// 	   print "$iparr[0] <br />";
													 $course_file_fullname = $course_list->course_path;
												 $course_file_name = explode("_", $course_file_fullname);
												?>	
												<span>{{$course_file_name[0]}}</span>
												<input type="file" name="file_uploaded"  accept=".pdf" required class="file-styled"  >
												<span class="help-block">Accepted formats: PDF only.Max file size 25Mb </span>
												@if ($errors->has('file_uploaded')) <p style="color:rgb(233, 131, 14);">{{ $errors->first('file_uploaded') }}</p> 
												@endif
											</div>
										</div>

										 
										<div class="form-group">
											<label class="col-lg-3 control-label">Course Description:</label>
											<div class="col-lg-9">
												<textarea name="course_description" onkeypress="isDes(event)"  minlength="20" maxlength="100"  rows="5" cols="5" class="form-control" placeholder="Enter Your Course Description here" required>{{$course_list->course_description}}</textarea>
											</div>
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary">Update Course <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<!-- /basic layout -->

						</div>

						 
					</div>
					<!-- /vertical form options -->


					 


					<!-- Footer -->
					{{-- <div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div> --}}
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
