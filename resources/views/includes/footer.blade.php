<footer class="footer_sec">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 footer-logo">
                <div class="ftr_logo">
                    <a href="{{ url('/') }}">
                        <img src="{{asset('/')}}images/logo.png" alt="logo">
                    </a>
                </div>
                <div class="footer_social">
                    <h4>Follow Us</h4>
                    <ul class="social_main">
                        <li>
                            <a href="#" class="social_insta"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_twitter"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_fb"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_fb"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_yt"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-2 footer_col">
                <div class="ftr_title">
                    <h3>Solutions</h3>
                </div>
                <ul class="footer_menu_main justify-content-md-between">
                    @if($menus->isNotEmpty())
                        @foreach($menus as $i=>$nr)
                            @if($nr->parent == 0)
                                <li class="col-auto" style="text-transform: lowercase;">
                                    <a href="{{route('displaysolutions', ['slug' => $nr->displaySolution->slug])}}">{{$nr->title}}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="col-12 col-md-2 footer_col">
                <div class="ftr_title">
                    <h3>Industries</h3>
                </div>
                <ul class="footer_menu_main justify-content-md-between">
                    @foreach($industries as $i)
                    <li class="col-auto">
                        <a href="{{route('industry', ['slug' => $i->slug])}}">{{$i->title}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-12 col-md-2 footer_col">
                <div class="ftr_title">
                    <h3>Other Links</h3>
                </div>
                <ul class="footer_menu_main justify-content-md-between">
                    <li class="col-auto">
                        <a href="{{route('aboutus')}}">About Us</a>
                    </li>
                    <li class="col-auto">
                        <a href="{{route('newsroom')}}">Blogs & News</a>
                    </li>
                    <li class="col-auto">
                        <a href="{{route('case-study')}}">Case studies</a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-3 contact_us footer_col">
                <div class="ftr_title">
                    <h3>Contact Us</h3>
                </div>
                <ul class="footer_menu_main gx-2 justify-content-md-between">
                    <li class="col-auto">
                        <p>Panasonic Life Solutions India Private Limited12th Floor, Ambience Tower I, Ambience IslandNH-8, Gurgaon, Haryana-122002, IndiaTel-+91-0124-4751300</p>
                    </li>
                    <li class="col-auto">
                        Contact Number: +91 9818808005
                    </li>
                    <li class="col-auto">
                        Email Address: sales.ccve@in.panasonic.com
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="top-border"></div>
        <div class="row justify-content-between align-items-center ftr-bottom-menu">
            <div class="col col-md-auto">
                <div class="ftr_left_menu">
                    <p>
                        <a href="#">Privacy Policy</a>
                    </p>
                </div>
            </div>
            <div class="col col-md-auto">
                <div class="copyright_text"> © All rights are reserved.</div>
            </div>
            <div class="col-auto">
                <div class="ftr_right_menu">
                    <p>
                        <a href="#">Terms of Use</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer> 