@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

<meta name="csrf-token" content="{{ csrf_token() }}">

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
        <a href="#" id="addlead" class="btn btn-sm btn-primary btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="back"></i>
            Add to Lead
        </a>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div style="display:none;" class="spinner-border" role="status">
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
                                <th>S.No</th>
                                <th></th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Designation</th>
                                <th>Domain Name</th>
                                <th>Company</th>
                                <th>Linkedin URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form id="myform" class="form-inline my-2 my-lg-0">
                                @foreach($cont1 as $mm => $sl)
                                <tr>
                                    <td>{{$mm+1}}</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="chkids" alt="{{$mm}}" size=2 class="form-check-input input-check leadid">
                                                <i class="input-frame"></i>
                                            </label>
                                        </div>
                                    </td>
                                    <td><input class="form-control mr-sm-2" id="fname_{{$mm}}" size=10 type="text" value="{{$sl[1]}}"></td>
                                    <td><input class="form-control mr-sm-2" id="lname_{{$mm}}" size=10 type="text" value="{{$sl[2]}}"></td>
                                    <td><input class="form-control mr-sm-2" id="desig_{{$mm}}" size=15 type="text" value="{{$sl[3]}}"></td>
                                    <td><input class="form-control mr-sm-2" id="dmid_{{$mm}}" size=20 disabled name="domainid" type="text" placeholder="Add Domains"></td>
                                    <td><input class="form-control mr-sm-2" id="comp_{{$mm}}" size=20 disabled type="text" value="{{$sl[11]}}"></td>
                                    <td><a href="{{$sl[18]}}" taraget="_blank" id="linkurl_{{$mm}}">{{substr($sl[18], 0, 10)}}</a></td>
                                </tr>
                                @endforeach
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".leadid").on('change', function() {
            var leadid = $(this).attr("alt");
            if (this.checked) {
                $("#dmid_" + leadid).prop('disabled', false);
                $("#comp_" + leadid).prop('disabled', false);
            } else {
                $("#dmid_" + leadid).val("");
                $("#dmid_" + leadid).prop('disabled', true);
                $("#comp_" + leadid).prop('disabled', true);
            }
        });
    });

    $(document).on('click', '#addlead', function() {
        $('input[name="chkids"]:checked').each(function() {
            var chkid = $(this).attr("alt");
            var dname = $("#dmid_" + chkid).val();
            var fname = $("#fname_" + chkid).val();
            var lname = $("#lname_" + chkid).val();
            var desig = $("#desig_" + chkid).val();
            var comp = $("#comp_" + chkid).val();
            var tottxt1 = "id=" + chkid + "&dname=" + dname + "&fname=" + fname + "&lname=" + lname + "&comp=" + comp + "&desig=" + desig;
            $.ajax({
                type: 'POST',
                url: 'addleadinfo',
                data: tottxt1,
                async: false,
                beforeSend: function(aaa) {
                    $('.d-flex').show();
                },
                complete: function() {
                    $('.d-flex').hide();
                },
                success: function(data) {
                    alert("Leads & Company Record Added Successfully !!!");
                    setTimeout(function() {
                        $('.modal').modal('hide');
                    }, 1000);
                }
            });
        });
        location.href = "http://localhost:8000/lead";
    });
</script>
@endpush