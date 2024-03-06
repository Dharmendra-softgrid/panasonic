<style>
  /* Add the following CSS for hover effect */
  .nav-item:hover .dropdown-menu {
      display: block;
  }

  /* Add the following CSS to hide the dropdown menu by default */
  .dropdown-menu {
      display: none;
      position: absolute;
      z-index: 1;
      background-color: #f9f9f9;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
  }
  .display-style{
    list-style: none;
  }
</style>
<header class="header_sec">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
             <img src="{{asset('/')}}images/logo.png" alt="logo">
          </a>
          <div class="mobile-search-menu desktop_hide">
                <a class="nav_search" href="javascript:void(0)">
                  <img class="black-search" src="{{asset('/')}}images/Searchblack.svg">
                </a>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto main_menu">
              <li class="nav-item">
                <a class="nav-link" href="{{route('aboutus')}}">ABOUT US</a>
              </li>
           
              <li class="nav-item main_child">
                <a class="nav-link drop_togl_inr" href="javascript:void(0)">
                SOLUTIONS
                </a>
                <div class="dropdown-menu sub_menu second_level_menu">
                    <ul class="navbar-nav-menu">
                      @if($menus->isNotEmpty())
                        @foreach($menus as $i=>$nr)
                          @if($nr->children->isNotEmpty())
                           <li class="nav-item has_child">
                              <a href="{{route('displaysolutions', ['slug' => $nr->displaySolution->slug])}}" class="dropdown-item drop_togl_inr">{{$nr->title}}</a>
                              <ul class="dropdown-menu sub_menu">
                                @if($nr->children->isNotEmpty())
                                  @foreach($nr->children as $i=>$nc)
                                    @if($nc->children->isNotEmpty())
                                      <li class="has_child">
                                        <a class="dropdown-item drop_togl_inr" href="{{route('displaysolutions', ['slug' => $nc->displaySolution->slug])}}">{{$nc->title}}</a>
                                        <ul class="sub_menu third_level_menu">
                                          @if($nc->children->isNotEmpty())
                                            @foreach($nc->children as $i=>$ncs)
                                              <li><a href="{{route('displaysolutions', ['slug' => $ncs->displaySolution->slug])}}">{{$ncs->title}}</a></li>
                                            @endforeach
                                          @endif
                                        </ul> 
                                      </li>
                                    @else
                                    <li>
                                      <a class="dropdown-item" href="{{route('displaysolutions', ['slug' => $nc->displaySolution->slug])}}">{{$nc->title}}</a>
                                    </li>
                                    @endif
                                  @endforeach
                                @endif
                              </ul>
                            </li>
                            @else
                            <li class="nav-item has_child">
                            <a href="{{route('displaysolutions', ['slug' => $nr->displaySolution->slug])}}">{{$nr->title}}</a>
                            </li>
                          @endif
                        @endforeach
                      @endif
                    </ul>
              </div>

                
              </li>
              <li class="nav-item">
                <a class="nav-link drop_togl_inr" href="javascript:void(0)">INDUSTRIES</a>
                <div class="dropdown-menu">
                    <ul class="navbar-nav-menu display-style">
                        @foreach($industries as $i)
                          <li class="nav-item"><a class="dropdown-item" href="{{route('industry', ['slug' => $i->slug])}}">{{$i->title}}</a></li>
                        @endforeach
                      </ul>
                </div>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('case-study')}}">CASE STUDIES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('newsroom')}}">BLOGS & NEWS</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto right-nav inquire-now-menu mobile_hide">
              <li class="nav-item">
                <a class="nav_search" href="#">
                  <img class="black-search" src="{{asset('/')}}images/Searchblack.svg">
                </a>
              </li>
                  <li class="nav-item">
                      <a class="inquire-now-link" href="#">INQUIRE NOW</a>
                  </li>
              </ul>
            <ul class="social_main mobile_mene_soc">
              <li><a href="#" class="social_fb"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#" class="social_insta"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#" class="social_twitter"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="social_yt"><i class="fab fa-youtube"></i></a></li>
            </ul> 
          </div>
        </div>

        <div class="Search_bar" >
              <form class="form-inline">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit"><img class="black-search" src="{{asset('/')}}images/Searchblack.svg"></button>
              </form>

              <a href="#" class="btn-close"></a>
            </div>



      </nav>
    </header>

<div class="header_space"></div>