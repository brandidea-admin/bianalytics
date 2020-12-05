@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<style type="text/css">
    .custom-row{
        border: 1px solid gainsboro;
        padding: 10px;
        margin: auto !important;
    }
    .custom-col{
        overflow: scroll;
        border-right: 1px solid gainsboro;
        padding: 10px 5px;
        margin: 0px;
    }
</style>
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lead</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Leads</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
         
        <button type="button" data-url="#" data-method="POST" data-request="ajax-confirm" data-ask_image="warning" data-ask="Are you sure you want to delete?"  class="btn btn-sm btn-danger deletebulk btn-icon-text mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="trash"></i>
            Delete
        </button>
    </div>
</div>
 
@endsection

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
 
@endpush