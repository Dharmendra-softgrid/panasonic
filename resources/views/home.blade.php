@extends('layouts.app')


@section('content')
<section class="top_banner">
  	<div class="home_banner_sec">
      	<div class="slide_item">
		  	@if($sliders->isNotEmpty())
            	@foreach($sliders as $i=>$slider)
				<div class="banner_img">
					<img src="{{asset(isset($slider->image) ? 'images/'.$slider->image : 'images/computerbanner.jpg')}}">
				</div>
				<div class="container">
					<div class="banner_caption">
						<h3>{{$slider->slide_title}}</h3>
					</div>
				</div>
				@endforeach
			@endif
    	</div>
	</div>
</section>

<section class="solution_sec sec_padd">
	<div class="container">
		<div class="head_cmn text-center">
			<h2 class="head_2">{{$first_sec_content->title}}</h2>
		</div>
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="sec_p text-center">
					<p>{{strip_tags($first_sec_content->content)}}</p>
				</div>
			</div>
		</div>
	</div>		
</section>

<section class="home_about_sec sec_padd gray-bg">
	<div class="container">
		<div class="head_cmn text-center">
			<h2 class="head_2">{{$second_sec_content->title}}</h2>
		</div>

		<div class="row">
		@if($displaysolutions->isNotEmpty())
            @foreach($displaysolutions as $i=>$displaysolution)
			<div class="col-12 col-lg-3">
				<div class="solution_item">
					<figure>
						<img src="{{asset(isset($displaysolution->image) ? 'images/'.$displaysolution->image : 'images/computerbanner.jpg')}}" alt="blog img">
					</figure>
					<div class="item_body">

						<div class="body-link">
							<a href="#" class="link">{{$displaysolution->title}}<span class="arrow-right"><img src="{{asset('/')}}images/Icon-arrow-right.svg"></span></a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		@endif			
		</div>
	</div>
</section>

<section class="industry_sec sec_padd blue-bg">
	<div class="container">

		<div class="head_cmn text-center white-text">
			<h2 class="head_2">{{$third_sec_content->title}}</h2>
			<p>{{strip_tags($third_sec_content->content)}}</p>
		</div>

		<div class="row align-items-center">
			<!-- User this HTML for Slider -->
			<div class="industry_banner banner-content clearfix">
				<div class="banner-slider">
					<div class="slider slider-for">

					@if($products->isNotEmpty())
            			@foreach($products as $i=>$product)
						<div class="slider-banner-image">
							<img src="{{asset(isset($product->featured_image) ? 'images/'.$product->featured_image : 'images/computerbanner.jpg')}}" alt="industry img">
							<div class="industry_caption">
								<h3>{{$product->title}}</h3>
							</div>
						</div>
						@endforeach
					@endif
					</div>

					<div class="slider slider-nav thumb-image industry_banner_thumb">
					@if($products->isNotEmpty())
            			@foreach($products as $i=>$product)
						<div class="thumbnail-image">
							<div class="thumbImg">
								<img src="{{asset(isset($product->featured_image) ? 'images/'.$product->featured_image : 'images/computerbanner.jpg')}}" alt="industry img">
							</div>
							<h4>{{$product->title}}</h4>
						</div>
						@endforeach
					@endif						
					</div>
				</div>
			</div>
			<!-- End User this HTML for Slider -->
		</div>
	</div>
</section>

<section class="industry_service sec_padd">
	<div class="container">
		<div class="head_cmn text-center">
			<h2 class="head_2">{{$fourth_sec_content->title}}</h2>
		</div>
		<?php //echo"<pre>";print_r($industries);echo"</pre>";?>
		<div class="row align-items-center">
		@if($industries->isNotEmpty())
            @foreach($industries as $i=>$industry)
			<div class="col-md-4">
				<div class="industry_service_block">
					<div class="icon"><img src="{{asset(isset($industry->banner_image) ? 'images/'.$industry->banner_image : 'images/computerbanner.jpg')}}"></div>
					<h4>{{$industry->title}}</h4>
				</div>
			</div>
			@endforeach
		@endif			
		</div>
	</div>
</section>

<section class="case_studies sec_padd gray-bg Success_stories">
	<div class="container">
		<div class="head_cmn text-center">
			<h2 class="head_2">{{$fifth_sec_content->title}}</h2>
			<p>{{strip_tags($fifth_sec_content->content)}}</p>
		</div>

		<div class="case_studies_slider">		
		@if($successstories->isNotEmpty())
            @foreach($successstories as $i=>$successstory)
			<div class="product_slide">
				<div class="product_item">
					<figure>
						<img src="{{asset(isset($successstory->banner_image) ? 'images/'.$successstory->banner_image : 'images/computerbanner.jpg')}}" alt="case studies">
					</figure>
					<div class="item_body">
						<h4>{{$successstory->title}}</h4>
						<div class="read-more-link text-start">
							<a href="{{ url('success-story/'.$successstory->slug) }}">Read More</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		@endif			
		</div>
	</div>
</section>

<section class="newsroom_sec sec_padd ">
	<div class="container">
		<div class="head_cmn text-center">
			<h2 class="head_2">{{$sixth_sec_content->title}}</h2>
		</div>
		<div class="row">
			<div class="col-md-6 col-12">
			@if($newsrooms->isNotEmpty())
            	@foreach($newsrooms as $i=>$newsroom)
					@if ($loop->iteration == 2)
						@break
					@endif
				<div class="news_block">
					<div class="news_thumbnail new_left">
						<figure>
							<img src="{{asset(isset($newsroom->image) ? 'images/'.$newsroom->image : 'images/computerbanner.jpg')}}"/>
						</figure>
						<div class="news-content">
							<h4>{{$newsroom->title}}</h4>
							<a href="{{ url('newsRoomDetail/'.$newsroom->slug) }}" class="btn read_more">Know More</a>
						</div>
					</div>
				</div>
				@endforeach
			@endif
			</div>

			<div class="col-md-6 col-12">
				<div class="news_right row">
				@if($newsrooms->isNotEmpty())
            		@foreach($newsrooms as $i=>$newsroom)
						@if ($loop->first)
							@continue
						@endif
						<div class="col-md-12">
							<div class="news_block">
								<div class="news_thumbnail_list news_right">
									<figure>
										<img src="{{asset(isset($newsroom->image) ? 'images/'.$newsroom->image : 'images/computerbanner.jpg')}}"/>
									</figure>
									<div class="news-content">
										<h4>{{$newsroom->title}}</h4>
										<a href="{{ url('newsRoomDetail/'.$newsroom->slug) }}" class="btn read_more">Know More</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				@endif					
				</div>
			</div>
		</div>
	</div>
</section>

          
@endsection
