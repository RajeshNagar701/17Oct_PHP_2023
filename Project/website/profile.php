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

        <!-- Call To Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
				<h1 align="center">My Profile</h1>
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="img/customer/<?php echo $fetch->img?>" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4">Name : <?php echo $fetch->name?></h1>
                                <p class="mb-4">Email : <?php echo $fetch->email?></p>
								 <p class="mb-4">Gender : <?php echo $fetch->gender?></p>
								  <p class="mb-4">Hobby : <?php echo $fetch->hobby?></p>
								   <p class="mb-4">Country : <?php echo $fetch->cid?></p>
                                <a class="btn btn-primary py-3 px-5" href="edit_user?edit_uid=<?php echo $fetch->uid?>">Edit Profile<i class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

<?php
include_once('footer.php');
?>
       