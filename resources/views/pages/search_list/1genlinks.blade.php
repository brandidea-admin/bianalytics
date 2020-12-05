@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

@php
foreach($cont1 as $arr6) {
   $newarr[$arr6['id']] = array("fullname" => $arr6['full_name'], "designation" => $arr6['designation'], "company" =>  $arr6['company'], "linkurl" => $arr6['linkedin_url']);
}
//print_r($newarr);
//exit;
@endphp

<div class="text-center">
    <div id="psdatasourcSpinner" class="spinner-border text-primary" style="width: 5rem; height: 5rem; display: none; margin-top:25px;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

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

<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="searchList" class="table table-hover table-bordered mb-0">
                        <thead>
                            <tr>
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

                            @foreach($newarr as $id5 => $arr7)

                                <tr>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="chkids" alt="{{$id5}}" size=1 class="form-check-input input-check leadid">
                                                <i class="input-frame"></i>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
@php
//print_r(explode(' ',$arr7['fullname']));
$output = preg_replace('/[^(\x20-\x7F)]*/','', $arr7['fullname']);
$var6 = explode(' ',$output);
if(isset($var6[0])) {
   $fnam1 = $var6[0];
}
if(isset($var6[1])) {
   $lnam1 = $var6[1];
}
if(isset($var6[2])) {
   $lnam1 = $var6[1] . " " . $var6[2];
}
if(isset($var6[3])) {
   $lnam1 = $var6[1] . " " . $var6[2] . " " . $var6[3];
}
@endphp

<input class="form-control mr-sm-2" id="fname_{{$id5}}" size=10 type="text" value="{{$fnam1 ?? ''}}">
</td>
<td><input class="form-control mr-sm-2" id="lname_{{$id5}}" size=10 type="text" value="{{$lnam1 ?? ''}}"></td>
                                    <td>
                                        @php
                                            $str5 = str_replace('"', '', $arr7['designation']);
                                            $str6 = str_replace('"', '', $arr7['company']);
                                            $str7 = substr(str_replace('"', '', $arr7['linkurl']),0,25);
                                            $str7a = str_replace('"', '', $arr7['linkurl']);
                                        @endphp
                                        <input class="form-control mr-sm-2" id="desig_{{$id5}}" size=30 type="text" value="{{$str5}}">
                                    </td>
                                    <td><input class="form-control mr-sm-2" id="dmid_{{$id5}}" size=20 disabled type="text" value="Add Domain Name"></td>
                                    <td><input class="form-control mr-sm-2" id="comp_{{$id5}}" size=35 disabled type="text" value="{{$str6}}"></td>
                                    <td><a href="{{$str7a}}" taraget="_blank" id="linkurl_{{$id5}}">{{$str7}}</a></td>
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

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
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

        $('#searchList').on('change', 'tbody input.leadid', function () {
           
            // return false;
            var leadid = $(this).attr("alt");
            //alert("Nooooooooooooooo  "+leadid);
            if (this.checked) {
                $("#dmid_" + leadid).prop('disabled', false);
                $("#comp_" + leadid).prop('disabled', false);
            } else {
                $("#dmid_" + leadid).val("");
                $("#dmid_" + leadid).prop('disabled', true);
                $("#comp_" + leadid).prop('disabled', true);
            }
        });

        // $(".leadid").on('change', function() {
        //     var leadid = $(this).attr("alt");
        //     // alert(leadid);
        //     // return false;
        //     if (this.checked) {
        //         $("#dmid_" + leadid).prop('disabled', false);
        //         $("#comp_" + leadid).prop('disabled', false);
        //     } else {
        //         $("#dmid_" + leadid).val("");
        //         $("#dmid_" + leadid).prop('disabled', true);
        //         $("#comp_" + leadid).prop('disabled', true);
        //     }
        // });

        $('#addlead').click(function() {
            $('#psdatasourcSpinner').show();
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
                    },
                    complete: function() {
                    },
                    success: function(data) {
                    }
                });
            });
            $('#psdatasourcSpinner').hide();
            alert("Leads & Company Record Added Successfully !!!");
            var newURL = window.location.protocol + "//" + window.location.host + "/"
            location.href = newURL+"lead";
            return false;
        });
    });

</script>
@endpush
