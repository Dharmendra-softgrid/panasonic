@extends('layouts.app')


@section('content')
<section class="top_banner">
  	<div class="home_banner_sec">
      	<div class="slide_item">
          	<div class="banner_img">
            	<img src="{{asset('/')}}images/home_top_banner.jpg">
          	</div>
          	<div class="container">
             	<div class="banner_caption">
              		<h3>DESIGN FOR THE BETTER WORLD FOR BETTER DIGITAL DISPLAY.</h3>
             	</div>
        	</div>
    	</div>
	</div>
</section>

<section class="solution_sec sec_padd">
	<div class="container">
		<div class="head_cmn text-center">
			<h2 class="head_2">THE SOLUTION FOR ALL YOUR DISPLAY NEEDS</h2>
		</div>
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="sec_p text-center">
					<p>Panasonic’s Digital Signage Solution ecosystem includes hardware, software, and services that work holistically together to provide the right-sized display for any scenario. Our exceptional solutions combine the highest quality high-definition (HD) and 4K professional displays, interactive technologies and network-based multimedia content into dynamic systems that work for your business.</p>
				</div>
			</div>
		</div>
	</div>		
</section>

<section class="home_about_sec sec_padd gray-bg">
	<div class="container">
		<div class="head_cmn text-center">
			<h2 class="head_2">END-TO-END DISPLAY SOLUTIONS</h2>
		</div>

		<div class="row">
			<div class="col-12 col-lg-3">
				<div class="solution_item">
					<figure>
						<img src="{{asset('/')}}images/solution-1.jpg" alt="blog img">
					</figure>
					<div class="item_body">

						<div class="body-link">
							<a href="#" class="link">Standard Display<span class="arrow-right"></span></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-3">
				<div class="solution_item">
					<figure>
						<img src="{{asset('/')}}images/solution-2.jpg" alt="blog img">
					</figure>
					<div class="item_body">
						<div class="body-link">
							<a href="#" class="link">Professional Display <span class="arrow-right"><img src="{{asset('/')}}images/Icon-arrow-right.svg"></span></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-3">
				<div class="solution_item">
					<figure>
						<img src="{{asset('/')}}images/solution-2.jpg" alt="blog img">
					</figure>
					<div class="item_body">
						<div class="body-link">
							<a href="#" class="link">Interactive Touch Screen <span class="arrow-right"><img src="{{asset('/')}}images/Icon-arrow-right.svg"></span></a>
						</div>
					</div>
				</div>
			</div>


			<div class="col-12 col-lg-3">
				<div class="solution_item">
					<figure>
						<img src="{{asset('/')}}images/solution-4.jpg" alt="blog img">
					</figure>
					<div class="item_body">
						<div class="body-link">
							<a href="#" class="link">Indoor LED Signage <span class="arrow-right"><img src="{{asset('/')}}images/Icon-arrow-right.svg"></span></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-3">
				<div class="solution_item">
					<figure>
						<img src="{{asset('/')}}images/solution-5.jpg" alt="blog img">
					</figure>
					<div class="item_body">
						<div class="body-link">
							<a href="#" class="link">Electronic Labels <span class="arrow-right"><img src="{{asset('/')}}images/Icon-arrow-right.svg"></span></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-3">
				<div class="solution_item">
					<figure>
						<img src="{{asset('/')}}images/solution-6.jpg" alt="blog img">
					</figure>
					<div class="item_body">
						<div class="body-link">
							<a href="#" class="link">Meeting Room Management<span class="arrow-right"><img src="{{asset('/')}}images/Icon-arrow-right.svg"></span></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-3">
				<div class="solution_item">
					<figure>
						<img src="{{asset('/')}}images/solution-7.jpg" alt="blog img">
					</figure>
					<div class="item_body">
						<div class="body-link">
							<a href="#" class="link">Projectors<span class="arrow-right"><img src="{{asset('/')}}images/Icon-arrow-right.svg"></span></a>
						</div>
					</div>
				</div>
			</div>


			<div class="col-12 col-lg-3">
				<div class="solution_item">
					<figure>
						<img src="{{asset('/')}}images/solution-8.jpg" alt="blog img">
					</figure>
					<div class="item_body">
						<div class="body-link">
							<a href="#" class="link">Broadcast Solutions <span class="arrow-right"><img src="{{asset('/')}}images/Icon-arrow-right.svg"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="industry_sec sec_padd blue-bg">
	<div class="container">

		<div class="head_cmn text-center white-text">
			<h2 class="head_2">OUR DISPLAY, YOUR INDUSTRY</h2>
			<p>Check out which offerings from our digital signage solution best serve your business’s existing or upcoming needs.</p>
		</div>

		<div class="row align-items-center">
			<!-- User this HTML for Slider -->
			<div class="industry_banner banner-content clearfix">
				<div class="banner-slider">
					<div class="slider slider-for">
						<div class="slider-banner-image">
							<img src="{{asset('/')}}images/business-slide.jpg" alt="industry img">
							<div class="industry_caption">
								<h3>Product AV</h3>
							</div>
						</div> 

						<div class="slider-banner-image">
							<img src="{{asset('/')}}images/business-slide2.jpg" alt="industry img">
							<div class="industry_caption">
								<h3>Product AV</h3>
							</div>
						</div> 

						<div class="slider-banner-image">
							<img src="{{asset('/')}}images/business-slide3.jpg" alt="industry img">
							<div class="industry_caption">
								<h3>Product AV</h3>
							</div>
						</div> 

						<div class="slider-banner-image">
							<img src="{{asset('/')}}images/business-slide.jpg" alt="industry img">
							<div class="industry_caption">
								<h3>Product AV</h3>
							</div>
						</div>

						<div class="slider-banner-image">
							<img src="{{asset('/')}}images/business-slide.jpg" alt="industry img">
							<div class="industry_caption">
								<h3>Product AV</h3>
							</div>
						</div> 
					</div>

					<div class="slider slider-nav thumb-image industry_banner_thumb">

						<div class="thumbnail-image">
							<div class="thumbImg">
								<img src="{{asset('/')}}images/thumbnail-1.png" alt="industry img">
							</div>
							<h4>Product AV</h4>
						</div>

						<div class="thumbnail-image">
							<div class="thumbImg">
								<img src="{{asset('/')}}images/thumbnail-1.png" alt="industry img">
							</div>
							<h4>Product AV</h4>
						</div>

						<div class="thumbnail-image">
							<div class="thumbImg">
								<img src="{{asset('/')}}images/thumbnail-1.png" alt="industry img">
							</div>
							<h4>Product AV</h4>
						</div>

						<div class="thumbnail-image">
							<div class="thumbImg">
								<img src="{{asset('/')}}images/thumbnail-1.png" alt="industry img">
							</div>
							<h4>Product AV</h4>
						</div>
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
			<h2 class="head_2">INDUSTRIES SERVES</h2>
		</div>

		<div class="row align-items-center">
			<div class="col-md-4">
				<div class="industry_service_block">
					<div class="icon"><img src="{{asset('/')}}images/icon-1.svg"></div>
					<h4>Retail Industry</h4>
				</div>
			</div>

			<div class="col-md-4">
				<div class="industry_service_block">
					<div class="icon"><img src="{{asset('/')}}images/icon-2.svg"></div>
					<h4>QSR Industry</h4>
				</div>
			</div>

			<div class="col-md-4">
				<div class="industry_service_block">
					<div class="icon"><img src="{{asset('/')}}images/icon-3.svg"></div>
					<h4>Meeting Room</h4>
				</div>
			</div>

			<div class="col-md-4">
				<div class="industry_service_block">
					<div class="icon"><img src="{{asset('/')}}images/icon-4.svg"></div>
					<h4>Hospitality</h4>
				</div>
			</div>

			<div class="col-md-4">
				<div class="industry_service_block">
					<div class="icon"><img src="{{asset('/')}}images/icon-5.svg"></div>
					<h4>Airports/ Railways</h4>
				</div>
			</div>

			<div class="col-md-4">
				<div class="industry_service_block">
					<div class="icon"><img src="{{asset('/')}}images/icon-6.svg"></div>
					<h4>Education Institutions</h4>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="case_studies sec_padd gray-bg Success_stories">
	<div class="container">
		<div class="head_cmn text-center">
			<h2 class="head_2">SUCCESS STORIES</h2>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata</p>
		</div>

		<div class="case_studies_slider">

			<div class="product_slide">
				<div class="product_item">
					<figure>
						<img src="{{asset('/')}}images/stories-img-1.jpg" alt="case studies">
					</figure>
					<div class="item_body">
						<h4>New sustainable logistics headquar ters Rhenus in tilburg optimally secured - Nederland</h4>
						<div class="read-more-link text-start">
							<a href="#">Read More</a>
						</div>
					</div>
				</div>
			</div>

			<div class="product_slide">
				<div class="product_item">
					<figure>
						<img src="{{asset('/')}}images/stories-img-2.jpg" alt="case studies">
					</figure>
					<div class="item_body">
						<h4>New sustainable logistics headquar ters Rhenus in tilburg optimally secured - Nederland</h4>
						<div class="read-more-link text-start">
							<a href="#">Read More</a>
						</div>
					</div>
				</div>
			</div>

			<div class="product_slide">
				<div class="product_item">
					<figure>
						<img src="{{asset('/')}}images/stories-img-1.jpg" alt="case studies">
					</figure>
					<div class="item_body">
						<h4>New sustainable logistics headquar ters Rhenus in tilburg optimally secured - Nederland</h4>
						<div class="read-more-link text-start">
							<a href="#">Read More</a>
						</div>
					</div>
				</div>
			</div>

			<div class="product_slide">
				<div class="product_item">
					<figure>
						<img src="{{asset('/')}}images/stories-img-3.jpg" alt="case studies">
					</figure>
					<div class="item_body">
						<h4>New sustainable logistics headquar ters Rhenus in tilburg optimally secured - Nederland</h4>
						<div class="read-more-link text-start">
							<a href="#">Read More</a>
						</div>
					</div>
				</div>
			</div>

			<div class="product_slide">
				<div class="product_item">
					<figure>
						<img src="{{asset('/')}}images/stories-img-2.jpg" alt="case studies">
					</figure>
					<div class="item_body">
						<h4>New sustainable logistics headquar ters Rhenus in tilburg optimally secured - Nederland</h4>
						<div class="read-more-link text-start">
							<a href="#">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="newsroom_sec sec_padd ">
	<div class="container">
		<div class="head_cmn text-center">
			<h2 class="head_2">NEWSROOM</h2>
		</div>
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="news_block">
					<div class="news_thumbnail new_left">
						<figure>
							<img src="{{asset('/')}}images/newsroom1.jpg"/>
						</figure>
						<div class="news-content">
							<h4>Lorem ipsum dolor sit amet, conse tetur sadipscing elitr, sed diam non umy eirmod tempor invidunt ut</h4>
							<a href="#" class="btn read_more">Know More</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-12">
				<div class="news_right row">
					<div class="col-md-12">
						<div class="news_block">
							<div class="news_thumbnail_list news_right">
								<figure>
									<img src="{{asset('/')}}images/newroom-2.jpg"/>
								</figure>
								<div class="news-content">
									<h4>Lorem ipsum dolor sit amet, conse tetur sadipscing elitr, sed diam non umy eirmod tempor invidunt ut</h4>
									<a href="#" class="btn read_more">Know More</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="news_block">
							<div class="news_thumbnail_list news_right">
								<figure>
									<img src="{{asset('/')}}images/newroom-3.jpg"/>
								</figure>
								<div class="news-content">
									<h4>Lorem ipsum dolor sit amet, conse tetur sadipscing elitr, sed diam non umy eirmod tempor invidunt ut</h4>
									<a href="#" class="btn read_more">Know More</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="news_block">
							<div class="news_thumbnail_list news_right">
								<figure>
									<img src="{{asset('/')}}images/newroom-4.jpg"/>
								</figure>
								<div class="news-content">
									<h4>Lorem ipsum dolor sit amet, conse tetur sadipscing elitr, sed diam non umy eirmod tempor invidunt ut</h4>
									<a href="#" class="btn read_more">Know More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

          
@endsection