@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/search_list/">EMail Permutation</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add EMail Permutation</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <form action="{{url('/search_list')}}" method="POST" role="search">
                <div class="card-header">
                    <h4 class="mb-3 mb-md-0">Add EMail Permutation</h4>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="search_name">Enter EMail Permutation Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Search Name"></i></span>
                            </label>
                            <input type="text" id="search_name" name="search_name" class="form-control form-control-sm" placeholder="Enter Search Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tag_name">Enter First Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Tag Name"></i></span>
                            </label>
                            <input type="text" id="tag_name" name="tag_name" class="form-control form-control-sm" placeholder="Enter Tag Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="job_title">Enter Last Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Job Title"></i></span>
                            </label>
                            <input type="text" id="job_title" name="job_title" class="form-control form-control-sm" placeholder="Enter Job Title">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keyword">Enter Nick Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Keyword"></i></span>
                            </label>
                            <input type="text" id="keyword" name="keyword" class="form-control form-control-sm" placeholder="Enter Keyword">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="key_exclude">Enter Middle Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Keyword Exclude"></i></span>
                            </label>
                            <input type="text" id="key_exclude" name="key_exclude" class="form-control form-control-sm" placeholder="Enter Keyword Exclude">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="in_title">Enter Domain Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter In Title"></i></span>
                            </label>
                            <input type="text" id="in_title" name="in_title" class="form-control form-control-sm" placeholder="Enter In Title">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="comments">Comments
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Comments"></i></span>
                            </label>
                            <input type="text" id="comments" name="comments" class="form-control form-control-sm" placeholder="Comments">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" data-request="ajax-submit" data-target='[role="emailpermut"]' class="btn btn-sm btn-primary submit">Submit</button>
                        <a href="/search_list" class="btn btn-sm btn-danger">Cancel</a>
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
        // Multi Select
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }
    });
</script>
@endpush