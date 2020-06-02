@extends('master')

@section('konten')
	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{ asset('frontend/images/courses_background.jpg')}}"></div>
		</div>
		<div class="home_content">
			<h1>Courses</h1>
		</div>
	</div>

	<!-- Popular -->

	<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Available Courses</h1>
					</div>
				</div>
			</div>

			
			<div class="row course_boxes">
				<!-- Popular Course Item -->
				@foreach($course as $crs)
				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="{{ asset('frontend/images/course_1.jpg')}}" alt="https://unsplash.com/@kellybrito">
						<div class="card-body text-center">
							<div class="card-title"><a> {{ $crs['course_name'] }} </a></div>
							<div class="card-text"> {{ $crs['course_desc'] }} </div>
						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="{{ asset('frontend/images/author.jpg')}}" alt="https://unsplash.com/@mehdizadeh">
							</div>
							<div class="course_author_name">Michael Smith, <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$  {{ $crs['price'] }}</span> </div>
						</div>
					</div>
				</div>
				@endforeach
			</div>

		</div>		
	</div>