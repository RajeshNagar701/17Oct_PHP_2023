@extends('admin.layout.structure')
@section('maincode')
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Manage Contact</h1>
               
            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-12">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Manage Inquiry
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th align="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
									if(!empty($contact_arr))
									{
										foreach($contact_arr as $data)
										{
										?>
											<tr>
												<td><?php echo $data->id;?></td>
												<td><?php echo $data->name;?></td>
												<td><?php echo $data->email;?></td>
												<td><?php echo $data->msg;?></td>
												<td  align="center">
													<a href="manage_contact/<?php echo $data->id;?>" class="btn btn-danger" >Delete</a>
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