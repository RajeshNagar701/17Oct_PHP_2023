<?php

if(isset($_SESSION['userid']))
{
}
else
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
                <h1 class="display-2 text-white animated slideInDown mb-4">Edit Profile</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Edit Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
				<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Edit Profile</h1>
                  
                </div>
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 offset-lg-3 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h2 class="mb-4">Edit Profile</h2>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row g-3">
										<div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" value="<?php echo $fetch->name?>" class="form-control border-0" name="name" id="text" placeholder="Your Name">
                                                <label for="text">Your Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="email" value="<?php echo $fetch->email?>" class="form-control border-0" name="email" id="email" placeholder="Your Email">
                                                <label for="email">Your Email</label>
                                            </div>
                                        </div>
									
										<div class="col-sm-12">
                                            <div class="form-floating">
												<label for="name" class="mb-5">Your Gender</label><br><br>
                                                Male: <input type="radio" name="gender" value="Male" <?php
												$gender=$fetch->gender;
												if($gender=="Male")
												{
													echo "checked";
												}
												?>>
												Female: <input type="radio" name="gender" value="Female" <?php
												$gender=$fetch->gender;
												if($gender=="Female")
												{
													echo "checked";
												}
												?>>
                 
                                            </div>
                                        </div>
										<div class="col-sm-12">
                                            <div class="form-floating">
												<label for="name" class="mb-5">Your Hobby</label><br><br>
                                                Cricket: <input type="checkbox" name="hobby[]"  value="Cricket"
												<?php
												$hobby=$fetch->hobby;
												$arr_hobby=explode(",",$hobby);
												if(in_array("Cricket",$arr_hobby))
												{
													echo "checked";
												}
												?>>
												Singing: <input type="checkbox"  name="hobby[]" value="Singing"<?php
												$hobby=$fetch->hobby;
												$arr_hobby=explode(",",$hobby);
												if(in_array("Singing",$arr_hobby))
												{
													echo "checked";
												}
												?>>
												Reading: <input type="checkbox" name="hobby[]" value="Reading"<?php
												$hobby=$fetch->hobby;
												$arr_hobby=explode(",",$hobby);
												if(in_array("Reading",$arr_hobby))
												{
													echo "checked";
												}
												?>>
                                            </div>
                                        </div>
										 <div class="col-sm-12">
                                            <div class="form-floating">
												<label for="name">Your Country</label><br><br>
                                                <select class="form-control border-0" name="cid" required>
													<option value="">Select Country</option>
													<?php
													foreach($arr_cuuntries as $c)
													{
														if($c->cid==$fetch->cid)
														{
													?>
														<option value="<?php echo $c->cid?>" selected>
															<?php echo $c->cnm?>
														</option>
													<?php	
														}
														else
														{
														?>
														<option value="<?php echo $c->cid?>">
															<?php echo $c->cnm?>
														</option>	
														<?php
														}
													}
													?>
													
												</select>
                                            </div>
                                        </div>
										 <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="file" class="form-control border-0" name="img" >
												<img src="img/customer/<?php echo $fetch->img?>" width="100px"/>
                                                <label for="email">Your Image</label>
                                            </div>
                                        </div>
                                       
                                        <div class="col-12">
                                            <input type="submit" name="save" value="Save" class="btn btn-primary w-100 py-3 mb-5" >
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