@extends('layouts.app')


@section('content')
<main class="main_content">
      <section class="">
      @if($sliders->isNotEmpty())
        @foreach($sliders as $i=>$slider)
        <div class="categories_top_banner">
          <figure>
            <img src="{{asset(isset($slider->image) ? 'images/'.$slider->image : 'images/computerbanner.jpg')}}" alt="banner">
          </figure>
        </div>        
        @endforeach
      @endif
      </section>

      <section class="Industry_sec sec_padd">
        <div class="container">
          <div class="head_cmn text-center">
            <h2 class="head_2">{{$industry->title}}</h2>
          </div>
          <div class="row">
            <div class="col-md-10 mx-auto">
          <div class="sec_p text-center">
            <p>{{strip_tags($industry->content)}}</p>
          </div>
        </div>
        </div>
      </div>

    </section>

    <section class="industry_banner">
      @if($galleryImages->isNotEmpty())
        @foreach($galleryImages as $i=>$galleryImage)
             <figure>
                <img src="{{asset(isset($galleryImage->image) ? 'images/'.$galleryImage->image : 'images/computerbanner.jpg')}}" alt="banner">
            </figure>
        @endforeach
      @endif
    </section>
    @if(!empty($relatedProducts->isNotEmpty()))
    <section class="sec_padd product-finder-sec pt-0">
      <div class="container">
        <div class="head_cmn text-center">
            <h2 class="head_2">PRODUCT FINDER</h2>
        </div>
        <div class="product_finder_slider slider-arrow">
        @if(!empty($relatedProducts->isNotEmpty()))
          @foreach($relatedProducts as $relatedProduct)
          <div class="poduct_finder_block">
              <div class="row">
                  <div class="col-md-6">
                      <div class="product_image">
                                <figure>
                                   <img src="{{asset(isset($relatedProduct->featured_image) ? 'images/'.$relatedProduct->featured_image : 'images/computerbanner.jpg')}}" alt="product img">
                                </figure>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="product_details">
                        <h3>{{$relatedProduct->title}}</h3>
                         <p>{{$relatedProduct->short_description}}</p>
                          <a href="{{ url('product/'.$relatedProduct->slug) }}" class="see_details">See details <span>&#x2192;</span></a>
                      </div>
                  </div>
              </div>
          </div>
          <!-- slide -->
          @endforeach
        @endif
        </div>
      </div>
    </section>
    @endif
<section class="SinageSolutionsSec">
  <div class="container">
    <div class="display_box SinageSolutions">
      @if(!empty($IndustryBlog->isNotEmpty()))
        @foreach ($IndustryBlog as $relatedBlog)
          <div class="display_banner display_hover_top">
            <figure>
              <img src="{{asset(isset($relatedBlog->image) ? 'images/'.$relatedBlog->image : 'images/computerbanner.jpg')}}">
            </figure>
            <div class="text-caption">
              <div class="text-caption-content">
                <h3>{{$relatedBlog->title}}</h3>
                {!! $relatedBlog->description !!}
                  <a href="#" class="btn View-all-btn common-btn">View All  <span>&#x2192;</span></a>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>



<!-- <section class="SinageSolutionsSec">
  <div class="container">
    <div class="display_box SinageSolutions">
               <div class="display_banner display_hover_top">
                 <figure>
                    <img src="assets/images/SinageSolutions.jpg">
                </figure>
                <div class="text-caption">
                  <h3>Sinage Solutions</h3>
                 <p>Effortlessly deliver better, more engaging content to your audience with a fully integrated Digital Signage solution.</p>
                  <a href="#" class="btn View-all-btn common-btn">View All</a>
                  
                </div>
               </div>
            </div>
  </div>
</section> -->
  
<section class="other_industries sec_padd">
  <div class="container">
         <div class="head_cmn text-center">
            <h2 class="head_2">OTHER INDUSTRIES</h2>
        </div>
        <div class="industries_slider slider-arrow">
        @if(!empty($industries->isNotEmpty()))
          @foreach($industries as $industry)
          <div class="slider_block">
                <div class="block_img">
                    <img src="{{asset('images/retailIndustry.png')}}" alt="INDUSTRIES IMG">
                </div>
                <div class="block_text">
                  <span class="icon"><img src="{{asset(isset($industry->banner_image) ? 'images/'.$industry->banner_image : 'images/computerbanner.jpg')}}" alt="Industry IMG"></span>
                  <h4>{{$industry->title}}</h4>
                </div>
          </div>
          <!-- == -->
          @endforeach
        @endif
          
        </div>
    
  </div>
</section>




    </main>
@endsection