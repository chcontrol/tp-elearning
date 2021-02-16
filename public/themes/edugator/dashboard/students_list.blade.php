@extends(theme('dashboard.layout'))

@section('content')


@if( $data_studentlist->count())
{{-- <div class="container">
    <div class="card bg-light mt-3">
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>

                <button class="btn btn-success">Import User Data</button>
            </form>
        </div>
    </div>
</div> --}}

<div style="margin-bottom: 10px;text-align: right">
    <a class="btn btn-warning" href="{{ route('export', ['slug' => $slug]) }}">ดาวน์โหลดผลคะแนน วิชา
        {{ $slug }}</a>
</div>


<table class="table table-bordered" id="users-table" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>total scores</th>
            <th>course id</th>
        </tr>
    </thead>
</table>
    @else
        {!! no_data() !!}
    @endif

    


@stop









<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<script>
    $(function() {
        $('#users-table').DataTable({
            "scrollY": "400px",

            dom: 'Bfrtip',
            buttons: [
                'excel',
            ],

            "paging": false,
            "searching": true,
            "language": {
                "lengthMenu": "",
                "zeroRecords": "ไม่มีรายชื่อนักเรียน แสดงทั้งหมด _MENU_ รายการ ต่อหน้า",
                "info": "แสดง _PAGE_ หน้า จากทั้งหมด _PAGES_ หน้า",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                },
            },

            processing: true,
            serverSide: true,
            ajax: "{{ route('datatable', ['slug' => $slug]) }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'total_scores',
                    name: 'total_scores'
                },
                {
                    data: 'course_id',
                    name: 'course_id'
                }
            ]
        });
    });

</script>





<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
