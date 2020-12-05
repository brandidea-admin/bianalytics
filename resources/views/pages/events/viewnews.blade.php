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

<meta name="csrf-token" content="{{ csrf_token() }}">

@php

//print_r($conts->articles);
//exit;

@endphp

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Events</li>
    </ol>
</nav>

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Events</h4>
    <table><tr><td>
        <select id="keyword">
        <option value='0'>--- None ---</option>
        @foreach($kwds as $kwd)
            <option value="{{$kwd['id']}}"> {{$kwd['keyword']}} </option>;
        @endforeach
    </select></td><td>
    <a href="{{url('/events')}}" class="btn btn-sm btn-info btn-icon-text" data-toggle="tooltip" data-placement="bottom" title="Back to Index">
            <i class="fas fa-eye text-white"></i>
    </a>
    </td>
    
    
    </tr></table>

    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card shadow-lg">
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

                        @if(!empty($conts->articles))
                            @foreach($conts->articles as $slist)

                            <tr>
                                <td title="{{$slist->source->id}}, {{$slist->source->name}}">{{substr($slist->source->id,0,10)}}</td>
                                <td title="{{$slist->author}}">{{substr($slist->author,0,10)}}</td>
                                <td title="{{$slist->title}}">{{substr($slist->title,0,10)}}</td>
                                <td title="{{$slist->description}}">{{substr($slist->description,0,10)}}</td>
                                <td><a href="{{$slist->url}}" taraget="_blank">{{substr($slist->url, 0, 10)}}</a></td>
                                <td><a href="{{$slist->urlToImage}}" taraget="_blank">{{substr($slist->urlToImage, 0, 10)}}</a></td>
                                <td title="{{$slist->publishedAt}}">{{substr($slist->publishedAt,0,10)}}</td>
                                <td title="{{$slist->content}}">{{substr($slist->content,0,20)}}</td>
                            </tr>

                            @endforeach
                        @endif

                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                               
                        </tbody>

                        </form>
                                

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
        
        // Multi Select
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }



        $(document).on('click', '#topheadnews', function() {

            var kyeid = $("#keyword").val();

            var selectedText1 = $("#keyword option:selected").html();
            
            alert(selectedText1+" "+kyeid);
            // return false;

            var newsurl3 = "http://localhost:5003/create_email_permut.php?keyword="+selectedText1+"&id="+kyeid;

            var myWindow = window.open(newsurl3, "newwin", "width=300, height=100, top=0, left=0", target="_blank");

            setTimeout(function(){
                    myWindow.close();
            },3000);



                $.ajax({
                    type: 'POST',
                    url: '/event/'+kyeid+'/showtopnews',
                    data: '',
                    async:false,
 
                    beforeSend: function(aaa) {
                       // alert(aaa);
                    },
                    success: function(data) {
                        // alert("Yesssssssssss    "+data);
                        // return false;
                        
                        //$('#reference_source').val('');
                        // setTimeout(function() {
                        //     $('.modal').modal('hide');
                        // }, 5000);

                        //var data1 = $.parseJSON(data);
                        //console.log(data.keyword);
                        //console.log(data1.articles);
                        //return false;
                        
                    }

                });

            return false;
                
        });


       
    });

</script>

@endpush