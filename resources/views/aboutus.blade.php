@extends('layouts.app')


@section('content')
<main class="main_content">
    <section class="top-banner">
      <div class="categories_top_banner about_top_banner">
        <figure>
          <img src="{{asset(isset($slider->image) ? 'images/'.$slider->image : 'images/computerbanner.jpg')}}" alt="banner">
              
        </figure>
       <!--  <div class="container">
            <div class="banner_content">
              <h1 class="main_title">Protecting your business with uncompromised security</h1>
                <p class="sub_title">Panasonic security solutions setting the new standards to guard your business</p>
              <a href="#" class="btn discover-now-btn">DISCOVER NOW</a>
            </div>
          </div>
      </div> -->
    </section>

    <section class="sec_padd">
      <div class="container">
                  <div class="head_cmn text-center">
                     <h2 class="head_2 mb-3">{{$first_sec_content->title}}</h2>
                     <p class="fon-20 sub_title gray-color">{!! $first_sec_content->content !!}</p>
                  </div>

      </div>
    </section>
    <section class="sec_padd about-video-sec">
        <div class="container">
          <div class="row align-items-center">
                  <div class="col-md-6">
                          <div class="about-video-block">
                             <div class="video_sec wow fadeInRight" data-wow-duration="0.4s" data-wow-delay="0.6s">
                                <!-- <figure><img src="assets/images/product-1.jpg"></figure> -->
                                <div class="video_fegure">
                                  <a href="javascript:void(0);" class="play_icon" data-attr="https://www.youtube.com/embed/9xwazD5SyVg" data-bs-toggle="modal" data-bs-target="#video_popup" tabindex="0">
                                    <img src="{{asset('/')}}images/play_icon_red.png" alt="">
                                  </a>
                                  <img src="{{asset('/')}}images/about-img.jpg">
                                </div>
                              </div>
                          </div>
                  </div>
                  <div class="col-md-6">
                    <div class="about-video-text">
                       <h3>{!! $second_sec_content->title !!}</h3>
                       <p>{!! $second_sec_content->content !!}</p>
                    </div>
                    
                  </div>
          </div>
        </div>
  </section>



<section class="sec_padd our-technology">
    <div class="container">
                 <div class="head_cmn text-center mb-5 ">
                    <h2 class="head_2 mb-3">{!! $third_sec_content->title !!}</h2>
                </div>
        

     <div class="tech-block-list">
         <div class="row">
             <div class="col-md-6 tech-content">
              <div class="tech-block">
                {!! $third_sec_content->content !!}
                <span class="gray-shape"><img src="{{asset('/')}}images/left-gray-shap.png"></span>
              </div>
              </div>
              <div class="col-md-6 tech-img">
                
                <div class="technology-img">
                     <span class="shape"><img src="{{asset('/')}}images/yellow-shap.png"></span>
                     <figure>
                        <img src="{{asset(isset($third_sec_content->image) ? 'images/'.$third_sec_content->image : 'images/computerbanner.jpg')}}" alt="img">
                     </figure>
                   
                </div>

              </div>
            </div>
              <!-- row -->
          </div>

       <div class="tech-block-list">
              <div class="row">
             <div class="col-md-6 tech-content">
              <div class="tech-block">
                <h2>{!! $fourth_sec_content->title !!}</h2>
                <p>{!! $fourth_sec_content->content !!}</p>
                <span class="gray-shape"><img src="{{asset('/')}}images/left-gray-shap.png"></span>
              </div>
              </div>
              <div class="col-md-6 tech-img">
                
                <div class="technology-img">
                     <span class="shape"><img src="{{asset('/')}}images/yellow-shap.png"></span>
                     <figure>
                        <img src="{{asset(isset($fourth_sec_content->image) ? 'images/'.$fourth_sec_content->image : 'images/computerbanner.jpg')}}" alt="img">
                     </figure>
                </div>

              </div>
            </div>
              <!-- row -->
            </div>

          <div class="tech-block-list">
              <div class="row">
            <div class="col-md-6 tech-content">
              <div class="tech-block">
                <h2>{!! $fifth_sec_content->title !!}</h2>
      
                <p>{!! $fifth_sec_content->content !!}</p>
                
                <span class="gray-shape"><img src="{{asset('/')}}images/left-gray-shap.png"></span>
              </div>
              </div>
              <div class="col-md-6 tech-img">
                
                <div class="technology-img">
                     <span class="shape"><img src="{{asset('/')}}images/yellow-shap.png"></span>
                   <figure>
                        <img src="{{asset(isset($fifth_sec_content->image) ? 'images/'.$fifth_sec_content->image : 'images/computerbanner.jpg')}}" alt="img">
                     </figure>
                </div>

              </div>
            </div>
              <!-- row -->
            </div>
            <!-- tech-block-list -->


            <div class="tech-block-list">
              <div class="row">
            <div class="col-md-6 tech-content">
              <div class="tech-block">
                <h2>{!! $sixth_sec_content->title !!}</h2>
                <p>{!! $sixth_sec_content->content !!}</p>

                <span class="gray-shape"><img src="{{asset('/')}}images/left-gray-shap.png"></span>
              </div>
              </div>
              <div class="col-md-6 tech-img">
                
                <div class="technology-img">
                     <span class="shape"><img src="{{asset('/')}}images/yellow-shap.png"></span>
                     <figure>
                        <img src="{{asset(isset($sixth_sec_content->image) ? 'images/'.$sixth_sec_content->image : 'images/computerbanner.jpg')}}" alt="img">
                     </figure>
                </div>

              </div>
            </div>
              <!-- row -->
            </div>
            <!-- tech-block-list -->


            <div class="tech-block-list">
              <div class="row">
           <div class="col-md-6 tech-content">
              <div class="tech-block">
                <h2>{!! $seventh_sec_content->title !!}</h2>
                <p>{!! $seventh_sec_content->content !!}</p>
                
                <span class="gray-shape"><img src="{{asset('/')}}images/left-gray-shap.png"></span>
              </div>
              </div>
              <div class="col-md-6 trch-img">
                
                <div class="technology-img">
                     <span class="shape"><img src="{{asset('/')}}images/yellow-shap.png"></span>
                    <figure>
                        <img src="{{asset(isset($seventh_sec_content->image) ? 'images/'.$seventh_sec_content->image : 'images/computerbanner.jpg')}}" alt="img">
                     </figure>
                </div>

              </div>
            </div>
              <!-- row -->
            </div>
            <!-- tech-block-list -->


            
   

   </div>
</section>  


<section class="sec_padd inquire-now-section gray-bg">
<div class="container">
         <div class="head_cmn text-center mb-5 ">
              <h2 class="head_2 mb-3">INQUIRE NOW</h2>
          </div>
          <div class="inquire-now-form">
            <form id="contact_form" name="contact_form" method="post">
              <div class="mb-5 row">
                  <div class="col">
                      <input type="text" required maxlength="50" class="form-control" id="first_name" name="type" placeholder="Type">
                  </div>

                  <div class="col">
                       <select class="form-select form-select-lg">
                               <option>Product / Category of Interest*</option>
                               <option>Category 1</option>
                               <option>Category 2</option>
                               <option>Category 3</option>
                             </select>
                          
                  </div>

                  <div class="col">
                      <input type="text"  class="form-control" id="last_name" name="city" placeholder="City*">
                  </div>
              </div>
              <div class="col-md-12 text-center"><button type="submit" class="btn inquire-now-link round-0" >SUBMIT NOW</button></div>
            
              
              
          </form>
            
          </div>
        

</div>
</section>

   
</main>
@endsection