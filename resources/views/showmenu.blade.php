@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Menu Master</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Menu Master</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{url('/menuss/syncjson')}}" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Sync Json Menu
        </a>
        <a href="{{url('/menus/create')}}" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Add New Menu
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card shadow-lg">
            <div class="card-body">
            <table class="table table-striped table-bordered yajra-datatable" id="mytable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Ref.ID</th>
                        <th>Menu Name</th>
                        <th>Parent ID</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
@endpush

@push('custom-scripts')
<script>

    // $(".menuid").click(function() {
    //     //var uinfo = $(this).attr("alt");
    //     alert("AAAAAAAAAAAAAA");
    //     return false; 
    // });

  $(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on("click", ".menuid2", function() {
        var uinfo = $(this).attr("alt");
        //alert(uinfo);
            var status = confirm("Are you sure to Delete this record ?");
            if(status == false){
                return false;
            }
            else {
                return true;
            }
    });


    var table = $('.yajra-datatable').DataTable({
        language: {
            processing: "<img src={{ asset('/assets/images/Hourglass.gif') }}>"
        },
        processing: true,
        serverSide: true,
        ajax: "{{ route('menuss.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'refid', name: 'refid'},
            {data: 'menu_name', name: 'menu_name'},
            {data: 'parent_id', name: 'parent_id'},
            {data: 'order_fld', name: 'order_fld'},
            {data: 'stat', name: 'stat'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

   
        $('#mytable thead tr').clone(true).appendTo( '#mytable thead' );
            $('#mytable thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                if(title == "No" || title == "Action" ) {
                    $(this).html('');
                }
                else 
                {
                    $(this).html( '<input type="text" size="5" placeholder=" "/>' );
                }

                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });

   
  });
</script>
@endpush