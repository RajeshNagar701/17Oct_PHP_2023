@extends('admin.layout.structure')
@section('maincode')
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Manage User</h1>
               
            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-12">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Manage User
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
										<th>Gender</th>
										<th>Hobby</th>
										<th>COuntry id</th>
										<th>Image</th>
                                        <th align="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									if(!empty($customers_arr))
									{
										foreach($customers_arr as $data)
										{
										?>
											<tr>
												<td><?php echo $data->id;?></td>
												<td><?php echo $data->name;?></td>
												<td><?php echo $data->email;?></td>
												<td><?php echo $data->gender;?></td>
												<td><?php echo $data->hobby;?></td>
												<td><?php echo $data->cnm;?></td>
												<td><img src="../website/img/customer/<?php echo $data->img;?>" width="100px"></td>
												<td  align="center">
													<a href="manage_user/<?php echo $data->id;?>" class="btn btn-danger" >Delete</a>
													<a href="status?status_uid=<?php echo $data->id;?>" class="btn btn-primary"><?php echo $data->status;?></a>
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
@endsection