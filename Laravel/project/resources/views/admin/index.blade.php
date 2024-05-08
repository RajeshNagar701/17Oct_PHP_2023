<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{url('admin/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{url('admin/assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="{{url('admin/assets/img/logo-invoice.png')}}" />
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                <div class="panel-body">
                    <form action="{{url('adminloginauth')}}" role="form" method="post">
                        @csrf
                        <hr />
                        <h5>Enter Details to Login</h5>
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" value="<?php if (isset($_COOKIE['anm'])) echo $_COOKIE['anm']; ?>" name="anm" class="form-control" placeholder="Your Username " />
                            @error('anm')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" value="<?php if (isset($_COOKIE['apass'])) echo $_COOKIE['apass']; ?>" name="apass" class="form-control" placeholder="Your Password" />
                            @error('apass')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="rem" value="rem" /> Remember me
                            </label>

                        </div>
                        <input type="submit" name="adminlogin" value="Login Now" class="btn btn-primary ">
                        <hr />

                    </form>
                </div>

            </div>


        </div>
    </div>

</body>

</html>