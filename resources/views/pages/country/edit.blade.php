@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/country">Country List</a></li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <form action="{{url('/country', $posts['id'])}}" method="POST" role="search">
                @method('PUT')
                @csrf
                <div class="card-header">
                    <h4 class="mb-3 mb-md-0">Edit Country</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="search_name">Edit Country Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Country Name"></i></span>
                            </label>
                            <input type="text" id="country_name" name="country_name" class="form-control" placeholder="Enter Country Name" value="{{$posts['country_name']}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keyword_1">Enter Country Linked in Site URL
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Country Site"></i></span>
                            </label>
                            <input type="text" id="country_site" name="country_site" class="form-control" placeholder="Enter Keyword 1" value="{{$posts['country_site']}}">
                        </div>
                        
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" data-request="ajax-submit" data-target='[role="energy"]' class="btn btn-sm btn-primary submit">Submit</button>
                        <a href="/country" class="btn btn-sm btn-danger">Cancel</a>
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
<script src="{{ asset('assets/js/tags-input.js') }}"></script>
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