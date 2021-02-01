@extends(theme('dashboard.layout'))

@section('content')

    @php
    $reviews = $auth_user->get_reviews()->with('course', 'user', 'user.photo_query')->orderBy('created_at', 'desc')->paginate(20);
    @endphp

    @if($reviews->total())

        <p class="text-muted mb-3"> Showing {{$reviews->count()}} from {{$reviews->total()}} results </p>

  

        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                </tr>
                <tr>
                    <td>Row 2 Data 1</td>
                    <td>Row 2 Data 2</td>
                </tr>
            </tbody>
        </table>

        @foreach($getEarnings as $review)
            <div class="my-review p-4 mb-3 bg-white border">

                <div class="d-flex mb-3">


                    <div class="reviewed-user-photo">
                        <a href="{{route('profile', $review->id)}}">
                            {{-- {!! $review->user->get_photo !!} --}}
                        </a>
                    </div>

                    <div class="reviewed-user-detail">

                        <a href="{{route('profile', $review->id)}}" class="mb-2 d-block">
                            {!! $review->id !!}
                        </a>

                        <div class="d-flex">
                        </div>

                    </div>

                </div>



            </div>
        @endforeach

        {!! $reviews->links(); !!}
    @else
        {!! no_data(null, null, 'my-5' ) !!}
    @endif

@endsection


<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>