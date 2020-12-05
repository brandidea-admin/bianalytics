@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Search List</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Search List</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="/search_list/create" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Add Search List
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
                                <th>Search Name</th>
                                <th>Keyword 1</th>
                                <th>Keyword 2</th>
                                <th>Keyword 3</th>
                                <th>Date</th>
                                <th>Actions</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                @if(!empty($searchlist))
                                @foreach($searchlist as $slist)
                                <tr>
                                    <td><input type="checkbox" value="{{$slist->id}}" class="checkSingle" name="select_all[]"></td>
                                    <td>{{$slist->search_name}}</td>
                                    <td>{{$slist->keyword_1}}</td>
                                    <td>{{$slist->keyword_2}}</td>
                                    <td>{{$slist->keyword_3}}</td>
                                    <td>{{substr($slist->created_at,0,10)}}
                                        @php
                                        $url6 = "id=" . $slist->id . "&country=". urlencode($slist->country) . "&jobtitle=". urlencode($slist->job_title) ."&keyword=" . str_replace(" ","%20",$slist->keyword) . "&keyexclude=". str_replace(" ","%20",$slist->key_exclude) . "&intitle=" . urlencode($slist->in_title) . "&inurl=". urlencode($slist->in_url) . "&company=" . str_replace(" ","%20",$slist->company);
                                        @endphp
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info btn-icon-text" data-toggle="tooltip" data-placement="bottom" alt="{{$url6}}" title="Generate Links">
                                            <i class="fas fa-cog"></i>
                                        </a>
                                        <a href="{{url('/search_list/'.$slist->id.'/genlinks')}}" class="btn btn-sm btn-info btn-icon-text" data-toggle="tooltip" data-placement="bottom" title="View Links">
                                            <i class="fas fa-eye text-white"></i>
                                        </a>
                                        <a href="{{url('/search_list/'.$slist->id.'/edit')}}" class="btn btn-sm btn-warning btn-icon-text" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                            <i class="fas fa-edit text-white"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('search_list.destroy', $slist->id)}}" class="myForm1" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash text-white"></i> </button>
                                        </form>

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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajaxSetup({
            animation: "spinner"
        });


        // $('.genSearchlinks').click(function() {
        //     $('#psdatasourcSpinner').show();
        //     var utl6a = $(this).attr("alt");
        //     var leadid = 1;
        //     $.ajax({
        //         type: 'POST',
        //         url: '/search_list/' + leadid + '/gensearchlinks',
        //         data: utl6a,
        //         complete: function() {
        //             $('#psdatasourcSpinner').hide();
        //         },
        //         success: function(data) {
        //             alert("Search Links created Successfully !!!");
        //             console.log(data);
        //             setTimeout(function() {
        //                 $('.modal').modal('hide');
        //             }, 1000);
        //         }
        //     });
        //     return false;
        // });
    });

    $(function() {
        $('#searchList').DataTable();
    });

    $('.myForm1').submit(function() {
        var status = confirm("Are you sure to Delete this record ?");
        if(status == false){
        return false;
        }
        else{
        return true; 
        }
    });

</script>
@endpush

