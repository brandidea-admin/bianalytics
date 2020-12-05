@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
@endpush

@section('content')


<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/email_permut">Email Permutation</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Email Permutation</li>
    </ol>
</nav>


<div class="row">
    <div class="col-md-12 stretch-card"> 
        <div class="card">
            <form action="{{url('/email_permut')}}" method="POST" role="search">
                <div class="card-header">
                    <h4 class="mb-3 mb-md-0">Add Email Permutation</h4>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="search_name">Enter Email Permuation Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Email Permuation Name"></i></span>
                            </label>
                            <input type="text" id="emailpermut_name" name="emailpermut_name" class="form-control form-control-sm" placeholder="Enter Email Permuation Name" required>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="tag_name">Enter First Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Tag Name"></i></span>
                            </label>
                            <input type="text" id="	first_name" name="first_name" class="form-control form-control-sm" placeholder="Enter First Name" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="job_title">Enter Last Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Job Title"></i></span>
                            </label>
                            <input type="text" id="last_name" name="last_name" class="form-control form-control-sm" placeholder="Enter Last Name" required>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="keyword">Enter Nick Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Keyword"></i></span>
                            </label>
                            <input type="text" id="nick_name" name="nick_name" class="form-control form-control-sm" placeholder="Enter Nick Name">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="key_exclude">Enter Middle Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Keyword Exclude"></i></span>
                            </label>
                            <input type="text" id="middle_name" name="middle_name" class="form-control form-control-sm" placeholder="Enter Middle Name">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="in_title">Enter Domain Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter In Title"></i></span>
                            </label>
                            <input type="text" id="domain_name" name="domain_name" class="form-control form-control-sm" placeholder="Enter Domain Name" required>
                        </div>

                        
                        <div class="form-group col-md-6">
                            <label for="comments">Comments
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Comments"></i></span>
                            </label>
                            <input type="text" id="comments" name="comments" class="form-control form-control-sm" placeholder="Comments">
                        </div>
                        
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" data-request="ajax-submit" data-target='[role="energy"]' class="btn btn-sm btn-primary submit">Submit</button>
                        <a href="/email_permut" class="btn btn-sm btn-danger">Cancel</a>
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