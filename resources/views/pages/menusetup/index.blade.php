@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush


@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{url('/user')}}">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Menu Setting</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">User Menu Setting </h4>
    </div>
    <!-- <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{url('/user/create')}}" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Add Menu
        </a>
    </div> -->
</div>

<div id='loader' style='text-align: center; display: none;'>
    <img src="{{ asset('/assets/images/Hourglass.gif') }}" width='32px' height='32px'>
</div>

<div class="row">
    <div >
        <div >
            <div >
                <div class="menu-setup" style="overflow-x: auto; overflow-y: hidden; white-space: nowrap;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush

@push('custom-scripts')
<script>

    $(function() {
        // $('#companyTable').DataTable({
        //     "iDisplayLength": 5,
        //     "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        // });

        //alert(sessionStorage.getItem("usrinfo"));
        var uid = sessionStorage.getItem("usrinfo");
        var dbinfo = sessionStorage.getItem("dbinfo");
        //alert(dbinfo);
        //return false;

        $.ajax({
                type: 'GET',
                //url: "{{ url('/jqgrid/report.php?usrid=') }}"+uid,
                url: "{{ url('/tree-menu/index6.php?usrid=') }}"+uid+"&dbinfo="+dbinfo,
                beforeSend: function(){
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(data) {
                    //alert(data);
                    $(".menu-setup").html(data);
                }
        });

    });

</script>
@endpush