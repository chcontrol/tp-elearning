
<footer >

    <div class="footer-top py-5">

        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="footer-widget-wrap">
                        <h4>เกี่ยวกับเรา</h4>
                        <p class="footer-about-us-desc" style="font-size: 13px;">
                            ผู้ให้บริการตรวจรับรองมาตรฐาน ISO & Food Safety ทุกระบบ แบบ One Stop Service ครบกระบวนการจบในที่เดียว ง่ายสะดวกรวดเร็วราคาประหยัด โดยเรามีบริการครบวงจรจบในที่เดียว ราคาประหยัด ไม่แพงอย่างที่ท่านคิด สะดวกรวดเร็วและประหยัดเวลาในการตรวจรับรอง การันตีความสำเร็จในทุกมาตรฐาน                        
                        </p>
                        <p class="footer-social-icon-wrap">
                            <a href="#"><i class="la la-facebook"></i> </a>
                            <a href="#"><i class="la la-twitter"></i> </a>
                            <a href="#"><i class="la la-youtube"></i> </a>
                        </p>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="footer-widget-wrap contact-us-widget-wrap">
                        <h4>สนใจการให้บริการติดต่อ</h4>
                        <p class="footer-address">
                            <p><a href="#"><i class="la la-comments"></i> http://m.me/megacert.broker</a></p>
                            <p><a href="#"><i class="la la-phone"></i> https://lin.ee/AvHt8cX</a></p>
                            <p><a href="#"><i class="la la-laptop"></i> https://megacer.com/</a></p>
                            <p><a href="#"><i class="la la-phone"></i> 02 114 7679</p>
                            <p><a href="#"><i class="la la-mail-bulk"></i> info@megacer.com</p>
                        </p>

                        {{-- <p class="mb-0"> Tel.: +1 234 452 341 55 </p>
                        <p class="mb-0"> Fax: +1 979 132 225 675 </p>
                        <p class="mb-0"> info@demo.com </p> --}}
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="footer-widget-wrap link-widget-wrap">

                        <ul class="footer-links">
                            <li><a href="{{route('home')}}">{{__t('home')}}</a> </li>
                            <li><a href="{{route('dashboard')}}">{{__t('settings')}}</a> </li>
                            <li><a href="{{route('courses')}}">{{__t('courses')}}</a> </li>
                            <li><a href="{{route('dashboard')}}">{{__t('dashboard')}}</a> </li>
                            <li><a href="{{route('register')}}">{{__t('register')}}</a> </li>
                            {{-- <li><a href="{{route('featured_courses')}}">{{__t('featured_courses')}}</a> </li> --}}
                            {{-- <li><a href="{{route('blog')}}">{{__t('blog')}}</a> </li>
                            <li><a href="{{route('post_proxy')}}">{{__t('about_us')}}</a> </li>
                            <li><a href="{{route('register')}}">{{__t('signup')}}</a> </li>
                            <li><a href="#">Contact Us</a> </li> --}}
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="footer-bottom py-5">

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bottom-contents-wrap d-flex" style="justify-content: center;">

                        <div class="footer-bottom-left d-flex" >
                            {{-- <h5 class="text-warning">teachify LMS</h5> --}}
                            <span class="ml-4" style="font-size:20px">Copyright © 2020 teachify. All rights reserved.</span>
                        </div>

                        {{-- <div class="footer-bottom-right flex-grow-1 text-right">
                            <ul class="footer-bottom-right-links">
                                <li>
                                    <a href="{{route('post_proxy', get_option('terms_of_use_page'))}}">
                                        {{__t('terms_of_use')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('post_proxy', get_option('privacy_policy_page'))}}">
                                        {{__t('privacy_policy')}} &amp; {{__t('cookie_policy')}}
                                    </a>
                                </li>

                            </ul>
                        </div> --}}

                    </div>
                </div>
            </div>

        </div>
    </div>


</footer>


<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    {{ csrf_field() }}
</form>

@if( ! auth()->check() && request()->path() != 'login')
    @include(theme('template-part.login-modal-form'))
@endif

<!-- jquery latest version -->
<script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

@yield('page-js')

<!-- main js -->
<script src="{{theme_asset('js/main.js')}}"></script>



</body>
</html>
