@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Leads</li>
    </ol>
</nav>


<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Leads</h4>
    </div>
    <!-- <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="#" id="validate-email" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Validate Email IDs
        </a>
    </div> -->
</div>

<div class="text-center">
    <div id="psdatasourcSpinner" class="spinner-border text-primary" style="width: 5rem; height: 5rem;display: none; margin-top:25px;" role="status">
        <span class="sr-only">Loading...</span>
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
                                <th>Lead Info</th>
                                <th>Company</th>
                                <th>Domain</th>
                                <th>Keyword</th>
                                <th>News</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($searchlist))
                            @foreach($searchlist as $slist)
                            <tr>
                                <!-- <td>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="chkids" alt="{{$slist->id}}~~~{{$slist->first_name}}~~~{{$slist->last_name}}~~~{{$slist->location}}" size=1 class="form-check-input input-check">
                                            <i class="input-frame"></i>
                                        </label>
                                    </div>
                                </td> -->
                                <td title="{{$slist->emails}}">
                                    <p>{{$slist->first_name}} {{$slist->last_name}}</p>
                                    <p>Email: {{substr($slist->emails,0,25)}}</p>
                                    <p>Phone No.: {{$slist->phones}}</p>
                                    <p>Designation: {{$slist->designaion}}</p>
                                </td>
                                <td title="{{$slist->company}}">{{$slist->company}}</td>
                                <td title="{{$slist->location}}">{{$slist->location}}</td>
                                <td>
                                    @php
                                    if(isset($slist->keyword)) {
                                    list($kw1,$kw2,$kw3) = explode(",",$slist->keyword);
                                    } else {
                                    $kw1 = 0;
                                    $kw2 = 0;
                                    $kw3 = 0;
                                    }
                                    @endphp

                                    <select id="keyword{{$slist->id}}_1">
                                        <option value='0'>--- None ---</option>
                                        @foreach($kwds as $kwd)
                                        @if($kwd['id'] == $kw1)
                                        <option selected value="{{$kwd['id']}}"> {{$kwd['keyword']}} </option>
                                        @else
                                        <option value="{{$kwd['id']}}"> {{ $kwd['keyword'] }} </option>
                                        @endif
                                        @endforeach
                                    </select>

                                    <select id="keyword{{$slist->id}}_2">
                                        <option value='0'>--- None ---</option>
                                        @foreach($kwds as $kwd)
                                        @if($kwd['id'] == $kw2)
                                        <option selected value="{{$kwd['id']}}"> {{$kwd['keyword']}} </option>
                                        @else
                                        <option value="{{$kwd['id']}}"> {{ $kwd['keyword'] }} </option>
                                        @endif
                                        @endforeach
                                    </select>

                                    <select id="keyword{{$slist->id}}_3">
                                        <option value='0'>--- None ---</option>
                                        @foreach($kwds as $kwd)
                                        @if($kwd['id'] == $kw3)
                                        <option selected value="{{$kwd['id']}}"> {{$kwd['keyword']}} </option>
                                        @else
                                        <option value="{{$kwd['id']}}"> {{ $kwd['keyword'] }} </option>
                                        @endif
                                        @endforeach
                                    </select>

                                </td>
                                <td>
                                    <a href="#" id="viewnews" alt="{{$slist->id}}" class="btn btn-sm btn-info btn-icon-text" data-toggle="tooltip" data-placement="bottom" title="View News">
                                        <i class="fas fa-eye text-white"></i>
                                    </a>
                                    <a href="{{url('/lead/'.$slist->id.'/validemail')}}" class="btn btn-sm btn-warning btn-icon-text spinner" data-toggle="tooltip" data-placement="bottom" title="Generate Email IDs">
                                        <i class="fas fa-check text-white"></i>
                                    </a>
                                    <a href="{{url('/lead/'.$slist->id.'/validemail2')}}" class="btn btn-sm btn-warning btn-icon-text spinner" data-toggle="tooltip" data-placement="bottom" title="Validate Email IDs">
                                        <i class="fas fa-envelope text-blue"></i>
                                    </a>
                                </td>
                                <td>
                                    <!-- <a href="{{url('/leads/'.$slist->id.'/edit')}}" class="btn btn-sm btn-warning btn-icon-text" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                            <i class="fas fa-edit text-white"></i>
                                        </a> -->

                                    <form action="{{ route('lead.destroy', $slist->id)}}" class="myForm1" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash text-white"></i> </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
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
<script src="{{ asset('/assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {
        $('#searchList').DataTable();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajaxSetup({
            animation: "spinner"
        });

        // Multi Select
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }

        $('.spinner').click(function() {
            $('#psdatasourcSpinner').show();
        });


        $(document).on('click', '#viewnews', function() {
            $('#psdatasourcSpinner').show();
            var leadid = $(this).attr("alt");
            var kwd1 = $("#keyword" + leadid + "_1").val();
            var kwd2 = $("#keyword" + leadid + "_2").val();
            var kwd3 = $("#keyword" + leadid + "_3").val();
            var tottxt2 = "kwdid1=" + kwd1 + "&kwdid2=" + kwd2 + "&kwdid3=" + kwd3;
            $.ajax({
                type: 'POST',
                url: '/lead/' + leadid + '/viewnews',
                data: tottxt2,
                complete: function() {
                    $('#psdatasourcSpinner').hide();
                },
                success: function(data) {
                    Swal.fire({
                        title: '<strong>News</strong>',
                        icon: '',
                        html: data,
                        showCloseButton: true,
                        //showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                    });
                }
            });
            return false;
        });



        $('#111validate-email').click(function() {
            // alert("Yesssss");
            // return false;
            $('#psdatasourcSpinner').show();
            $('input[name="chkids"]:checked').each(function() {
                var leadid = $(this).attr("alt");
                var values = leadid.split("~~~");
                let _token   = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:3000/generate_emails',
                    data:{
                        first_name:values[1],
                        last_name:values[2],
                        nick_name:"",
                        middle_name:"",
                        domain_name_1: values[3],
                        domain_name_2: "",
                        domain_name_3: "",
                        _token: _token
                        },
                    async: false,
                    complete: function() {
                        $('#psdatasourcSpinner').hide();
                    },
                    success: function(data) {
                        alert("Email IDs Validated Successfully !!!");
                        console.log(data);
                        setTimeout(function() {
                            $('.modal').modal('hide');
                        }, 1000);
                    }
                });

            });
            return false;
        });

    });

    $('.myForm1').submit(function() {
        var status = confirm("Are you sure to Delete this record ?");
        if (status == false) {
            return false;
        } else {
            return true;
        }
    });
</script>
@endpush

