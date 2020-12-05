@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/news_read">News Read</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit News Read</li>
    </ol>
</nav>


<div class="row">
    <div class="col-md-12 stretch-card"> 
        <div class="card">
            <form action="{{url('/news_read', $posts['id'])}}" method="POST" role="search">
                @method('PUT')
                @csrf
                <div class="card-header">
                    <h4 class="mb-3 mb-md-0">Edit News Read</h4>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="newsread_name">Enter News Search Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Email Permuation Name"></i></span>
                            </label>
                            <input type="text" id="newsread_name" name="newsread_name" class="form-control form-control-sm" placeholder="Enter News Search Name" value="{{$posts['newsread_name']}}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="news_type">Enter News Type
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Select news_type"></i></span>
                            </label>
                            <select id="news_type" name="news_type" class="form-control form-control-sm js-example-basic-single">
                                <option value="0">Select News Type</option>
                                <option {{ ($posts->news_type == "TopHeadlines") ? "selected" : "" }} value="TopHeadlines">Top Headlines</option>
                                <option {{ ($posts->news_type == "Everything") ? "selected" : "" }} value="Everything">Everything</option>
                                <option {{ ($posts->news_type == "Sources") ? "selected" : "" }} value="Sources">Sources</option>       
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="news_source_from">Enter News Source From
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Select News Source From"></i></span>
                            </label>
                            <select multiple id="news_source_from"  name="news_source_from[]" class="form-control form-control-sm js-example-basic-single">
                                    @php
                                        foreach ($ids as $kk => $snam) {
                                            echo "<option value='". $snam ."'>". $snam ."</option>";
                                        }
                                    @endphp
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="keywords">Enter keywords
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter keywords"></i></span>
                            </label>
                            <input type="text" id="keywords" name="keywords" class="form-control form-control-sm" placeholder="Enter keywords" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="category">Enter Category
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Select category"></i></span>
                            </label>
                            <select id="category" name="category" class="form-control form-control-sm js-example-basic-single">
                                <option selected value="0">Select Category</option>
                                    @php
                                        foreach ($catgy as $k2 => $cat) {
                                            echo "<option value='". $cat ."'>". $cat ."</option>";
                                        }
                                    @endphp 
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="language">Enter Language
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Select language"></i></span>
                            </label>
                            <select id="language" name="language" class="form-control form-control-sm js-example-basic-single">
                                <option selected value="0">Select Language</option>
                                    @php
                                        foreach ($langa as $k3 => $lan) {
                                            echo "<option value='". $lan ."'>". $lan ."</option>";
                                        }
                                    @endphp  
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="country">Select country
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Select Country"></i></span>
                            </label>
                            <select id="country" name="country" class="form-control form-control-sm js-example-basic-single">
                                <option selected value="0">Select Country</option>
                                    @php
                                        foreach ($country as $k4 => $cont) {
                                            echo "<option value='". $cont ."'>". $cont ."</option>";
                                        }
                                    @endphp
                            
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="domain_name">Enter Domain Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter In Title"></i></span>
                            </label>
                            <input type="text" id="domain_name" name="domain_name" class="form-control form-control-sm" placeholder="Enter Domain Name">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="company">Enter Company
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Company Name"></i></span>
                            </label>
                            <input type="text" id="company" name="company" class="form-control form-control-sm" placeholder="Enter Company Name">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sort_by">Enter Sort By
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter In Title"></i></span>
                            </label>
                            <input type="text" id="sort_by" name="sort_by" class="form-control form-control-sm" placeholder="Enter Domain Name">
                        </div>

                        
                        <div class="form-group col-md-6">
                            <label for="from_date">From Date
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter from_date"></i></span>
                            </label>
                            <input type="date" id="from_date" name="from_date" class="form-control form-control-sm" placeholder="from_date">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="to_date">To Date
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter to_date"></i></span>
                            </label>
                            <input type="date" id="to_date" name="to_date" class="form-control form-control-sm" placeholder="to_date">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="page">Select Page
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Select page"></i></span>
                            </label>
                            <select id="page" name="page" class="form-control form-control-sm js-example-basic-single">
                                <option selected value="0">Select page</option>
                                @php
                                    for ($k=1; $k <= 10; $k++) {
                                        echo "<option value='". $k ."'>". $k ."</option>";
                                    }
                                @endphp
                            </select>
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