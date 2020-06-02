@extends('master')

@section('konten')

	<div class="register">

		<div class="container-fluid">
			
			<div class="row row-eq-height">
				<div class="col-lg-6 nopadding">
					
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center"> 
						<div class="register_content text-center">
							<h1 class="register_title">Register now and get a discount <span>50%</span> discount until 1 January</h1>
							<p class="register_text">We are open on Monday till Friday. Book the course first by fill your
							identity below and click BOOK NOW. For continued registration we will contact you via the telephone number or email you have specified in the form below.</p>
							<div class="button button_1 register_button mx-auto trans_200"><a href="#">book now</a></div>
						</div>
					</div>

				</div>

				<div class="col-lg-6 nopadding">
					
					<!-- Search -->
					<div class="hamburger_container">
						<i class="fas fa-bars trans_200"></i>
					</div>
					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div style="background-image:url({{ asset('frontend/images/search_background.jpg')}}" class="search_background" ></div> <br> <br> <br> <br> <br>
						<div class="search_content text-center">
							<h1 class="search_title">REGISTER AS STUDENT</h1>

							@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
							<form action="/student" method="POST" enctype="multipart/form-data" id="search_form" >
								{{ csrf_field() }}
								<input  name="name"  type="text" placeholder="Student Name" required="required" data-error="Course name is required."  class="input_field search_form_category" id="search_form_name">
								<input  type="text" placeholder="Email" name="email" id="search_form_name"  class="input_field search_form_category" id="search_form_category">
								<input  type="text" placeholder="Subject Course" name="subject_course"  class="input_field search_form_category" id="search_form_degree">
								<input  type="text" placeholder="Address" name="address"  class="input_field search_form_category" id="search_form_degree">
								<input  type="text" placeholder="Phone Number" name="phone_number"  class="input_field search_form_category" id="search_form_degree">
								<input type="submit" value="Submit" name="submit"  class="search_submit_button trans_200">
							</form>

						</div> 
					</div>

				</div>
			</div>
		</div>
	</div>
		@endsection

