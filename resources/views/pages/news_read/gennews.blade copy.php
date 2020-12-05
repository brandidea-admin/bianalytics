@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">News Read</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">News Read View</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">


        <a href="/news_read" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="back"></i>
            Back Index
        </a>

    </div>
</div>

@php
list($id,$nstype) = explode("~~~",$data2);

if($nstype=="TopHeadlines") {
    $textCnt  = "C:\/xampp\htdocs\lead_generation_backend\permut\/topheadlines_"."1"."_".$id.".json";
} else if($nstype=="Everything") {
    $textCnt  = "C:\/xampp\htdocs\lead_generation_backend\permut\/everything_"."1"."_".$id.".json";
} else if($nstype=="Sources") {
    $textCnt  = "C:\/xampp\htdocs\lead_generation_backend\permut\/sources_"."1"."_".$id.".json";
}

//echo  $textCnt . " <<<==== " . $nstype;
//exit;

$contents = file_get_contents($textCnt);
$news_json = json_decode($contents, true); 

if (!empty($news_json['totalResults'])) { $res = "Total Results : " . $news_json['totalResults']; }
else {$res = "";}

//print_r($news_json);
//exit;
$ii=1;
@endphp

<h5>{{$res}}</h5>

<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="searchList" class="table table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                            <th>No.</th>
                            <th>News Info</th>
                            </tr>
                        </thead>
                        <tbody>

                @if($nstype != "Sources")

                        @foreach($news_json['articles'] as $info)
                            <tr>
                                <td style="text-align:center; vertical-align:top;">{{$ii}}</td>
                                <td style="text-align:left; vertical-align:top; overflow-wrap:break-word;">

                                @php 
                                    echo "<b>Author : " . $info['author'] . "</b></br></br><b>Title : </b>" . $info['title'] . "</b></br></br><b>Description : </b>" . $info['description']  . "</b></br></br><b>URL : </b>" . $info['url']  . "</b></br></br><b>Url to Image : </b>" . $info['urlToImage']  . "</b></br></br><b>Published At : </b>" . $info['publishedAt']  . "</b></br></br><b>Content : </b>" . $info['content']; 

                                    $ii++;
                                @endphp

                                </td>
                            </tr>
                        @endforeach

                    @else 

                        @foreach($news_json['sources'] as $info)
                            <tr>
                                <td style="text-align:center; vertical-align:top;">{{$ii}}</td>
                                <td style="text-align:left; vertical-align:top; overflow-wrap:break-word;">

                                @php 
                                    echo "<b>Id : " . $info['id'] . "</b></br></br><b>Name : </b>" . $info['name'] . "</b></br></br><b>Description : </b>" . $info['description']  . "</b></br></br><b>URL : </b>" . $info['url']  . "</b></br></br><b>Category : </b>" . $info['category']  . "</b></br></br><b>Language : </b>" . $info['language']  . "</b></br></br><b>Country : </b>" . $info['country']; 

                                    $ii++;
                                @endphp

                                </td>
                            </tr>
                        @endforeach

                    @endif

                        </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('custom-scripts')
 
@endpush