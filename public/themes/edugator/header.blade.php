@php
    use App\Category;
    $categories = Category::whereStep(0)->with('sub_categories')->orderBy('category_name', 'asc')->get();
@endphp

    <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{get_option('enable_rtl')? 'rtl' : 'auto'}}" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{theme_url('favicon.png')}}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  @if( ! empty($title)) {{ $title }} | {{get_option('site_title')}}  @else {{get_option('site_title')}} @endif </title>

    <!-- all css here -->

    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">

@yield('page-css')

<!-- style css -->
    <link rel="stylesheet" href="{{theme_asset('css/style.css')}}">

    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <script type="text/javascript">
        /* <![CDATA[ */
        window.pageData = @json(pageJsonData());
        /* ]]> */
    </script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>



<script src="http://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>






</head>
<body class="{{get_option('enable_rtl')? 'rtl' : ''}}">

<div class="main-navbar-wrap">
    
    <div style="background-color: #EB763D;padding:10px"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" style="background-color: white;">
            <a style="" class="navbar-brand site-main-logo" href="{{route('home')}}">
                @php
                    $logoUrl = media_file_uri(get_option('site_logo'));
                @endphp

                @if($logoUrl)
                    <img src="{{asset('assets/images/Logo-Mega.jpg')}}" alt="{{get_option('site_title')}}" />
                    {{-- <img src="{{media_file_uri(get_option('site_logo'))}}" alt="{{get_option('site_title')}}" /> --}}
                @else
                    {{-- <img src="{{asset('assets/images/Logo-Mega.jpg')}}" alt="{{get_option('site_title')}}" /> --}}
                    <img src="{{asset('assets/images/Logo-Mega.jpg')}}" alt="{{get_option('site_title')}}" />

                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbarContent" aria-controls="mainNavbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbarContent">
                <ul class="navbar-nav categories-nav-item-wrapper">
                    <li class="nav-item nav-categories-item">
                        @if( empty($nav_home)) 
                            <a class="nav-link browse-categories-nav-link" href="{{route('categories')}}"> <i class="la la-th-large"></i> {{__t('categories')}}</a>
                        @endif 
                        

                        <div class="categories-menu">
                            <ul class="categories-ul-first">
                                <li>
                                    <a href="{{route('categories')}}">
                                        <i class="la la-th-list"></i> {{__t('all_categories')}}
                                    </a>
                                </li>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('category_view', $category->slug)}}">
                                            <i class="la {{$category->icon_class}}"></i> {{$category->category_name}}

                                            @if($category->sub_categories->count())
                                                <i class="la la-angle-right"></i>
                                            @endif
                                        </a>
                                        @if($category->sub_categories->count())
                                            <ul class="level-sub">
                                                @foreach($category->sub_categories as $subCategory)
                                                    <li><a href="{{route('category_view', $subCategory->slug)}}">{{$subCategory->category_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </li>

                </ul>
                @if(  empty($nav_home) ) 
                <div class="header-search-wrap ml-2">
                    <form action="{{route('courses')}}" class="form-inline " method="get">
                        <input class="form-control" type="search" name="q" value="{{request('q')}}" placeholder="Search">
                        <button class="btn my-2 my-sm-0 header-search-btn" type="submit"><i class="la la-search"></i></button>
                    </form>
                </div>
                @endif
                @if( ! empty($nav_home)) 
                <ul class="navbar-nav main-nav-auth-profile-wrap text-right">
                    <li class="nav-item dropdown mini-cart-item nav-text-header">
                        <a href="{{route('post', 'วิชาที่เปิดสอน')}}">วิชาที่เปิดสอน</a>
                    </li>
                    <li class="nav-item dropdown mini-cart-item nav-text-header">
                        <a href="{{route('post', 'คำถามที่พบบ่อย')}}">คำถามที่พบบ่อย</a>
                    </li>
                    <li class="nav-item dropdown mini-cart-item nav-text-header">
                        <a href="{{route('post', 'ติดต่อเรา')}}">ติดต่อเรา</a>
                    </li>
                    <li class="nav-item dropdown mini-cart-item nav-text-header" >
                        <a href="{{route('register')}}">ลงทะเบียน</a> /
                        <a href="{{route('register')}}"> ลืมรหัสผ่าน</a> 
                     </li>
                </ul>
                @endif

                <ul class="navbar-nav main-nav-auth-profile-wrap">

                    {{-- <li class="nav-item dropdown mini-cart-item">
                        {!! view_template_part('template-part.minicart') !!}
                    </li> --}}

                    @if (Auth::guest())
                        <li class="nav-item mr-2 ml-2">
                            <a class="nav-link btn btn-login-outline" 
                            style="border-color: #EB763D; border-radius: 5px; padding-left:2em; padding-right:2em;border-width: 3px;" 
                            href="{{route('login')}}"> {{__t('login')}}</a>
                            {{-- <a class="nav-link btn btn-login-outline" href="{{route('login')}}"> <i class="la la-sign-in"></i> {{__t('login123')}}</a> --}}
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link btn btn-theme-primary" href="{{route('register')}}"> <i class="la la-user-plus"></i> {{__t('signup')}}</a>
                        </li> --}}
                    @else
                        <li class="nav-item main-nav-right-menu nav-item-user-profile">
                            <a class="nav-link profile-dropdown-toogle" href="javascript:;">
                                <span class="top-nav-user-name">
                                    {!! $auth_user->get_photo !!}
                                </span>
                            </a>
                            <div class="profile-dropdown-menu pt-0">

                                <div class="profile-dropdown-userinfo bg-light p-3">
                                    <p class="m-0">{{ $auth_user->name }}</p>
                                    <small>{{$auth_user->email}}</small>
                                </div>

                                @include(theme('dashboard.sidebar-menu'))
                            </div>
                        </li>
                    @endif

                </ul>

            </div>
        </div>

    </nav>

</div>
