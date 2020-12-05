@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/leadhunter/public/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/leadhunter/public/master_keyword">Master Keywords</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Master Keyword</li>
    </ol>
</nav>


<div class="row">
    <div class="col-md-12 stretch-card"> 
        <div class="card">
            <form action="{{url('/master_keyword')}}" method="POST" role="search">
                <div class="card-header">
                    <h4 class="mb-3 mb-md-0">Add Master Keyword</h4>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="keyword">Enter Keyword
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Keyword"></i></span>
                            </label>
                            <input type="text" id="keyword" name="keyword" class="form-control form-control-sm" placeholder="Enter Keyword" required>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" data-request="ajax-submit" data-target='[role="energy"]' class="btn btn-sm btn-primary submit">Submit</button>
                        <a href="/leadhunter/public/master_keyword" class="btn btn-sm btn-danger">Cancel</a>
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