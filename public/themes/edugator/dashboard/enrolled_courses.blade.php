@extends(theme('dashboard.layout'))

@section('content')
    @php
    $user = Auth::user();
    @endphp
    @if ($auth_user->enrolls->count())
        <table class="table table-bordered bg-white">

            <tr>
                <th style="width: 10%">{{ __t('thumbnail') }}</th>
                <th style="width: 50%">{{ __t('title') }}</th>
                <th style="width: 10%">{{ __t('price') }}</th>
                <th>#</th>
            </tr>

            @foreach ($auth_user->enrolls as $course)
                <tr>
                    <td>
                        <img src="{{ $course->thumbnail_url }}" width="80" />
                    </td>
                    <td>
                        <p class="mb-3">
                            <strong>{{ $course->title }}</strong>
                            {!! $course->status_html() !!}
                        </p>

                        <p class="m-0 text-muted">
                            @php
                                $lectures_count = $course->lectures->count();
                                $assignments_count = $course->assignments->count();
                                $quizzes_count = $course->quizzes->count();
                            @endphp

                            <span class="course-list-lecture-count">{{ $lectures_count }} {{ __t('lectures') }}</span>

                            @if ($assignments_count)
                                , <span class="course-list-assignment-count">{{ $assignments_count }}
                                    {{ __t('assignments') }}</span>
                            @endif

                            @if ($quizzes_count)
                                , <span class="course-list-assignment-count">{{ $quizzes_count }}
                                    {{ __t('quizzes') }}</span>
                            @endif

                        </p>
                    </td>
                    <td>{!! $course->price_html() !!}</td>

                    <td>
                        @if ($course->status == 1)
                            <a href="{{ route('course', $course->slug) }}" class="btn btn-sm btn-info mt-2"
                                target="_blank"><i class="la la-eye"></i> {{ __t('view') }} </a>
                        @endif

                        @php
                            $isCourseComplete = $user->is_completed_course($course->id);
                            
                        @endphp
                        @if ($isCourseComplete)

                            {{-- {{print_r($completed_course_id)}} --}}
                            {{-- <a href="http://academy.tappinthakorn.com/plugin/certificate/8/download" class="btn btn-success"> <i class="la la-certificate"></i> Download Certificate</a> --}}
                            <a href="{{ route('certificate', $course->id) }}" class="btn btn-sm btn-success mt-2"
                                target="_blank"><i class="la la-certificate"></i> {{ __t('print_certificate') }} </a>
                        @endif
                    </td>
                </tr>

            @endforeach

        </table>
    @else
        {!! no_data(null, null, 'my-5') !!}
    @endif

@endsection
