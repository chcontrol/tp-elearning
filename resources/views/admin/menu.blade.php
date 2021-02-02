
<div class="navbar-default sidebar" role="navigation">
    <div id="adminmenuback"></div>
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{route('admin')}}"><i class="la la-dashboard fa-fw"></i> {{__t('admin_home')}}</a>
            </li>

            @php
                do_action('admin_menu_item_before');
            @endphp

            <li>
                <a href="#"><i class="la la-newspaper-o fa-fw"></i> {{__t('admin.cms')}}<span class="la arrow"></span></a>
                <ul class="nav nav-second-level" style="display: none;">
                    <li> <a href="{{ route('posts') }}">{{__t('posts')}}</a> </li>
                    <li> <a href="{{ route('pages') }}">{{__t('pages')}}</a> </li>
                </ul><!-- /.nav-second-level -->
            </li>

            <li>
                <a href="{{route('media_manager')}}"><i class="la la-photo-video"></i> {{__t('media_manager')}}</a>
            </li>

            <li>
                <a href="{{route('category_index')}}"><i class="la la-folder"></i> {{__t('categories')}}</a>
            </li>

            <li> <a href="{{route('admin_courses')}}"><i class="la la-chalkboard"></i> {{__t('courses')}}</a>  </li>

            <li>
                <a href="{{route('plugins')}}" class="{{request()->is('admin/plugins*') ? 'active' : ''}}" >
                    <i class="la la-plug"></i> {{__t('plugins')}}
                </a>
            </li>

            <li>
                <a href="{{route('themes')}}" class="{{request()->is('admin/themes*') ? 'active' : ''}}">
                    <i class="la la-brush"></i> {{__t('themes')}}
                </a>
            </li>

            <li>
                <a href="#"><i class="la la-tools fa-fw"></i> {{__t('settings')}}<span class="la arrow"></span></a>
                <ul class="nav nav-second-level" style="display: none;">
                    @php
                        do_action('admin_menu_settings_item_before');
                    @endphp
                    <li> <a href="{{ route('general_settings') }}">{{__t('general_settings')}}</a> </li>
                    <li> <a href="{{ route('lms_settings') }}">{{__t('lms_settings')}}</a> </li>
                    <li> <a href="{{ route('payment_settings') }}">{{__t('payment_settings')}}</a> </li>
                    <li> <a href="{{ route('payment_gateways') }}">{{__t('payment_gateways')}}</a> </li>
                    <li> <a href="{{ route('withdraw_settings') }}">{{__t('withdraw')}}</a> </li>
                    <li> <a href="{{ route('theme_settings') }}">{{__t('theme_settings')}}</a> </li>
                    {{--<li> <a href="{{ route('invoice_settings') }}">{{__t('admin.invoice_settings')}}</a> </li>--}}
                    <li> <a href="{{ route('social_settings') }}"> {{__t('social_login_settings')}} </a> </li>
                    <li> <a href="{{ route('storage_settings') }}"> {{__t('storage')}} </a> </li>
                    @php
                        do_action('admin_menu_settings_item_after');
                    @endphp
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li> <a href="{{route('payments')}}"><i class="la la-file-invoice-dollar"></i> {{__t('payments')}}</a>  </li>
            <li> <a href="{{route('withdraws')}}"><i class="la la-wallet"></i> {{__t('withdraws')}}</a>  </li>

            <li> <a href="{{ route('users') }}"><i class="la la-users"></i> {{__t('users')}}</a>  </li>

            <li> <a href="{{route('change_password')}}"><i class="la la-lock"></i> {{__t('change_password')}}</a>  </li>

            @php
            do_action('admin_menu_item_after');
            @endphp

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="la la-sign-out"></i> {{__t('logout')}}
                </a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
