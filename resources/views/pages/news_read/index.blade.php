@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@php
header('Access-Control-Allow-Origin: *');
@endphp

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">News Read</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">News Read</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="/news_read/create" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create News Read
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="searchList" class="table table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="example-select-all"></th>
                                <th>News Search Name</th>
                                <th>News Type</th>
                                <th>Keywords</th>
                                <th>Category</th>
                                <th>Source Site</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($searchlist))
                            @foreach($searchlist as $slist)
                            <tr>
                                <td><input type="checkbox" value="{{$slist->id}}" class="checkSingle" name="select_all[]"></td>
                                <td>{{$slist->newsread_name}}</td>
                                <td>{{$slist->news_type}}</td>
                                <td>{{$slist->keywords}}</td>
                                <td>{{$slist->category}}</td>
                                <td>{{$slist->news_source_from}}</td>
                                <td>
                                    <form action="/news_read/destroy" method="post">
                                        <input type="hidden" name="energy_id" value="">
                                        <div class="custom-control custom-switch">

                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info btn-icon-text recid" data-toggle="tooltip" data-placement="bottom" alt="http://localhost:5002/create_email_permut.php?keyword={{$slist->keywords}}&category={{$slist->category}}&country={{$slist->country}}&language={{$slist->language}}&sources={{$slist->news_source_from}}&domain1={{$slist->domain_name}}&infocateg={{$slist->news_type}}&uid=1&rid={{$slist->id}}" title="Create Search News">
                                        <i class="fas fa-cog"></i>
                                    </a>
                                    <a href="{{url('/news_read/'.$slist->id.'/gennews')}}" class="btn btn-sm btn-info btn-icon-text" data-toggle="tooltip" data-placement="bottom" title="View News">
                                        <i class="fas fa-eye text-white"></i>
                                    </a>
                                    <a href="{{url('/news_read/'.$slist->id.'/edit')}}" class="btn btn-sm btn-warning btn-icon-text" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger delete" title="Delete Record">
                                        <form action="{{ url('/news_read/'.$slist->id) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                        <i class="fas fa-trash text-white"></i>
                                    </a>
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

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {
        $('#searchList').DataTable();
        
        $(".recid").click(function() {
            var url1 = $(this).attr("alt");
            alert("New window will open for backend process !!! Do not try to Close window immediately");
            var myWindow = window.open(url1, "newwin", "width=500, height=200, top=0, left=0", target = "_blank");
            setTimeout(function() {
                myWindow.close();
            }, 5000);
        });
    });
    
    $(".delete").click(function() {
        r = confirm("Are You Sure to delete this");
        if (r == true) {
            $(this).find('form').submit();
        } else {
            return false;
        }
    });
</script>
@endpush