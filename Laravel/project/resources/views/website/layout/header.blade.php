<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AVN - Preschool Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{url('website/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('website/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('website/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('website/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{url('website/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
		<?php
		function active($currect_page){
		  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
		  $url = end($url_array);  
		  if($currect_page == $url){
			  echo 'active'; //class name in css 
		  } 
		}
		?>

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="/index" class="navbar-brand">
                <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>AVN</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="/" class="nav-item nav-link <?php active('index')?>">Home</a>
                    <a href="about" class="nav-item nav-link <?php active('about')?>">About Us</a>
                    <a href="classes" class="nav-item nav-link <?php active('classes')?>">Classes</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Student Portal</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="facility" class="dropdown-item">School Facilities</a>
                            <a href="team" class="dropdown-item">Popular Teachers</a>
                            <a href="call-to-action" class="dropdown-item">Become A Teachers</a>
                            <a href="appointment" class="dropdown-item">Make Appointment</a>
                            <a href="testimonial" class="dropdown-item">Testimonial</a>
                            <a href="404" class="dropdown-item">404 Error</a>
                        </div>
                    </div>
                    <a href="contact" class="nav-item nav-link <?php active('contact')?>">Contact Us</a>
				<?php
				if(session()->has('userid'))
				{
				?>
					<a href="profile" class="nav-item nav-link <?php active('profile')?>">My Accout</a>
				<?php
				}
				?>
					
				
				</div>
				
				<?php
				if(session()->has('userid'))
				{
				?>
				<a href="logout" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Logout<i class="fa fa-arrow-right ms-3"></i></a>
				<a href="login" class="ms-2 btn btn-primary rounded-pill px-3 d-none d-lg-block">Hi..{{session()->get('name')}} <i class="fa fa-user ms-3"></i></a>
				<?php
				}
				else
				{
				?>
					<a href="login" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Login Us<i class="fa fa-arrow-right ms-3"></i></a>
					
				<?php
				}
				?>
					
				
			</div>
        </nav>
        <!-- Navbar End -->
