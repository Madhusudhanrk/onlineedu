<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Course contents</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset('lassets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset('lassets/css/core.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset('lassets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset('lassets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('global_assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/core/libraries/jquery.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('lassets/js/app.js')}}"></script>
	<!-- /theme JS files -->
	{{-- <script>
		
		
		$(document).ready(function(){
			//check if close element exists. If yes, execute the function
			if($('.close').length() > 0) load_thankyou();
    	});

    function load_thankyou()
    {
        document.addEventListener("contextmenu",function(evt){
			evt.preventDefault();
		});
    }
	</script> --}}
	{{-- <script>
		window.onload = function() {
			document.addEventListener("contextmenu", function(e) {
				e.preventDefault();
				if (event.keyCode == 123) {
					disableEvent(e);
				}
			}, false);

			function disableEvent(e) {
				if (e.stopPropagation) {
					e.stopPropagation();
				} else if (window.event) {
					window.event.cancelBubble = true;
				}
			}
		}
		$(document).contextmenu(function() {
			return false;
		});
		url = $("#doc-pdf-url").val();
		var thePdf = null;
		var scale = 1.58;
		pdfjsLib.getDocument(url).promise.then(function(pdf) {
			thePdf = pdf;
			viewer = document.getElementById('pdf-viewer');
			for (page = 1; page <= pdf.numPages; page++) {
				canvas = document.createElement("canvas");
				canvas.className = 'pdf-page-canvas';
				viewer.appendChild(canvas);
				renderPage(page, canvas);
			}
		});

		function renderPage(pageNumber, canvas) {
			thePdf.getPage(pageNumber).then(function(page) {
				viewport = page.getViewport(scale);
				canvas.height = viewport.height;
				canvas.width = viewport.width;
				page.render({
					canvasContext: canvas.getContext('2d'),
					viewport: viewport
				});
			});
		}
		$(window).on('load', function() {
			$('#status').fadeOut();
			$('#preloader').delay(400).fadeOut('slow');
			$('body').delay(400).css({
				'overflow': 'visible'
			});
		});
	</script> --}}
</head>

<body>

	<!-- Main navbar -->
	 
	@include('pages.courses_main_navbar')

	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">


				<!-- Content area -->
				<div class="content">

					<!-- Info blocks -->
					<div class="row" id="pdf-viewer">
						 
						@if(count($course_list) > 0)				 

							@foreach ($course_list as $list)
							<div class="col-md-4">
								<div class="panel">
									<div class="panel-body text-center">
										<div class="icon-object border-success text-success"><i class="icon-book"></i></div>
										<h5 class="text-semibold">{{$list->course_name}}</h5>
										<p class="mb-15">{{$list->course_description}}</p>
										<a href="{{url('call_view_pdf/'.$list->course_path)}} " target="_blank" class="btn bg-success-400 ">Learn Free</a>
										{{-- <a href="{{url('storage/course_files/'.$list->course_path."#toolbar=0")}} " target="_blank" class="btn bg-success-400 ">Learn Free</a> --}}
									</div>
								</div>
							</div>
							@endforeach
						@else
							<h2>No Course Available</h2>
						@endif

						 
					</div>
					<!-- /info blocks -->


					 


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2020. <a href="#">Onlineedu</a> by <a href="#">Madhusudhan</a>
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
