﻿<?php
include_once('header.php');
?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Manage Product</h1>
               
            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-12">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Manage Product
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Cate_id</th>
                                        <th align="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
									if(!empty($product_arr))
									{
										foreach($product_arr as $data)
										{
										?>
											<tr>
												<td><?php echo $data->p_id;?></td>
												<td><?php echo $data->p_name;?></td>
												<td><?php echo $data->p_price;?></td>
												<td><?php echo $data->cate_id;?></td>
												<td  align="center">
													<button class="btn btn-danger">Delete</button>
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