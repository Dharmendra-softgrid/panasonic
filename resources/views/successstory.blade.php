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
      <section class="breadcrumb-sec">
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Success Story</li>
              <!-- <li class="breadcrumb-item active" aria-current="page">ipro cameras</li> -->
            </ol>
          </nav>
        </div>
      </section>

      <section class="sec_padd case-study-sec pt-0">
        <div class="container">
          <div class="row">
            @if($successstories->isNotEmpty())
              @foreach($successstories as $i=>$successstory)            
              <div class="col-12 col-lg-4 mb-5">
                <div class="product_item">
                  <figure>
                    <img src="{{asset(isset($successstory->banner_image) ? 'images/'.$successstory->banner_image : 'images/computerbanner.jpg')}}" alt="blog img">
                  </figure>
                  <div class="item_body">
                    <h5>{{$successstory->title}}</h5>
                    <p>{{$successstory->short_description}}</p>
                    <div class="know_more-link text-start btn-effect">
                      <a href="{{ url('success-story/'.$successstory->slug) }}">KNOW MORE</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            @endif
          </div>
        </div>
      </section>
    </main>          
@endsection