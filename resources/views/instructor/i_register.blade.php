<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Instructor Register</title>

    <!-- Icons font CSS-->
    <link href="in_r_assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="in_r_assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="in_r_assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="in_r_assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="in_r_assets/css/main.css" rel="stylesheet" media="all">
    <!-- added bootstrap for alert message-->
    <link rel="stylesheet" type="text/css" href="login_ass/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Core JS files -->
	<script src="{{asset('global_assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script src="{{asset('global_assets/js/core/libraries/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- form validation------------->
		<script> 
			  
            function isAlphabet(evt){
             var ch = String.fromCharCode(evt.which); 
             if(!(/[a-zA-Z]/.test(ch))){
               evt.preventDefault();
             }
            }
           
            function isInputNumber(evt){
               phone_number = String.fromCharCode(evt.which);
               var reg = /[0-9]/;
               if(!(reg.test(phone_number))){
                 evt.preventDefault();
               }
            }
            
        </script>   

        <script>
            $(document).ready(function(){
                $("#instructor_password").change(function(){
                    var password=$("#instructor_password").val();
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
                                        $("#instructor_password").val("");
                                    }
                                } else{
                                    $("#pass-err").css("display","block");
                                    $("#instructor_password").val("");
                                }
                });
            });

        </script>
            
             
        <!-- /form validation------------->     

</head>

<body>
   
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Instructor Registration Form</h2>
                </div>
                
                <div class="card-body">
                    @if(Session::has('register-status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('register-status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </p>
			@endif
                    <form action="registerinstructor" method="POST" autocomplete="on">
                        {{ csrf_field() }}
                        {{-- <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-8">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name">
                                            <label class="label--desc">first name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name">
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        
                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="instructor_name" onkeypress="isAlphabet(event)" minlength="3" maxlength="20" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="instructor_email" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="instructor_area_code" onkeypress="isInputNumber(event)" minlength="1" maxlength="4" required>
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="instructor_phone" onkeypress="isInputNumber(event)" minlength="10" maxlength="10" required>
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="instructor_password" id="instructor_password" minlength="4" maxlength="8" required>
                                </div>
                                @if ($errors->has('instructor_password')) <p style="color:rgb(233, 131, 14);">{{ $errors->first('instructor_password') }}</p> 
                                @endif
                            <span  id="pass-err" style="color:rgb(233, 131, 14);display:none;">Password should contain alpha, numeric, special charecter, and minimum length 6 digits</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Confirm Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="instructor_cpassword" id="instructor_cpassword" minlength="4" maxlength="8" required>
                                </div>
                                @if ($errors->has('instructor_cpassword')) <p style="color:rgb(233, 131, 14);">{{ $errors->first('instructor_cpassword') }}</p> @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Qualification</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="instructor_qualification" minlength="2" maxlength="30" required>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-row">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row p-t-20">
                            <label class="label label--block">Are you an existing customer?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> --}}
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                            <span class="txt2">
                                &nbsp; Already member?
                            </span>
    
                            <a href="{{url('login_instru')}}" class="txt2 bo1">
                                Sign In
                            </a>
                        </div>
                         
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="in_r_assets/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="in_r_assets/vendor/select2/select2.min.js"></script>
    <script src="in_r_assets/vendor/datepicker/moment.min.js"></script>
    <script src="in_r_assets/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="in_r_assets/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->