@extends(theme('dashboard.layout'))




@section('content')

    @php




    $user_id = $auth_user->id;

    $enrolledCount = \App\Enroll::whereUserId($user_id)
        ->whereStatus('success')
        ->count();

    // $course = Course::whereSlug($slug)
    //     ->with('sections', 'sections.items', 'sections.items.attachments')
    //     ->first();

    $user = Auth::user();
    // print_r($user);
    echo '<input type="text" id="isInstructor" value="' . $user->isInstructor . '" hidden="hidden" />';
    echo '<input type="text" id="user_id" value="' . $user->id . '" hidden="hidden" />';

    $wishListed = \Illuminate\Support\Facades\DB::table('wishlists')
        ->whereUserId($user_id)
        ->count();

    $a = DB::table('courses')
        // ->where('courses.slug', '=', $this->slug)
        ->select('id', 'title')
        ->get();

    $myReviewsCount = \App\Review::whereUserId($user_id)->count();
    $purchases = $auth_user
        ->purchases()
        ->take(10)
        ->get();
    @endphp

    @php
    // $courses = $auth_user
    //     ->wishlist()
    //     ->publish()
    //     ->get();

    // $enrolledCount = \App\Enroll::whereUserId($user_id)
    //     ->whereStatus('success')
    //     ->count();
    // $wishListed = \Illuminate\Support\Facades\DB::table('wishlists')
    //     ->whereUserId($user_id)
    //     ->count();

    // $myReviewsCount = \App\Review::whereUserId($user_id)->count();
    // $purchases = $auth_user
    //     ->purchases()
    //     ->take(10)
    //     ->get();
    @endphp






    <div class="container">
        <div class="container">
            {{ Form::open(['route' => 'events.store', 'method' => 'post', 'role' => 'form']) }}
            <div class="modal " id="responsive-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                {{-- <div id="responsive-modal" class="modal " tabindex="-1" data-backdrop="static"> --}}
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>นัดเวลาสอน</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container">

                                {{-- <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    <label class="mb-3">{{__t('category')}}</label>
        
                                    @if ($courses->count())
                                        <select name="category_id" id="course_category" class="form-control select2">
                                            <option value="">{{__t('select_category')}}</option>
                                            @foreach ($courses as $category)
                                                <optgroup label="{{$category->category_name}}">
                                                    @if ($category->sub_categories->count())
                                                        @foreach ($category->sub_categories as $sub_category)
                                                            <option value="{{$sub_category->id}}">
                                                                {{$sub_category->category_name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    @endif
                                    @if ($errors->has('category_id'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>
                                    @endif
                                </div> --}}






















                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        {{ Form::label('title', 'หัวข้อที่สอน') }}
                                        {{ Form::text('title', old('title'), ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        {{-- {{ Form::label('course_id', 'วิชาที่สอน*') }}
                                        {{ Form::text('course_id', old('course_id'), ['class' => 'form-control']) }} --}}

                                        <div class="form-group {{ $errors->has('topic_id') ? ' has-error' : '' }}">
                                            <label class="mb-3">{{ __t('topic') }}</label>
                                            
                                            @if ($a->count())
                                                <select required name="course_id" id="course_id" class="form-control select2">
                                                    <option value="">{{ __t('courses') }}</option>
                                                    @foreach ($a as $i)
                                                        <option {{selected($i->id)}} value={{ $i->id }}>{{ $i->title }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                            @if ($errors->has('topic_id'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('topic_id') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        {{ Form::label('discription', 'รายละเอียด*') }}
                                        {{ Form::text('discription', old('discription'), ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        {{ Form::label('ref_link', 'Link Zoom*') }}
                                        {{ Form::text('ref_link', old('ref_link'), ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        {{ Form::label('date_start', 'วันที่เริ่ม') }}
                                        {{ Form::text('date_start', old('date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        {{ Form::label('time_start', 'เวลาที่เริ่ม') }}
                                        {{ Form::text('time_start', old('time_start'), ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        {{ Form::label('date_end', 'วันเวลาสิ้นสุด') }}
                                        {{ Form::text('date_end', old('date_end'), ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        {{ Form::label('color', 'สี') }}
                                        <div class="input-group colorpicker">
                                            {{ Form::text('color', old('color'), ['class' => 'form-control']) }}
                                            <span class="input-group-addon">
                                                <i></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="form-group col-sm-6">
                                        {{ Form::label('note', 'หมายเหตุ*') }}
                                        {{ Form::text('note', old('note'), ['class' => 'form-control']) }}
                                        <input type="text" class="form-control" />
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dafault" data-dismiss="modal">ยกเลิก</button>
                            {!! Form::submit('ยืนยัน', ['class' => 'btn btn-success save']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
            <div id='calendar'></div>

            <div id="modal-event" class="modal " tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>แก้ไขรายละเอียด</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="form-group col-sm-6 isInstructor">
                                    {{ Form::label('_title', 'หัวข้อที่สอน') }}
                                    {{ Form::text('_title', old('_title'), ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-sm-6">
                                    {{ Form::label('_course_id', 'วิชาที่สอน*') }}
                                    {{ Form::text('_course_id', old('_course_id'), ['class' => 'form-control']) }}

                                </div>

                                {{-- <div class="form-group {{ $errors->has('topic_id') ? ' has-error' : '' }}">
                                    <label class="mb-3">{{ __t('topic') }}</label>
                                    
                                    @if ($a->count())
                                        <select name="course_id" id="course_id" class="form-control select2">
                                            <option value="">{{ __t('courses') }}</option>
                                            @foreach ($a as $i)
                                                <option {{selected($i->id )}}  value={{ $i->id }}>{{ $i->title }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                    @if ($errors->has('topic_id'))
                                        <span
                                            class="invalid-feedback"><strong>{{ $errors->first('topic_id') }}</strong></span>
                                    @endif
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    {{ Form::label('_discription', 'รายละเอียด*') }}
                                    {{ Form::text('_discription', old('_discription'), ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group col-sm-6">
                                    {{ Form::label('_ref_link', 'Link Zoom*') }}
                                    {{ Form::text('_ref_link', old('_ref_link'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    {{ Form::label('_date_start', 'วันที่เริ่ม') }}
                                    {{ Form::text('_date_start', old('_date_start'), ['class' => 'form-control', 'readonly']) }}
                                </div>

                                <div class="form-group col-sm-6">
                                    {{ Form::label('_time_start', 'เวลาที่เริ่ม') }}
                                    {{ Form::text('_time_start', old('_time_start'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    {{ Form::label('_date_end', 'วันเวลาที่เลิก') }}
                                    {{ Form::text('_date_end', old('_date_end'), ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-sm-6">
                                    {{ Form::label('_color', 'สี') }}
                                    <div class="input-group colorpicker">
                                        {{ Form::text('_color', old('_color'), ['class' => 'form-control']) }}
                                        <span class="input-group-addon">
                                            <i>เลือกสี</i>
                                        </span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info link_zoom" onclick="window.open($('#_ref_link').val())"
                                type="button" hidden="true">
                                link zoom</button>
                            <a id="delete" data-href="{{ url('events') }}" data-id="" class="btn btn-danger">ลบ</a>
                            <button type="button" class="btn btn-dafault" data-dismiss="modal">ยกเลิก</button>
                            <a id="save" href="#" data-href="{{ url('events') }}" class="btn btn-success btn-update save"
                                data-id="">ยืนยัน</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('page-js')




    {!! Html::style('../assets/vendor/seguce92/fullcalendar/fullcalendar.min.css') !!}
    {!! Html::style('../assets/vendor/seguce92/bootstrap-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('../assets/vendor/seguce92/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}



    {!! Html::script('../assets/vendor/seguce92/jquery.min.js') !!}
    {!! Html::script('../assets/vendor/seguce92/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('../assets/vendor/seguce92/fullcalendar/lib/moment.min.js') !!}
    {!! Html::script('../assets/vendor/seguce92/fullcalendar/fullcalendar.min.js') !!}
    {!! Html::script('../assets/vendor/seguce92/bootstrap-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}
    {!! Html::script('../assets/vendor/seguce92/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') !!}

    <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>

    <style>
        .example-open .modal-backdrop {
            background-color: #000000;
            opacity: 0.5;
        }

    </style>
    <script>
        $(document).ready(function() {
            // $('#responsive-modal').show()
            $('#responsive-modal').on('show.bs.modal', function(e) {
                $('body').addClass("example-open");
            }).on('hide.bs.modal', function(e) {
                $('body').removeClass("example-open");
            })

            $('#modal-event').on('show.bs.modal', function(e) {
                $('body').addClass("example-open");
            }).on('hide.bs.modal', function(e) {
                $('body').removeClass("example-open");
            })

            if ($("#isInstructor").val() !== "1") {
                $("input").attr('readonly', true);
                $(".save").attr('hidden', true);
                $("#delete").attr('hidden', true);
                $("#linkzoom").attr('herf', "www.google.com");
                $(".link_zoom").attr('hidden', false);
                $('#_time_start').click(false);
            } else {

            }
        });

        var BASEURL = "{{ url('/') }}";
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                timeFormat: 'H(:mm) ',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                selectHelper: true,
                select: function(start) {
                    start = moment(start.format());
                    $('#date_start').val(start.format('YYYY-MM-DD'));
                    if ($("#isInstructor").val() == "1") {
                        $('#responsive-modal').modal('show');
                    }
                },

                events: BASEURL + `/events?user_id=${$("#user_id").val()}`,

                eventClick: function(event, jsEvent, view) {
                    var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
                    var time_start = $.fullCalendar.moment(event.start).format('hh:mm:ss');
                    var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD hh:mm:ss');
                    $('#modal-event #delete').attr('data-id', event.id);
                    $('#modal-event .btn-update').attr('data-id', event.id);
                    $('#modal-event #_title').val(event.title);
                    $('#modal-event #_course_id').val(event.course_id);
                    $('#modal-event #_discription').val(event.discription);
                    $('#modal-event #_ref_link').val(event.ref_link);
                    $('#modal-event #_date_start').val(date_start);
                    $('#modal-event #_time_start').val(time_start);
                    $('#modal-event #_date_end').val(date_end);
                    $('#modal-event #_color').val(event.color);
                    $('#modal-event').modal('show');
                }
            });

        });

        $('.colorpicker').colorpicker();

        $('#time_start').bootstrapMaterialDatePicker({
            date: false,
            shortTime: false,
            format: 'HH:mm:ss'
        });

        $('#date_end').bootstrapMaterialDatePicker({
            date: true,
            shortTime: false,
            format: 'YYYY-MM-DD HH:mm:ss'
        });

        $('#_time_start').bootstrapMaterialDatePicker({
            date: false,
            shortTime: false,
            format: 'HH:mm:ss'
        });

        $('#_date_end').bootstrapMaterialDatePicker({
            date: true,
            shortTime: false,
            format: 'YYYY-MM-DD HH:mm:ss'
        });

        $('#delete').on('click', function() {
            var x = $(this);
            var delete_url = x.attr('data-href') + '/' + x.attr('data-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: delete_url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#modal-event').modal('hide');
                    alert(result.message);
                    location.reload(true); //recarga de pagina
                },
                error: function(result) {
                    $('#modal-event').modal('hide');
                    alert(result.message);
                }
            });
        });

        $(document).on('click', '.btn-update', function() {
            var route_update = $(this).attr('data-href') + '/' + $(this).attr('data-id');
            var data = {
                'date_start': $('#_date_start').val(),
                'title': $('#_title').val(),

                'discription': $('#_discription').val(),

                'time_start': $('#_time_start').val(),
                'date_end': $('#_date_end').val(),
                'color': $('#_color').val(),

                'ref_link': $('#_ref_link').val(),
                'course_id': $('#_course_id').val(),
                'note': $('#_note').val(),

                '_method': 'PATCH',
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                data: data,
                type: 'PATCH',
                // data: {
                //     _token: '{{ csrf_token() }}'
                // },
                url: route_update,
                success: function(result) {
                    $('#modal-event').modal('hide');
                    if (result.status === 201) {
                        alert(result.message);
                        location.reload(true);
                    } else
                        alert(result.message);
                },
                error: function() {
                    $('#modal-event').modal('hide');
                    alert('บันทึกการแก้ไขสำเร็จ');
                }
            });
        });

    </script>

    <style>
        .fc-title {
            font-size: 18px;
            color: white
        }

        .fc-time {
            font-size: 20px;
            color: white
        }

    </style>
@endsection
