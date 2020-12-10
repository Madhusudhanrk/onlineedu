<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Course</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="lassets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="lassets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="lassets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="lassets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="lassets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/form_layouts.js"></script>
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><a href="{{url('index')}}">Home</a></span> - Create Course</h4>
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
							<li class="active">New Course</li>
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
							<form action="docreate_course" method="POST" enctype="multipart/form-data" class="form-horizontal">
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

									{{-- Used for instructor email_id --}}
									{{-- @php
									if(session()->has('instructor_login_emailid_set')){           
									   $instructor_name = session()->get('instructor_login_name_set');
									   $instructor_emailid = session()->get('instructor_login_emailid_set');
									//    $instructor_details = array(
									// 	   'instructor_name' =>$instructor_name ,
									// 	   'instructor_emailid' =>$instructor_emailid 
									//    );
								   }   
								   @endphp --}}
								{{-- <input type="hidden" name="instructor_emailid" value=" "> --}}
									<div class="panel-body">
										<div class="form-group">
										<label class="col-lg-3 control-label">Course Name:</label>
											<div class="col-lg-9">
												<input type="text" name="course_name" class="form-control" onkeypress="isAlphabet(event)" minlength="15" maxlength="35" required>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-lg-3 control-label">Course Category:</label>
											<div class="col-lg-9">
												<select class="select" name="course_type" required>
													{{-- <optgroup label="Web development"> --}}
														 
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
														<option value="language">Languages</option>
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

										{{-- <div class="form-group">
											<label class="col-lg-3 control-label">Password:</label>
											<div class="col-lg-9">
												<input type="password" class="form-control" placeholder="Your strong password">
											</div>
										</div> --}}


										{{-- <div class="form-group">
											<label class="col-lg-3 control-label">Gender:</label>
											<div class="col-lg-9">
												<label class="radio-inline">
													<input type="radio" class="styled" name="gender" checked="checked">
													Male
												</label>

												<label class="radio-inline">
													<input type="radio" class="styled" name="gender">
													Female
												</label>
											</div>
										</div> --}}

										<div class="form-group">
											<label class="col-lg-3 control-label">Upload Course:</label>
											<div class="col-lg-9">
												<input type="file" name="file_uploaded" accept=".pdf" class="file-styled"  >
												<span class="help-block">Accepted formats: PDF only. Max file size 25 Mb</span>
								@if ($errors->has('file_uploaded')) <p style="color:rgb(233, 131, 14);">{{ $errors->first('file_uploaded') }}</p> 
                                @endif
												 
											</div>
										</div>

										{{-- <div class="form-group">
											<label class="col-lg-3 control-label">Tags:</label>
											<div class="col-lg-9">
												<select multiple="multiple" data-placeholder="Enter tags" class="select-icons">
													<optgroup label="Services">
														<option value="wordpress2" data-icon="wordpress2">Wordpress</option>
														<option value="tumblr2" data-icon="tumblr2">Tumblr</option>
														<option value="stumbleupon" data-icon="stumbleupon">Stumble upon</option>
														<option value="pinterest2" data-icon="pinterest2">Pinterest</option>
														<option value="lastfm2" data-icon="lastfm2">Lastfm</option>
													</optgroup>
													<optgroup label="File types">
														<option value="pdf" data-icon="file-pdf">PDF</option>
														<option value="word" data-icon="file-word">Word</option>
														<option value="excel" data-icon="file-excel">Excel</option>
														<option value="openoffice" data-icon="file-openoffice">Open office</option>
													</optgroup>
													<optgroup label="Browsers">
														<option value="chrome" data-icon="chrome" selected="selected">Chrome</option>
														<option value="firefox" data-icon="firefox" selected="selected">Firefox</option>
														<option value="safari" data-icon="safari">Safari</option>
														<option value="opera" data-icon="opera">Opera</option>
														<option value="IE" data-icon="IE">IE</option>
													</optgroup>
												</select>
											</div>
										</div> --}}

										<div class="form-group">
											<label class="col-lg-3 control-label">Course Description:</label>
											<div class="col-lg-9">
												<textarea name="course_description" onkeypress="isDes(event)" minlength="20" maxlength="100"  rows="5" cols="5" class="form-control" placeholder="Enter Your Course Description here" required></textarea>
											</div>
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary">New Course <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<!-- /basic layout -->

						</div>

						<div class="col-md-6">

							<!-- Static mode -->
							<!-- <form class="form-horizontal" action="#">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Static mode</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
										<div class="form-group">
											<label class="col-lg-3 control-label">Name:</label>
											<div class="col-lg-9">
												<div class="form-control-static">Eugene Kopyov</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Password:</label>
											<div class="col-lg-9">
												<input type="password" class="form-control" readonly="readonly" value="********">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Your state:</label>
											<div class="col-lg-9">
												<select class="select" disabled="disabled">
													<optgroup label="Alaskan/Hawaiian Time Zone">
														<option value="AK">Alaska</option>
														<option value="HI">Hawaii</option>
													</optgroup>
													<optgroup label="Pacific Time Zone">
														<option value="CA">California</option>
														<option value="NV" selected="selected">Nevada</option>
														<option value="WA">Washington</option>
													</optgroup>
													<optgroup label="Mountain Time Zone">
														<option value="AZ">Arizona</option>
														<option value="CO">Colorado</option>
														<option value="WY">Wyoming</option>
													</optgroup>
													<optgroup label="Central Time Zone">
														<option value="AL">Alabama</option>
														<option value="AR">Arkansas</option>
														<option value="KY">Kentucky</option>
													</optgroup>
													<optgroup label="Eastern Time Zone">
														<option value="CT">Connecticut</option>
														<option value="DE">Delaware</option>
														<option value="FL">Florida</option>
													</optgroup>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Gender:</label>
											<div class="col-lg-9">
												<label class="radio-inline disabled">
													<input type="radio" class="styled" name="gender" disabled="disabled" checked="checked">
													Male
												</label>

												<label class="radio-inline disabled">
													<input type="radio" class="styled" name="gender" disabled="disabled">
													Female
												</label>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Your avatar:</label>
											<div class="col-lg-9">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="global_assets/images/placeholders/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input type="file" class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Tags:</label>
											<div class="col-lg-9">
												<select multiple="multiple" disabled="disabled" data-placeholder="Enter tags" class="select-icons">
													<optgroup label="Services">
														<option value="wordpress2" data-icon="wordpress2">Wordpress</option>
														<option value="tumblr2" data-icon="tumblr2">Tumblr</option>
														<option value="stumbleupon" data-icon="stumbleupon">Stumble upon</option>
														<option value="pinterest2" data-icon="pinterest2">Pinterest</option>
														<option value="lastfm2" data-icon="lastfm2">Lastfm</option>
													</optgroup>
													<optgroup label="File types">
														<option value="pdf" data-icon="file-pdf">PDF</option>
														<option value="word" data-icon="file-word">Word</option>
														<option value="excel" data-icon="file-excel">Excel</option>
														<option value="openoffice" data-icon="file-openoffice">Open office</option>
													</optgroup>
													<optgroup label="Browsers">
														<option value="chrome" data-icon="chrome" selected="selected">Chrome</option>
														<option value="firefox" data-icon="firefox" selected="selected">Firefox</option>
														<option value="safari" data-icon="safari">Safari</option>
														<option value="opera" data-icon="opera">Opera</option>
														<option value="IE" data-icon="IE">IE</option>
													</optgroup>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Your message:</label>
											<div class="col-lg-9">
												<div class="form-control-static">
													<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment.</p>
												</div>
											</div>
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</form> -->
							<!-- /static mode -->

						</div>
					</div>
					<!-- /vertical form options -->


					<!-- Centered forms -->
					<!-- <div class="row">
						<div class="col-md-6">
							<form class="form-horizontal" action="#">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<div class="row">
											<div class="col-md-10 col-md-offset-1">
												<h5 class="panel-title">Centered form</h5>
												<div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>
								                		<li><a data-action="reload"></a></li>
								                		<li><a data-action="close"></a></li>
								                	</ul>
							                	</div>
											</div>
										</div>
									</div>

									<div class="panel-body">
										<div class="row">
											<div class="col-md-10 col-md-offset-1">
												<div class="form-group">
													<label class="col-lg-3 control-label">Enter your name:</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" placeholder="Eugene Kopyov">
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Enter your password:</label>
													<div class="col-lg-9">
														<input type="password" class="form-control" placeholder="Your strong password">
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Select your state:</label>
													<div class="col-lg-9">
														<select data-placeholder="Select your state" class="select">
															<option></option>
															<optgroup label="Alaskan/Hawaiian Time Zone">
																<option value="AK">Alaska</option>
																<option value="HI">Hawaii</option>
															</optgroup>
															<optgroup label="Pacific Time Zone">
																<option value="CA">California</option>
																<option value="OR">Oregon</option>
																<option value="WA">Washington</option>
															</optgroup>
															<optgroup label="Mountain Time Zone">
																<option value="AZ">Arizona</option>
																<option value="CO">Colorado</option>
																<option value="WY">Wyoming</option>
															</optgroup>
															<optgroup label="Central Time Zone">
																<option value="AL">Alabama</option>
																<option value="KS">Kansas</option>
																<option value="KY">Kentucky</option>
															</optgroup>
															<optgroup label="Eastern Time Zone">
																<option value="CT">Connecticut</option>
																<option value="DE">Delaware</option>
																<option value="WV">West Virginia</option>
															</optgroup>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Attach screenshot:</label>
													<div class="col-lg-9">
														<input type="file" class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Your message:</label>
													<div class="col-lg-9">
														<textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
													</div>
												</div>

												<div class="text-right">
													<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>

						<div class="col-md-6">
							<form class="form-horizontal" action="#">
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h5 class="panel-title">Centered panel</h5>
												<div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>
								                		<li><a data-action="reload"></a></li>
								                		<li><a data-action="close"></a></li>
								                	</ul>
							                	</div>
											</div>

											<div class="panel-body">
												<div class="form-group">
													<label class="col-lg-3 control-label">Enter your name:</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" placeholder="Eugene Kopyov">
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Enter your password:</label>
													<div class="col-lg-9">
														<input type="password" class="form-control" placeholder="Your strong password">
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Select your state:</label>
													<div class="col-lg-9">
														<select data-placeholder="Select your state" class="select">
															<option></option>
															<optgroup label="Alaskan/Hawaiian Time Zone">
																<option value="AK">Alaska</option>
																<option value="HI">Hawaii</option>
															</optgroup>
															<optgroup label="Pacific Time Zone">
																<option value="CA">California</option>
																<option value="NV">Nevada</option>
																<option value="WA">Washington</option>
															</optgroup>
															<optgroup label="Mountain Time Zone">
																<option value="AZ">Arizona</option>
																<option value="CO">Colorado</option>
																<option value="ID">Idaho</option>
															</optgroup>
															<optgroup label="Central Time Zone">
																<option value="AL">Alabama</option>
																<option value="IA">Iowa</option>
																<option value="KS">Kansas</option>
															</optgroup>
															<optgroup label="Eastern Time Zone">
																<option value="CT">Connecticut</option>
																<option value="DE">Delaware</option>
																<option value="WV">West Virginia</option>
															</optgroup>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Attach screenshot:</label>
													<div class="col-lg-9">
														<input type="file" class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Your message:</label>
													<div class="col-lg-9">
														<textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
													</div>
												</div>

												<div class="text-right">
													<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div> -->
					<!-- /form centered -->


					<!-- Fieldset legend -->
					<!--   -->
					<!-- /fieldset legend -->


					<!-- 2 columns form -->
					<!-- <form class="form-horizontal" action="#">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Multiple columns</h5>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>

							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<fieldset>
											<legend class="text-semibold"><i class="icon-reading position-left"></i> Personal details</legend>

											<div class="form-group">
												<label class="col-lg-3 control-label">Enter your name:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" placeholder="Eugene Kopyov">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Enter your password:</label>
												<div class="col-lg-9">
													<input type="password" class="form-control" placeholder="Your strong password">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Select your state:</label>
												<div class="col-lg-9">
													<select data-placeholder="Select your state" class="select">
														<option></option>
														<optgroup label="Alaskan/Hawaiian Time Zone">
															<option value="AK">Alaska</option>
															<option value="HI">Hawaii</option>
														</optgroup>
														<optgroup label="Pacific Time Zone">
															<option value="CA">California</option>
															<option value="NV">Nevada</option>
															<option value="WA">Washington</option>
														</optgroup>
														<optgroup label="Mountain Time Zone">
															<option value="AZ">Arizona</option>
															<option value="CO">Colorado</option>
															<option value="WY">Wyoming</option>
														</optgroup>
														<optgroup label="Central Time Zone">
															<option value="AL">Alabama</option>
															<option value="AR">Arkansas</option>
															<option value="KY">Kentucky</option>
														</optgroup>
														<optgroup label="Eastern Time Zone">
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="WV">West Virginia</option>
														</optgroup>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Attach screenshot:</label>
												<div class="col-lg-9">
													<input type="file" class="file-styled">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Your message:</label>
												<div class="col-lg-9">
													<textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
												</div>
											</div>
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset>
						                	<legend class="text-semibold"><i class="icon-truck position-left"></i> Shipping details</legend>

											<div class="form-group">
												<label class="col-lg-3 control-label">Your name:</label>
												<div class="col-lg-9">
													<div class="row">
														<div class="col-md-6">
															<input type="text" placeholder="First name" class="form-control">
														</div>

														<div class="col-md-6">
															<input type="text" placeholder="Last name" class="form-control">
														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Email:</label>
												<div class="col-lg-9">
													<input type="text" placeholder="eugene@kopyov.com" class="form-control">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Phone #:</label>
												<div class="col-lg-9">
													<input type="text" placeholder="+99-99-9999-9999" class="form-control">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Location:</label>
												<div class="col-lg-9">
													<div class="row">
														<div class="col-md-6">
															<div class="mb-15">
									                            <select data-placeholder="Select your country" class="select">
									                            	<option></option>
									                                <option value="1">Canada</option> 
									                                <option value="2">USA</option> 
									                                <option value="3">Australia</option> 
									                                <option value="4">Germany</option> 
									                            </select>
								                            </div>

								                            <input type="text" placeholder="ZIP code" class="form-control">
														</div>

														<div class="col-md-6">
															<input type="text" placeholder="State/Province" class="form-control mb-15">
															<input type="text" placeholder="City" class="form-control">
														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Address:</label>
												<div class="col-lg-9">
													<input type="text" placeholder="Your address of living" class="form-control">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Additional message:</label>
												<div class="col-lg-9">
													<textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
												</div>
											</div>
										</fieldset>
									</div>
								</div>

								<div class="text-right">
									<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</div>
					</form> -->
					<!-- /2 columns form -->


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
