@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<style type="text/css">
    .custom-row {
        border: 1px solid gainsboro;
        padding: 10px;
        margin: auto !important;
    }

    .custom-col {
        overflow: scroll;
        border-right: 1px solid gainsboro;
        padding: 10px 5px;
        margin: 0px;
    }
</style>
@endpush

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">News</li>
    </ol>
</nav>

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">News</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card shadow-lg">
            <div class="card-header text-right d-flex align-items-center flex-wrap text-nowrap">
                <div>
                    <select id="keyword" class="form-control">
                        <option value='0'>--- None ---</option>
                        @foreach($kwds as $nn => $kwd)
                          <option value="{{$nn}}"> {{$kwd}} </option>
                        @endforeach
                    </select>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" id="topheadnews" class="btn btn-sm btn-info btn-icon-text" data-toggle="tooltip" data-placement="bottom" title="View Top Healines">
                    <i class="fas fa-cog"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="eventLog" class="table table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Source</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>URL</th>
                                <th>url to Image</th>
                                <th>publishedAt</th>
                                <th>content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <form id="myform" class="form-inline my-2 my-lg-0">

                                @if(!empty($conts))

                                @foreach($kwds as $kk=>$kwd)
                                <tr style='background-color:#F4F6F6; text-align:center;'>
                                    <th colspan="9">{{strtoupper($kwds[$kk])}}</th>
                                </tr>

                                @if(!empty($conts[$kk]->articles))

                                @foreach($conts[$kk]->articles as $slist)
                                <tr>
                                    <td title="{{$slist->source->id}}, {{$slist->source->name}}">{{substr($slist->source->id,0,10)}}</td>
                                    <td title="{{$slist->author}}">{{substr($slist->author,0,10)}}</td>
                                    <td title="{{$slist->title}}">{{substr($slist->title,0,10)}}</td>
                                    <td title="{{$slist->description}}">{{substr($slist->description,0,10)}}</td>
                                    <td><a href="{{$slist->url}}" taraget="_blank">{{substr($slist->url, 0, 10)}}</a></td>
                                    <td><a href="{{$slist->urlToImage}}" taraget="_blank">{{substr($slist->urlToImage, 0, 10)}}</a></td>
                                    <td title="{{$slist->publishedAt}}">{{substr($slist->publishedAt,0,10)}}</td>
                                    <td title="{{$slist->content}}">{{substr($slist->content,0,20)}}</td>
                                    <td></td>
                                </tr>
                                @endforeach

                                @else
                                <tr>
                                    <td colspan="9" style='text-align:center;'>No News Today</td>
                                </tr>
                                @endif
                                @endforeach
                                @endif

                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <div class="dynamic_keyword"></div>
                        </tbody>
                        </form>
                </div>
                </table>
            </div>

            <div class="table-responsive2" style="display:none;">
                <form id="myform" class="form-inline my-2 my-lg-0">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Multi Select
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }

        $(document).on('click', '#topheadnews', function() {
            var kyeid = $("#keyword").val();
            var selectedText1 = $("#keyword option:selected").html();
            $.ajax({
                type: 'POST',
                url: '/leadhunter/public/events/' + kyeid + '/viewnews',
                data: 'id=' + kyeid,
                async: false,

                beforeSend: function(aaa) {
                    // alert(aaa);
                },
                success: function(data) {
                    //console.log("Yesssssssssss "+data);
                    //return false;
                    $(".table-responsive").hide();
                    $(".table-responsive2").html(data);
                    $(".table-responsive2").show();
                    // return false;
                }
            });
        });
    });
</script>
@endpush