@extends(theme('dashboard.layout'))

@section('content')

    <div class="curriculum-top-nav d-flex bg-white mb-5 p-2 border">
        <h4 class="flex-grow-1">{{ __t('my_courses') }} </h4>
        <a href="{{ route('create_course') }}" class="btn btn-warning">{{ __t('create_course') }}</a>
    </div>

    @if ($auth_user->courses->count())
        <table class="table table-bordered bg-white">

            <tr>
                <th>{{ __t('thumbnail') }}</th>
                <th>{{ __t('title') }}</th>
                <th>{{ __t('price') }}</th>
            </tr>

            @foreach ($auth_user->courses as $course)
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
                                , <span class="course-list-quiz-count">{{ $quizzes_count }}
                                    {{ __t('quizzes') }}</span>
                            @endif
                        </p>

                        <div class="courses-action-links mt-1">
                            <a href="{{ route('edit_course_information', $course->id) }}" class="font-weight-bold mr-3">
                                <i class="la la-pencil-square-o"></i> {{ __t('edit') }}
                            </a>

                            @if ($course->status == 1)
                                <a href="{{ route('course', $course->slug) }}" class="font-weight-bold mr-3"
                                    target="_blank"><i class="la la-eye"></i> {{ __t('view') }} </a>
                            @else
                                <a href="{{ route('course', $course->slug) }}" class="font-weight-bold mr-3"
                                    target="_blank"><i class="la la-eye"></i> {{ __t('preview') }} </a>
                            @endif
                            <a href="{{ route('students_list', $course->slug) }}" class="font-weight-bold mr-3"
                                target="_blank"><i class="la la-list"></i> {{ __t('students_list') }} </a>

                            @php do_action('my_courses_list_actions_after', $course); @endphp

                            <a href="{{ route('delete_course', $course->id) }}" class="font-weight-bold mr-3" onclick = "if (! confirm('ต้องการลบครอสเรียนใช่หรือไม่?')) { return false; }">
                                <i class="la la-trash"></i> {{ __t('delete') }}
                            </a>

                        </div>
                    </td>
                    <td>{!! $course->price_html() !!}</td>

                </tr>

            @endforeach

        </table>
    @else
        {!! no_data(null, null, 'my-5') !!}
        <div class="no-data-wrap text-center">
            <a href="{{ route('create_course') }}" class="btn btn-lg btn-warning">{{ __t('create_course') }}</a>
        </div>
    @endif

    <script>
        const deleteCourse = () => {
            var txt;
            if (confirm("ต้องการลยครอส!")) {
                txt = "You pressed OK!";
            } else {
                txt = "You pressed Cancel!";
            }
        }

    </script>

@endsection
