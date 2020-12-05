@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Permutated Email IDs</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Permutated Email IDs</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">

        <a href="{{url('/email_permut/'.$id.'/validemail')}}" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="back"></i>
            Validate Email IDs
        </a>


        <a href="/email_permut" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="back"></i>
            Back Index
        </a>

    </div>
</div>

@php
$textCnt  = "C:\/xampp\htdocs\lead_generation_backend\permut\permutemails_1_5.txt";
$contents = file_get_contents($textCnt);
$arrfields = explode(',', $contents);

//print_r($arrfields);
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
                            <th>Eamil ID</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($arrfields as $m => $sl)
                            <tr>
                                <td>{{$m+1}}</td>
                                <td>{{$sl}}</td>
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