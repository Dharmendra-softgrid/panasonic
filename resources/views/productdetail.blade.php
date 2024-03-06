@extends('layouts.app')


@section('content')
<style>
  .content_tab .col-md-6 {
    padding: 0;
  }

  .product_tab_content {
    padding: 60px;
  }

  .tab-row-sec:nth-child(2n+2) {
    border: none;
    display: flex;
    flex-direction: row-reverse;
  }


  @media only screen and (max-width: 767px) {
    .content_tab .col-md-6 {
      padding: 0 15px;
    }

    .product_tab_content {
      padding: 20px;
    }

    .brochurer-download a.download-link {
      min-width: 130px;
    }

  }
</style>
<?php //print_r($successstory);?>
<main class="main_content">
  <section class="breadcrumb-sec">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Product</li>
          <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
        </ol>
      </nav>
    </div>
  </section>
  <section class="Products_details_page">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <!-- <div class="Products_img">
               <img class="img-fluid" src="assets/images/product_img.png" alt="Products">
            </div> -->

          <div class="product-vehicle-detail-banner banner-content clearfix">
            <div class="product-banner-slider">
              <div class="productslider slider-for-product">
                @if(!empty($productImages->isNotEmpty()))
                @foreach ($productImages as $pi)
                <div class="slider-banner-image">
                  <img class="img-fluid"
                    src="{{asset(isset($pi->image) ? 'images/product/'.$pi->image : 'images/computerbanner.jpg')}}"
                    alt="Products">
                </div>
                @endforeach
                @endif
              </div>

              <div class="slider slider-nav product-thumb-image">
                @if(!empty($productImages->isNotEmpty()))
                @foreach ($productImages as $pi)
                <div class="product-thumbnail-image">
                  <div class="productThumbImg">
                    <img src="{{asset(isset($pi->image) ? 'images/product/'.$pi->image : 'images/computerbanner.jpg')}}"
                      alt="slider-img">
                  </div>
                </div>
                @endforeach
                @endif
              </div>
            </div>
          </div>


        </div>
        <div class="col-md-6">
          <div class="main_products_details">
            <div class="product_description">
              <div class="products_code product_small_name">{{$product->title}}</div>
              <div class="products_name">
                <h2>{{$product->short_description}}</h2>
              </div>
            </div>
            <div class="product_info">
              {!!$product->description!!}
            </div>
            <div class="choose_size">
              <h5>Choose Your Size</h5>

              <div class="Size_button_block">
                @if(!empty($productVariant->isNotEmpty()))
                  @foreach ($productVariant as $index => $item)
                    <div class="radio_button">
                      <input type="radio" id="{{$item->variant}}" name="type" value="{{$item->variant}}">
                      <label data-icon="M" for="{{$item->variant}}">
                        <p>{{$item->variant}}</p>
                      </label>
                    </div>
                  @endforeach
                @endif
              </div>

            </div>
            <div class="inquire-block mt-4">
              <a class="inquire-now-link" href="#">INQUIRE NOW</a>
            </div>


          </div>
        </div>

      </div>
  </section>
  <section class="product_tab_sec">
    <div class="container">
      <nav class="tab_nav">
        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-features-tab" data-bs-toggle="tab" data-bs-target="#features"
            type="button" role="tab" aria-controls="nav-home" aria-selected="true">Key Features</button>
          <button class="nav-link" id="nav-specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications"
            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Specifications</button>
          <button class="nav-link" id="nav-resources-tab" data-bs-toggle="tab" data-bs-target="#resources" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false">Download brochures</button>
          <button class="nav-link" id="nav-RelatedProducts-tab" data-bs-toggle="tab" data-bs-target="#RelatedProducts"
            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Related Products</button>
        </div>
      </nav>

      <div class="tab-content p-3" id="nav-tabContent">
        <div class="tab-pane fade active show" id="features" role="tabpanel" aria-labelledby="nav-features-tab">
          <!-- Key Features start -->
          <div class="tabs_container">
            <h3 class="desktop_hide mobile_title ">Key Features</h3>
            <div class="featurescontent tabs_content_block">
              <div class="featurescontent text-center">
                <div class="row align-items-center">
                  <div class="col-md-12">
                    {!!$product->key_features!!}
                  </div>
                </div>
              </div>
              <!-- Key Features End -->
              <div class="content_tab mt-5 mb-5">
                @if(!empty($productBlog->isNotEmpty()))
                @foreach ($productBlog as $index => $item)
                  @if ($index % 2 == 0)
                    <div class="row align-items-center tab-row-sec">

                      <div class="col-md-6 right-col col-img">
                        <div class="product-tab-img ">
                          <img class="img-fluid" src="{{asset(isset($item->image) ? 'images/product/'.$item->image : 'images/computerbanner.jpg')}}" alt="Products">
                        </div>
                      </div>

                      <div class="col-md-6 left-col col-content">
                        <div class="product_tab_content">
                          <h4>{{$item->title}}</h4>
                          <p>{{$item->description}}</p>
                        </div>
                      </div>

                    </div>
                  @else
                    <div class="row align-items-center tab-row-sec">

                      <div class="col-md-6 right-col col-img">
                        <div class="product-tab-img ">
                          <img class="img-fluid" src="{{asset(isset($item->image) ? 'images/product/'.$item->image : 'images/computerbanner.jpg')}}" alt="Products">
                        </div>
                      </div>

                      <div class="col-md-6 left-col col-content">
                        <div class="product_tab_content">
                          <h4>{{$item->title}}</h4>
                          <p>{{$item->description}}</p>
                        </div>
                      </div>

                    </div>
                  @endif
                @endforeach
                @endif
              </div>

            </div>

          </div>
        </div>




        <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="nav-profile-tab">
          <!--specifications  start -->

          <div class="tabs_container">
            <h3 class="desktop_hide mobile_title ">Specifications</h3>
            <div class="tabs_content_block">


              <div class="accordion " id="featuresAccordion">
                @if(!empty($productSpecification->isNotEmpty()))
                  <div class="accordion-item">
                    <h2 id="features1" class="accordion-header">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#featuresHeading1" aria-expanded="true" aria-controls="featuresHeading1">
                        Camera
                      </button>
                    </h2>
                    <div id="featuresHeading1" class="accordion-collapse collapse show" aria-labelledby="features1"
                      data-bs-parent="#featuresAccordion">
                      <div class="accordion-body">
                        <div class="specifications">
                          <table class="table">
                            <thead class="thead-inverse">
                              <tr>
                                <th>Components</th>
                                <th>Specifications</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if(!empty($productSpecification->isNotEmpty()))
                                @foreach($productSpecification as $index=> $item)
                                  <tr>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->value}}</td>
                                  </tr>
                                @endforeach
                              @endif
                            </tbody>
                          </table>

                        </div>
                        <!--  -->
                      </div>
                    </div>
                  </div>
                @endif
              </div>
              @if(!empty($ProductOtherSpecification->isNotEmpty()))
              @foreach($ProductOtherSpecification as $index=> $item)
              <div class="accordion-item">
                <h2 class="accordion-header" id="{{$item->id}}">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#{{$item->title}}" aria-expanded="false" aria-controls="featuresHeading2"> {{$item->title}}
                  </button>
                </h2>
                <div id="{{$item->title}}" class="accordion-collapse collapse" aria-labelledby="{{$item->id}}"
                  data-bs-parent="#featuresAccordion">
                  <div class="accordion-body"> {{$item->description}} </div>
                </div>
              </div>

              {{-- <div class="accordion-item">
                <h2 class="accordion-header" id="features3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#featuresHeading3" aria-expanded="false" aria-controls="featuresHeading2"> DORI
                  </button>
                </h2>
                <div id="featuresHeading3" class="accordion-collapse collapse" aria-labelledby="features3"
                  data-bs-parent="#featuresAccordion">
                  <div class="accordion-body"> Throughout history, robots have both embraced and rejected the act of
                    working with other robots in a collective. While science has shown that collective artificial
                    intelligence helps both intellectual and technological development, it has also shown that some
                    robots really want to just be and think by themselves. How do we harness the benefits of both while
                    avoiding the downfall of each? </div>
                </div>
              </div> --}}
              @endforeach
              @endif
            </div>


          </div>
          <!--specifications end  -->

        </div>
        <div class="tab-pane fade" id="resources" role="tabpanel" aria-labelledby="av-resources-tab">
          <!-- resources start -->

          <div class="tabs_container">
            <h3 class="desktop_hide mobile_title ">Download brochures</h3>
            <div class="resources-sec tabs_content_block">
              <ul>

                @if(!empty($productBrochures->isNotEmpty()))
                @foreach($productBrochures as $brochures)
                <?php $brochures = (!empty($brochures->value))  ? unserialize($brochures->value) : '';  ?>
                @if(!empty($brochures))
                @foreach($brochures as $bs)
                <?php 
                              $bs_arr = explode(".", $bs);
                              $br_file_name = ucfirst($bs_arr[0]);
                              ?>
                <li>
                  <h5>Manual files</h5>
                  <div class="brochure-block">
                    <div class="brochure-item">
                      <div class="brochure-thumbnail">
                        <!-- <img src="{{asset('images/brochure-img.png')}}"/ alt="Brochure Image"> -->
                        <embed src="{{asset('specesheet/'.$bs)}}" width="50px" height="70px" />
                      </div>
                      <p class="mobile_hide">{{$br_file_name}}</p>
                    </div>
                    <div class="brochurer-right">
                      <p class="desktop_hide">{{$br_file_name}}</p>
                      <div class="brochurer-download">
                        <a class="download-link" href="{{asset('specesheet/'.$bs)}}" download="">Download</a>
                      </div>
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
                @endforeach
                @endif
              </ul>
            </div>



          </div>

          <!-- resources end -->


        </div>
        <div class="tab-pane fade" id="RelatedProducts" role="tabpanel" aria-labelledby="nav-RelatedProducts-tab">

          <div class="tabs_container">
            <h3 class="desktop_hide mobile_title ">Related Products</h3>
            <div class="tabs_content_block">

              <!-- related product start -->
              <div class="row">
                @if(!empty($relatedProducts->isNotEmpty()))
                @foreach($relatedProducts as $relatedProduct)
                <div class="col-md-6 col-lg-3 col-xl-3">
                  <div class="product py-4">
                    <div class="product_img">
                      <figure>
                        <img
                          src="{{asset(isset($relatedProduct->featured_image) ? 'images/'.$relatedProduct->featured_image : 'images/computerbanner.jpg')}}"
                          alt="product img">
                      </figure>
                    </div>
                    <div class="product_details">
                      <div class="product_code">LH-98QM6HVS</div>
                      <div class="product_name">
                        <h4>{{$relatedProduct->title}}</h4>
                      </div>
                      <div class="product_des">
                        <p>{{$relatedProduct->short_description}}</p>
                      </div>
                      <a href="#" class="inquire-now-btn">INQUIRE NOW</a>
                    </div>
                  </div>
                </div>
                @endforeach
                @endif







              </div>
              <!-- related product end -->
            </div>
          </div>

        </div>

      </div>


    </div>

  </section>



</main>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function () {
    $("#image-slider").on("input", function () {
      var selectedImage = $(this).val();
      $(".product-image").hide();
      $("#image" + selectedImage).show();
    });
  });
</script>