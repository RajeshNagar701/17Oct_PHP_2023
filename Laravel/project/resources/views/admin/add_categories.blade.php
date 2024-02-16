@extends('admin.layout.structure')
@section('maincode')
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Add Categories</h1>
            </div>
        </div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Add Categories
                    </div>
                    <div class="panel-body">
						<form action="" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label>Enter Categories Name</label>
								<input class="form-control" type="text" name="name" required>
							</div>
						   <div class="form-group">
								<label>Upload Image</label>
								<input class="form-control" type="file" name="img" required>
								
							</div>

							<input type="submit" class="btn btn-info" name="submit" value="submit">
						</form>
                    </div>
                </div>
            </div>
       

        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
@endsection