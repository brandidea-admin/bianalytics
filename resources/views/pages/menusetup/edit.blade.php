@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Menu Setting</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">User - ID {{$uid}} Menu Setting </h4>
    </div>
    <!-- <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{url('/user/create')}}" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Add Menu
        </a>
    </div> -->
</div>
<div class="row">
    <div >
        <div >
            <div >
                <div class="menu-setup">
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

        var uid = {{$uid}}
        //alert(uid);
        // return false;

        // $.ajax({
        //         type: 'POST',
        //         url: "{{ url('/jqgrid/report.php') }}",
        //         complete: function() {
        //             $('#psdatasourcSpinner').hide();
        //         },
        //         success: function(data) {
        //             //alert(data);
        //             $(".menu-setup").html(data);
        //         }
        // });
    });

</script>  
@endpush