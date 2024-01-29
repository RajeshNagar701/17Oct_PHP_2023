<?php
include_once('header.php');
?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Manage Categories</h1>
               
            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-12">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Manage Categories
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th align="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								if(!empty($arr_categories))
								{
									foreach($arr_categories as $data)
									{
									?>
										<tr>
											<td><?php echo $data->cate_id;?></td>
											<td><?php echo $data->name;?></td>
											<td>
											<?php echo $data->img;?>
											<img src="assets/img/categories/<?php echo $data->img;?>" width="100px">
											
											</td>
											<td  align="center">
												<a href="delete?del_cate_id=<?php echo $data->cate_id;?>" class="btn btn-danger" >Delete</a>
												<button class="btn btn-primary">Edit</button>
											</td>
										</tr>
									<?php
									}
								}
								?>	
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End  Kitchen Sink -->
            </div>
           
            </div>
        </div>
        

    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<?php

include_once('footer.php')
?>