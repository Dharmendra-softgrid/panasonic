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
              <li class="breadcrumb-item"><a href="{{url('/')}}" class="newsHome">Home</a></li>
              <li class="breadcrumb-item">Blog & News</li>
            </ol>
          </nav>
        </div>
      </section>
      <section class="sec_padd case-study_sec pt-0">
        <div class="container">          
          <div class="row">
          @if($newsrooms->isNotEmpty())
            @foreach($newsrooms as $i=>$newsroom) 
            <div class="col-12 col-lg-4 mb-5">
              <div class="newsroom_item">
              <a class="newslink" href="{{ url('newsRoomDetail/'.$newsroom->slug) }}">
                <figure>
                  <img src="{{asset(isset($newsroom->image) ? 'images/'.$newsroom->image : 'images/computerbanner.jpg')}}" alt="news img">
                </figure>
              </a>
                <div class="item_body">
                <a class="newslink" href="{{ url('newsRoomDetail/'.$newsroom->slug) }}"><h5>{{$newsroom->title}}</h5></a>
                  <div class="news_details">
                    <span class="news_date"> {{date('M d, Y', strtotime($newsroom->created_at))}} </span> | <span class="Publisher_name"> {{$newsroom->publisher}}</span>
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