@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{{ URL::asset('/assets/dist/css/bootstrap.min.css')}}}" />
<link rel="stylesheet" href="{{{ URL::asset('/assets/dist/css/buttons.dataTables.min.css')}}}" />
@endpush

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Country</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Country Master</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="/leadhunter/public/search_list/create" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Add Country
        </a>
    </div>
</div>

<div class="main-content"> 
     <table class="table table-striped table-bordered table-hover" id="emp_list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($employees as $key => $emp)
                    <tr>
                        <td>{{ $emp->id }}</td>
                        <td>{{ $emp->location_name }}</td>
                        <td>{{ $emp->icon }}</td>
                        <td>{{ $emp->stat }}</td>
 
                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
 
                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                            <a class="btn btn-small btn-success" onclick="return false;" href="{{ URL::to('country/' . $emp->id) }}">Show</a>
 
                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                            <a class="btn btn-small btn-info" onclick="return false;" href="{{ URL::to('country/' . $emp->id . '/edit')}}">Edit</a>
 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table> 
  </div>

@endsection

@push('plugin-scripts')
<script src="{{ asset('/assets/js/datepicker.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {


        $('#emp_list').DataTable({
            "processing": true,
            "language" : {
                    "processing": "<img src={{ asset('/assets/images/Hourglass.gif') }}>"
                    },
            // "sAjaxSource":"data.php",
            "pageLength": 10,
            "dom": 'Bfrtip',
            // "buttons": [
            //     {
            //         "extend": 'collection',
            //         "text": 'Export',
            //         "buttons": [
            //             'copy',
            //             'excel',
            //             'csv',
            //             'pdf',
            //             'print'
            //         ]
            //     }
            // ]
        });

        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajaxSetup({
            animation: "spinner"
        });

    });

</script>
@endpush
