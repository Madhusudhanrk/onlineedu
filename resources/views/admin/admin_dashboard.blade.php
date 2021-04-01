<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>

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
	<script src="global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="global_assets/js/plugins/pickers/daterangepicker.js"></script>

	<script src="lassets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/dashboard.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	@include('admin.main_navbar')
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			@include('admin.sidebar')
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="{{url('index')}}"><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span></a> - Dashboard</h4>
						</div>

						 
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
						<li><a href="{{url('index')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Dashboard</li>
						</ul>

						 
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Main charts -->
					<div class="row">
						<div class="col-lg-10">

							<!-- Traffic sources  also Quick stats boxes  -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Traffic sources</h6>
									 
								</div>

								<div class="container-fluid">
									 
							<!-- Quick stats boxes -->
							<div class="row">
								<div class="col-lg-6">

									<!-- Members online -->
									<div class="panel bg-teal-400">
										<div class="panel-body">
											{{-- <div class="heading-elements">
												<span class="heading-text badge bg-teal-800">+53,6%</span>
											</div> --}}
											<h3>Admin</h3>

											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
											</div>
											<h3 class="no-margin">{{$data[0]}}</h3>
											Admins in Onlineedu
											<div class="text-muted text-size-small">New Admin: {{$data[1]}} </div>
											<div class="text-muted text-size-small">Create At: {{date('d-m-Y / h:i', strtotime($data[2]))}} </div>
										</div>

										<div class="container-fluid">
											<div id="members-online"></div>
										</div>
									</div>
									<!-- /members online -->

								</div>

								<div class="col-lg-6">

									<!-- Current server load -->
									<div class="panel bg-pink-400">
										<div class="panel-body">
											{{-- <div class="heading-elements">
												<ul class="icons-list">
							                		<li class="dropdown">
							                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
															<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
															<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
															<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
														</ul>
							                		</li>
							                	</ul>
											</div> --}}
											<h3>User</h3>

											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
						                	</div>

											<h3 class="no-margin">{{$data[3]}}</h3>
											Users in Onlineedu
											<div class="text-muted text-size-small">New User: {{$data[4]}} </div>
											<div class="text-muted text-size-small">Create At: {{date('d-m-Y / h:i', strtotime($data[5]))}} </div>
										</div>

										<div id="server-load"></div>
									</div>
									<!-- /current server load -->

								</div>

								 
							</div>

							<div class="row">

								<div class="col-lg-6">

									<!-- Today's revenue -->
									<div class="panel bg-blue-400">
										<div class="panel-body">
											<h3>Course</h3>

											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
						                	</div>

											<h3 class="no-margin">{{$data[6]}}</h3>
											Total Courses
											<div class="text-muted text-size-small">Latest Course Instructor: {{$data[7]}}</div>
											<div class="text-muted text-size-small">Create At: {{date('d-m-Y / h:i', strtotime($data[8]))}} </div>
										</div>

										<div id="today-revenue"></div>
									</div>
									<!-- /today's revenue -->

								</div>

								<div class="col-lg-6">

									<!-- Members online -->
									<div class="panel bg-teal-400">
										<div class="panel-body">
											{{-- <div class="heading-elements">
												<span class="heading-text badge bg-teal-800">+53,6%</span>
											</div> --}}
											<h3>Category</h3>

											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
						                	</div>

											<h3 class="no-margin">{{$data[9]}}</h3>
											No Of Categories
											<div class="text-muted text-size-small">Course Name: {{$data[10]}}</div>
											<div class="text-muted text-size-small">Course Type: {{$data[11]}}</div>
											
										</div>

										<div class="container-fluid">
											<div id="members-online"></div>
										</div>
									</div>
									<!-- /members online -->

								</div>
							</div>

							<div class="row">

								<div class="col-lg-6">

									<!-- Current server load -->
									<div class="panel bg-pink-400">
										<div class="panel-body">
											{{-- <div class="heading-elements">
												<ul class="icons-list">
							                		<li class="dropdown">
							                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
															<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
															<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
															<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
														</ul>
							                		</li>
							                	</ul>
											</div> --}}
											<h3>Instructor</h3>

											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
						                	</div>

											<h3 class="no-margin">{{$data[12]}}</h3>
												No Of Instructor
											<div class="text-muted text-size-small">Instructor Name: {{$data[13]}}</div>
											<div class="text-muted text-size-small">Create At: {{date('d-m-Y / h:i', strtotime($data[14]))}} </div>
										</div>

										<div id="server-load"></div>
									</div>
									<!-- /current server load -->

								</div>
								 
								<div class="col-lg-6">

									<!-- Today's revenue -->
									<div class="panel bg-blue-400">
										<div class="panel-body">
											<h3>Count</h3>
											<div class="heading-elements">
												
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
						                	</div>

											{{-- <h3 class="no-margin">$18,390</h3>
											Today's revenue --}}
											<div class="text-muted text-size-small">ADMINS      : {{$data[15]}}</div>
											<div class="text-muted text-size-small">USERS       : {{$data[16]}}</div>
											<div class="text-muted text-size-small">COURSES     : {{$data[17]}}</div>
											<div class="text-muted text-size-small">INSTRUCTORS : {{$data[18]}}</div>
											<div class="text-muted text-size-small">CATAGORIES  : {{$data[19]}}</div>
										</div>

										<div id="today-revenue"></div>
									</div>
									<!-- /today's revenue -->

								</div>
								 

								

								 
							</div>
							<!-- /Quick stats boxes -->
								</div>

								<div class="position-relative" id="traffic-sources"></div>
							</div>
							<!-- /traffic sources -->

						</div>

						 
					</div>
					<!-- /main charts -->


					<!-- Dashboard content -->
					 
					<!-- /dashboard content -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2020. <a href="">Onlineedu</a> by <a href="" target="_blank">Madhusudhan</a>
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
