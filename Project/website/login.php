<?php

if(isset($_SESSION['userid']))
{
	echo "<script>
		window.location='index';
	</script>";
}
include_once('header.php');
?>

        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Login Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Login Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
				<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Get In Touch</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                        eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 offset-lg-3 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h2 class="mb-4">Login Us</h2>
                                <form action="" method="post">
                                    <div class="row g-3">
                                       
                                        <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="email" class="form-control border-0" id="email" name="email" placeholder="Your Email">
                                                <label for="email">Your Email</label>
                                            </div>
                                        </div>
										 <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="password" class="form-control border-0" id="password" name="password"  placeholder="Your Password">
                                                <label for="name">Your Password</label>
                                            </div>
                                        </div>
                                       
                                        <div class="col-12">
                                            <input class="btn btn-primary w-100 py-3 mb-5" type="submit" name="login" value="Login Here">
											<a href="signup">Not Registered yet then Click Here for Signup</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
				
                <div class="row g-4 mb-5">
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <h6>123 Street, New York, USA</h6>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa fa-envelope-open fa-2x text-primary"></i>
                        </div>
                        <h6>info@example.com</h6>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <h6>+012 345 6789</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
<?php
include_once('footer.php');
?>