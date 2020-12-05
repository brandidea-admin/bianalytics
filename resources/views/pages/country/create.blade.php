@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/country">Country List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Country List</li>
    </ol>
</nav>

<div class="text-center dimback">
    <div id="psdatasourcSpinner" class="spinner-border text-primary" style="width: 5rem; height: 5rem; display: none; margin-top:25px;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <form action="{{url('/country')}}" method="POST" role="search">
                <div class="card-header">
                    <h4 class="mb-3 mb-md-0">Add Country</h4>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="search_name">Enter Country Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Search Name"></i></span>
                            </label>
                            <input type="text" id="country_name" name="country_name" class="form-control" placeholder="Enter Country Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keyword_1">Enter Country Linked in Site URL
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Linked in Site URL"></i></span>
                            </label>
                            <input type="text" id="country_site" name="country_site" class="form-control" placeholder="Enter Linked in Site URL">
                        </div>
                                                
                        
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" data-request="ajax-submit" data-target='[role="energy"]' class="btn btn-sm btn-primary submit">Submit</button>
                        <a href="{{ url('/country') }}" class="btn btn-sm btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {
        // Tags
        $('#tags').tagsInput({
            'height': 'auto',
            'width': '100%',
            'interactive': true,
            'defaultText': 'Add More',
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 20,
            'placeholderColor': '#666666'
        });

        $.ajaxSetup({
            animation: "spinner"
        });

        $('.submit').click(function() {
            $('.dimback').show();
            $('#psdatasourcSpinner').show();
        });

        // Multi Select
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }
    });
</script>
@endpush
