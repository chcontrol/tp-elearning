@extends(theme('dashboard.layout'))

@section('content')

    @php
    $courses = $auth_user->wishlist()->publish()->get();
    @endphp

@endsection
