<?php
$gridClass = $grid_class ? $grid_class : 'col-md-3'; ?>

@php
if (isset($auth_user->id)) {
    $user_id = $auth_user->id;
}
@endphp

<div class="{{ $gridClass }} course-card-grid-wrap ">
    <div class="course-card mb-5">

        <div class="course-card-img-wrap">
            {{-- <div class="dropdown" style="text-align: right;z-index:1;margin-right: 2.5em;">
                
                <button style="opacity: 0.2;position: absolute;z-index:1;" type="button" class="btn btn-secondary  btn-circle  " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               ...
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">พิมพ์ใบรับรอง</a>
                </div>
              </div> --}}
            <a href="{{ route('course', $course->slug) }}">

                <img src="{{ $course->thumbnail_url }}" style="min-height: 137px; height:137px" />
            </a>

            {{-- <button class="course-card-add-wish btn btn-link btn-sm p-0" data-course-id="{{$course->id}}">
                @if ($auth_user && in_array($course->id, $auth_user->get_option('wishlists', [])))
                    <i class="la la-heart"></i>
                @else
                    <i class="la la-heart-o"></i>
                @endif
            </button> --}}
        </div>

        <div class="course-card-contents" style="height: 250px">
            <a href="{{ route('course', $course->slug) }}">
                <h4 class="course-card-title-new mb-3">{{ $course->title }}</h4>
                <p class="course-card-short-info mb-2 d-flex justify-content-between">
                    <span><i class="la la-play-circle"></i> {{ $course->total_lectures }}
                        {{ __t('lectures') }}</span>
                    <span><i class="la la-signal"></i> {{ course_levels($course->level) }}</span>
                </p>
            </a>

            <div class="course-card-info-wrap-new">

                <p class="course-card-author d-flex justify-content-between">
                    <span>
                        <a style="font-size: 0.8rem;color: #9BA3B5 "
                            href="{{ route('profile', $course->user_id) }}">{{ $course->author->name }}</a>
                    </span>
                    @if ($course->category)
                        <span style="text-align: -webkit-right; height : 40px">
                            <i class="la la-folder"></i> in <a
                                href="{{ route('category_view', $course->category->slug) }}">{{ $course->category->category_name }}</a>
                        </span>
                    @endif
                </p>
                {{-- @if ($course->rating_count)
                    <div class="course-card-ratings">
                        <div class="star-ratings-group d-flex">
                            {!! star_rating_generator($course->rating_value) !!}
                            <span class="star-ratings-point mx-2"><b>{{$course->rating_value}}</b></span>
                            <span class="text-muted star-ratings-count">({{$course->rating_count}})</span>
                        </div>
                    </div>
                @endif
                <div class="course-card-ratings">
                    <div class="star-ratings-group d-flex">
                        {!! star_rating_generator($course->rating_value) !!}
                        <span class="star-ratings-point mx-2"><b>{{$course->rating_value}}</b></span>
                        <span class="text-muted star-ratings-count">({{$course->rating_count}})</span>
                    </div>
                </div> --}}
                <div class="text-right text-danger">
                    {!! $course->price_html(false, false) !!}
                </div>
            </div>

            <div class="course-card-footer mt-3 h6 text-right">



                <div class="course-card-cart-wrap d-flex justify-content-between" style="float: right;">
                    {{-- {!! $course->price_html(false, false) !!} --}}
                    {{-- <div class="course-card-btn-wrap">
                        
                    </div> --}}
                    <div class="btn-group">

                        @if ($auth_user && in_array($course->id, $auth_user->get_option('enrolled_courses', [])))
                            <a href="{{ route('course', $course->slug) }}">{{ __t('enrolled') }}</a>
                        @else


                            @php($in_cart = cart($course->id))



                                {{-- <button type="button" class="btn btn-sm btn-theme-primary add-to-cart-btn"
                                    data-course-id="{{ $course->id }}" {{ $in_cart ? 'disabled="disabled"' : '' }}>
                                    @if ($in_cart)

                                </button> --}}
                                @if ($course->check_price() > 0)
                                    <button type="button"
                                        class="btn btn-sm btn-primary btn-lg add-to-cart-btn btn-block mr-2 "
                                        style="width:100px" data-course-id="{{ $course->id }}"
                                        {{ $in_cart ? 'disabled="disabled"' : '' }}>
                                        @if ($in_cart > 0)
                                            </i> {{ __t('in_cart') }}
                                        @else
                                            {{ __t('หยิบใส่ตะกร้า') }}
                                        @endif
                                    </button>

                                    <form action="{{ route('add_to_cart') }}" class="add_to_cart_form" method="post">
                                        @csrf

                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <button type="submit" class="btn btn-sm    btn-outline-dark " name="cart_btn"
                                            value="buy_now">ซื้อทันที</button>

                                    </form>

                                @else
                                    {{-- {{ $course->check_price() }} --}}

                                    @if ($in_cart)
                                        <button type="button" class="btn btn-sm btn-theme-primary add-to-cart-btn"
                                            data-course-id="{{ $course->id }}"
                                            {{ $in_cart ? 'disabled="disabled"' : '' }}>
                                            {{-- <i class='la la-check-circle'> --}}
                                            </i> {{ __t('in_cart') }}
                                        </button>
                                    @else

                                        <form action="{{ route('free_enroll') }}" class="course-free-enroll"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">

                                            <button type="submit"
                                                class="btn btn-sm btn-warning btn-lg btn-block">{{ __t('enroll_now') }}</button>

                                        </form>


                                        {{-- {{ __t('ลงทะเบียนเลย') }} --}}
                                    @endif


                                @endif

                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
