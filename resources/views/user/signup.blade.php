
{{-- -------- -- -----------------}}
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
    <title>User Register</title>

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
                    $("#userpassword").change(function(){
                        var password=$("#userpassword").val();
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
                                            $("#userpassword").val("");
                                        }
                                    } else{
                                        $("#pass-err").css("display","block");
                                        $("#userpassword").val("");
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
                    <h2 class="title">User Registration</h2>
                </div>
                
                <div class="card-body">
                    @if(Session::has('register-status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('register-status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </p>
			@endif
                    <form action="createuser" method="POST">
                        {{ csrf_field() }}
                         
                        
                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username" onkeypress="isAlphabet(event)" minlength="3" maxlength="20" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="useremail" required>
                                </div>
                            </div>
                        </div>

                       
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="userpassword" id="userpassword" minlength="6" maxlength="8" required>
                                </div>
                                @if ($errors->has('userpassword')) <p style="color:rgb(233, 131, 14);">{{ $errors->first('userpassword') }}</p> 
                                    @endif
                                <span  id="pass-err" style="color:rgb(233, 131, 14);display:none;">Password should contain alpha, numeric, special charecter, and minimum length 6 digits</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Confirm Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" id="usercpassword" name="usercpassword" minlength="6" maxlength="8" required>
                                </div>
                                @if ($errors->has('usercpassword')) <p style="color:rgb(233, 131, 14);">{{ $errors->first('usercpassword') }}</p> @endif
                            </div>
                        </div>

                         
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                            <span class="txt2">
                                &nbsp; Already member?
                            </span>
    
                        <a href="{{url('login')}}" class="txt2 bo1">
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