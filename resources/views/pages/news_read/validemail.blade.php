@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Validating Email IDs</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Validating Email IDs</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">

        <a href="{{url('/email_permut/'.$id.'/genpermut')}}" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="back"></i>
            Back Index
        </a>

    </div>
</div>

@php
$textCnt  = "C:\/xampp\htdocs\lead_generation_backend\permut\permutemails_"."1"."_".$id.".txt";
$contents = file_get_contents($textCnt);
$arrfields = explode(',', $contents);

//print_r($arrfields);
//exit;
$ch = curl_init();
//$url3 = "http://apilayer.net/api/check?access_key=b1ac895a91834072ae8df1e0c2205f7e&email=";
$url3 = "http://apilayer.net/api/check?access_key=638a972624c2f9b86cb281f6acc93069&email=";

foreach($arrfields as $k=>$emails)
{
    $url5 = $url3 . $emails . "&smtp=1&format=1";

    curl_setopt($ch, CURLOPT_URL, $url5); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $vars = json_decode($result, true);
    //print_r($vars);
    $status[$k] = $vars;
}
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
                            <th>Eamil ID</th>
                            <th>Validated Status</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($arrfields as $m => $sl)
                            <tr>
                                <td>{{$m+1}}</td>
                                <td>{{$sl}}</td>
                                <td>
                                    <table border="1">
                                    <?php 
                                        foreach($status[$m] as $mm=>$val5){
                                            if(is_array($val5) != 1) {
                                                echo "<tr><td width='50px'>". $mm . "</td><td width='150px'>" . $val5 . "</td></tr>";
                                            } else {
                                                echo "<tr><td width='50px'>". $mm . "</td><td width='150px'>False Error Code 999</td></tr>";
                                            }
                                        }
                                    ?>
                                    </table>
                                </td>
                                 <td><button>Add to List</button></td>
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