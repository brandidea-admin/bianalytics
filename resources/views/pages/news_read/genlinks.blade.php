@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Search Result Info</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Search Result Info</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">

        <a href="/search_list" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="back"></i>
            Back Search List
        </a>

    </div>
</div>

@php
//echo "Yessssssssssssssssss";
//print_r($data1);

$textCnt  = "C:\/xampp\htdocs\lead_generation_backend\csvfile_record_" . $id . ".csv";
$contents = file_get_contents($textCnt);
$arrfields = explode('~~~~~ ', $contents);


foreach($arrfields as $content){
    //echo $content . "</br></br>";
    $cont1[] = explode(',', $content);
}
array_pop($cont1);
//print_r($cont1);
//exit;

@endphp


<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="searchList" class="table table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                            <th>S.No</th>
                            <th>First Name</th>
                            <th width="50px">Last Name</th>
                            <th>Designation</th>
                            <th>EMail 1</th>
                            <th>EMail 2</th>
                            <th>EMail 3</th>
                            <th>EMail 4</th>
                            <th>Phone 1</th>
                            <th>Phone 2</th>
                            <th>Phone 3</th>
                            <th>Company</th>
                            <th>Company type</br>(Brand Manufacturer)</th>
                            <th>Company Phone</th>
                            <th>Company Address</th>
                            <th>Company Description</th>
                            <th>Location</th>
                            <th>Tags (cheminformatics, circular economy, process simulation, manufacturing optimization, recycling, AI, sustainability)</th>
                            <th>Keywords</th>
                            <th>Linkedin URL</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($cont1 as $m => $sl)
                            <tr>
                                <td>{{$m+1}}</td>
                                <td>{{$sl[1]}}</td>
                                <td>{{$sl[2]}}</td>
                                <td>{{$sl[3]}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{$sl[11]}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{$sl[18]}}</td>
                            </tr>
                        @endforeach

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