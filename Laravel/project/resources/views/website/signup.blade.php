@extends('website.layout.structure')
@section('maincode')

        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Signup Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Signup Us</li>
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
                                <h2 class="mb-4">Signup Us</h2>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{url('/insertsignup')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
										<div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" value="{{ old('name')}}" class="form-control border-0" name="name" id="text" placeholder="Your Name">
                                                <label for="text">Your Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="email" value="{{ old('email')}}" class="form-control border-0" name="email" id="email" placeholder="Your Email">
                                                <label for="email">Your Email</label>
                                            </div>
                                        </div>
										 <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="password" class="form-control border-0" name="password" id="password" placeholder="Your Password">
                                                <label for="name">Your Password</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="number" value="{{ old('mobile')}}" class="form-control border-0" name="mobile" id="password" placeholder="Your Mobile">
                                                <label for="name">Your Mobile</label>
                                            </div>
                                        </div>
										<div class="col-sm-12">
                                            <div class="form-floating">
												<label for="name" class="mb-5">Your Gender</label><br><br>
                                                Male: <input type="radio" name="gender" value="Male" {{ old("gender") == 'Male' ? 'checked' : '' }} />
												Female: <input type="radio" name="gender" value="Female"  {{ old("gender") == 'Female' ? 'checked' : '' }} />
                 
                                            </div>
                                        </div>
										<div class="col-sm-12">
                                            <div class="form-floating">
												<label for="name" class="mb-5">Your Hobby</label><br><br>
                                                Cricket: <input type="checkbox" name="hobby[]"  value="Cricket" {{(is_array(old('hobby')) && in_array('Cricket', old('hobby'))) ? ' checked' : '' }} />
												Singing: <input type="checkbox"  name="hobby[]" value="Singing" {{(is_array(old('hobby')) && in_array('Singing', old('hobby'))) ? ' checked' : '' }} />
												Reading: <input type="checkbox" name="hobby[]" value="Reading"  {{(is_array(old('hobby')) && in_array('Reading', old('hobby'))) ? ' checked' : '' }} />
                                            </div>
                                        </div>
										 <div class="col-sm-12">
                                            <div class="form-floating">
												<label for="name">Your Country</label><br><br>
                                                <select class="form-control border-0" name="cid">
													<option value="">Select Country</option>
													<?php
													foreach($arr_cuuntries as $c)
													{
													?>
														<option value="<?php echo $c->id?>" @if (old('cid') == $c->id) {{ 'selected' }} @endif ><?php echo $c->cnm?></option>
													<?php	
													}
													?>
													
												</select>
                                            </div>
                                        </div>
										 <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="file" class="form-control border-0" name="img" >
                                                <label for="email">Your Image</label>
                                            </div>
                                        </div>
                                       
                                        <div class="col-12">
                                            <input type="submit" name="submit" value="Signup Here" class="btn btn-primary w-100 py-3 mb-5" >
											<a href="login">Already Registered then Click Here for Login</a>
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
@endsection