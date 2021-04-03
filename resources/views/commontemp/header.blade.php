<div class="header-area">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <!-- Left Social -->
                    <div class="header-left-social">
                        <ul class="header-social">    
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/madhusudhanrk/"><i class="fab fa-linkedin-in"></i></a></li>
                            <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>  
                                           
                                       
                                        <?php 
                        
                                        if(session()->has('user_login_id_set')){
                                            $user_emailid_set = session()->get('user_login_id_set');   
                                            echo "<li>".$user_emailid_set."</li>";
                                        }else{
                                           echo "<li>Please Login</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    
                                    <ul>    
                                        {{-- <li><a href="regi_instru"><i class="ti-book"></i>Become Instructor</a></li> --}}
                                        <li><a href="login_instru"><i class="ti-dashboard"></i>Instructor Panel</a></li>
                                        <li><a href="admin_login"><i class="ti-dashboard"></i>Admin Panel</a></li>
                                        <?php 
                        
                                        if(session()->has('user_login_id_set')){
                                           
                                            echo "<li><a href='u_logout'><i class='ti-shift-right'></i>"."Logout"."</a></li>";
                                        }else{
                                        ?>
                                            <li><a href="login"><i class="ti-user"></i>SignIn</a></li>
                                            <li><a href="signup"><i class="ti-lock"></i>SignUp</a></li>
                                        <?php
                                        }
                                        ?>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <!-- Logo -->
                    <div class="logo d-none d-lg-block">
                    <a href="{{url('index')}}"><img src="assets/img/logo/logo.png" alt=""></a>
                    </div>
                    <div class="container">
                        <div class="menu-wrapper">
                            <!-- Logo -->
                            <div class="logo logo2 d-block d-lg-none">
                                <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">                                                                                          
                                        <li><a href="index">Home</a></li>
                                        <li><a href="about">About</a></li>
                                        <li><a href="courses">Courses</a></li>
                                        <li><a href="regi_instru">Become Instructor</a></li>
                                        {{-- <li><a href="instructor">Instructors</a></li> --}}
                                        {{-- <li><a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog_details.html">Blog Details</a></li>
                                                <li><a href="elements.html">Element</a></li>
                                            </ul>
                                        </li> --}}
                                        <li><a href="contact">Contact</a></li>
                                        {{-- &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                        <li><a href="login"><i class="ti-user"></i> SignIn</a></li>
                                        <li><a href="signup"><i class="ti-lock"></i> SignUp</a></li> --}}
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            {{-- <div class="header-search d-none d-lg-block">
                                <form action="#" class="form-box f-right ">
                                    <input type="text" name="Search" placeholder="Search Courses">
                                    <div class="search-icon">
                                        <i class="fas fa-search special-tag"></i>
                                    </div>
                                </form>
                            </div> --}}
                            
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>