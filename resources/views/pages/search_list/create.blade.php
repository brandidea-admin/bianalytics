@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/search_list">Search List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Search List</li>
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
            <form action="{{url('/search_list')}}" method="POST" role="search">
                <div class="card-header">
                    <h4 class="mb-3 mb-md-0">Add Search List</h4>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="search_name">Enter Search List Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Search Name"></i></span>
                            </label>
                            <input type="text" id="search_name" name="search_name" class="form-control" placeholder="Enter Search Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keyword_1">Enter Keyword 1
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Keyword 1"></i></span>
                            </label>
                            <input type="text" id="keyword_1" name="keyword_1" class="form-control" placeholder="Enter Keyword 1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keyword_2">Enter Keyword 2
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Keyword 2"></i></span>
                            </label>
                            <input type="text" id="keyword_2" name="keyword_2" class="form-control" placeholder="Enter Keyword 2">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keyword_3">Enter Keyword 3
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Keyword 2"></i></span>
                            </label>
                            <input type="text" id="keyword_3" name="keyword_3" class="form-control" placeholder="Enter Keyword 3">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="country_site">Select Country
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Select Country"></i></span>
                            </label>
                            <select id="country_site" name="country_site" class="js-example-basic-single">
                                <option value="">Select Country</option>
                                @foreach($country_sites as $country)
                                <option value="{{$country->country_site}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" data-request="ajax-submit" data-target='[role="energy"]' class="btn btn-sm btn-primary submit">Submit</button>
                        <a href="/leadhunter/public/search_list" class="btn btn-sm btn-danger">Cancel</a>
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