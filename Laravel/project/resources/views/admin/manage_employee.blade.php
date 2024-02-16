@extends('admin.layout.structure')
@section('maincode')

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Manage Employee</h1>
               
            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-12">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Manage Employee
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th align="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
									if(!empty($employees_arr))
									{
										foreach($employees_arr as $data)
										{
										?>
											<tr>
												<td><?php echo $data->emp_id;?></td>
												<td><?php echo $data->name;?></td>
												<td><?php echo $data->email;?></td>
												<td><?php echo $data->password;?></td>
												<td  align="center">
													<a href="delete?del_emp_id=<?php echo $data->emp_id;?>" class="btn btn-danger" >Delete</a>
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
@endsection