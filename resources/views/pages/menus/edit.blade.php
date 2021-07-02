@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{url('/menus')}}">Master Menu</a></li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <form action="{{url('/menus', $menus['id'])}}" method="POST" role="search">
                @method('PUT')
                @csrf
                <div class="card-header">
                    <h4 class="mb-3 mb-md-0">Edit Menu Master</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="search_name">Edit Menu Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Modify Menu Name"></i></span>
                            </label>
                            <input type="text" id="menu_name" name="menu_name" class="form-control" placeholder="Enter Mennu Name" value="{{$menus->menu_name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keyword_1">Reference ID
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Refernce ID"></i></span>
                            </label>
                            <input type="text" id="refid" readonly name="refid" class="form-control" placeholder="Enter refid" value="{{$menus['refid']}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keyword_2">Parent ID
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Keyword 2"></i></span>
                            </label>
                            <input type="text" id="parent_id" name="parent_id" class="form-control" placeholder="parent_id" value="{{$menus['parent_id']}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keyword_3">Order ID
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Keyword 3"></i></span>
                            </label>
                            <input type="text" id="order_fld" name="order_fld" class="form-control" placeholder="order_fld" value="{{$menus['order_fld']}}">
                        </div>

                        <div class="form-group col-md-6">
                            <select id="stat" name="stat" class="form-control">
                                <option value="0">Select Status</option>
                                <option value="A">A</option>
                                <option value="R">R</option>
                            </select>
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" data-request="ajax-submit" data-target='[role="energy"]' class="btn btn-sm btn-primary submit">Submit</button>
                        <a href="{{url('/menus')}}" class="btn btn-sm btn-danger">Cancel</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {
        if ($(".js-example-basic-multiple").length) {
            $(".js-example-basic-multiple").select2();
        }
        $('#tags').tagsInput({
            'interactive': true,
            'defaultText': 'Add More',
            'removeWithBackspace': true,
            'width': '100%',
            'height': 'auto',
            'placeholderColor': '#666666'
        });

        // Multi Select
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }
    });
</script>
@endpush

