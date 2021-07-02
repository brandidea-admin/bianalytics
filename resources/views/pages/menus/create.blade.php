@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/user') }}">Menus</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add New Menu</li>
    </ol>
</nav>

<!-- <div class="text-center dimback">
    <div id="psdatasourcSpinner" class="spinner-border text-primary" style="width: 5rem; height: 5rem; display: none; margin-top:25px;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div> -->

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <form action="{{url('/menus')}}" method="POST" role="search">
            {{ csrf_field() }}
                <div class="card-header">
                    <h4 class="mb-3 mb-md-0">Add New Menu</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Select Root Menu</label>
                            <select id="parent-1" name="parent-1" class="js-example-basic-single">
                                <option value="0" selected>--- None ---</option>
                            </select>

                            <div id="parent2-show" style="display:none;">
                                <label>Select Level 2 Menu</label>
                                <select id="parent-2" name="parent-2" style="width: 100%;">
                                    <option value="">--- None ---</option>
                                </select>

                                <div id="parent3-show" style="display:none;">
                                    <label>Select Level 3 Menu</label>
                                    <select id="parent-3" name="parent-3" style="width: 100%;">
                                        <option value="">--- None ---</option>
                                    </select>

                                    <div id="parent4-show" style="display:none;">
                                        <label>Select Level 4 Menu</label>
                                        <select id="parent-4" name="parent-4" style="width: 100%;">
                                            <option value="">--- None ---</option>
                                        </select>

                                        <div id="parent5-show" style="display:none;">
                                            <label>Select Level 5 Menu</label>
                                            <select id="parent-5" name="parent-5" style="width: 100%;">
                                                <option value="">--- None ---</option>
                                            </select>

                                            <div id="parent6-show" style="display:none;">
                                                <label>Select Level 6 Menu</label>
                                                <select id="parent-6" name="parent-6" style="width: 100%;">
                                                    <option value="">--- None ---</option>
                                                </select>

                                                <div id="parent7-show" style="display:none;">
                                                    <label>Select Level 7 Menu</label>
                                                    <select id="parent-7" name="parent-7" style="width: 100%;">
                                                        <option value="">--- None ---</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        
                      

                        <div class="form-group col-md-6">    
                            <label for="firstname">Enter Menu Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter First Name"></i></span>
                            </label>
                            <input type="text" id="menu_name" name="menu_name" class="form-control" placeholder="Enter Menu Name">
                        </div>

                       
                        <div class="form-group col-md-6">
                            <label for="keyword_1">Enter Parent ID
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Parent ID"></i></span>
                            </label>
                            <input type="text" readonly id="parent_id" name="parent_id" class="form-control" placeholder="Enter Parent ID">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lastname">Reference ID (Auto-Generated)
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Auto-Generated - No need to fill"></i></span>
                            </label>
                            <input type="text" value="999999" readonly id="refid" name="refid" class="form-control" placeholder="Enter Ref. ID">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="keyword_1">Enter Order ID
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Enter Order ID"></i></span>
                            </label>
                            <input type="text" id="order_fld" name="order_fld" class="form-control" placeholder="Enter Order ID">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="country_site">Select Status Type
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Select Status"></i></span>
                            </label>
                            <select id="stat" name="stat" class="js-example-basic-single">
                                <option value="0">Select Status</option>
                                <option value="A">Active</option>
                                <option value="R">Remove</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" data-request="ajax-submit" data-target='[role="energy"]' class="btn btn-sm btn-primary submit">Submit</button>
                        <a href="{{ url('/menus') }}" class="btn btn-sm btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#parent_id").attr("value", 0);

        // Tags
        $('#tags').tagsInput({
            'height': 'auto',
            'width': '100%',
            'interactive': true,
            'defaultText': 'Add More',
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 20,
            'placeholderColor': '#666666'
        });


        $.ajax({
            type: 'GET',
            data: { menuid: 0},
            url: "{{ route('menuss.child') }}",
            beforeSend: function(){
                $("#loader").show();
            },
            complete: function() {
                $("#loader").hide();
            },
            success: function(data) {
            
            //$('#parent-1 option').remove();

                    console.log(data);
                    //var json = JSON.parse(data);
                    //var result = $.parseJSON(data);

                    $.each(data, function(k, v) {
                        //display the key and value pair
                        //console.log(v['refid'] + ' is ' + v['menu_name']);
                        $('#parent-1').append('<option value="'+v['refid']+'">'+v['menu_name']+'</option>');
                    });
                
                }

        });

        $("#parent-1").change(function () {
            
            var selectedValue = $(this).val();
            // alert(" Value: " + selectedValue);
            // return false;

            $('#parent_id').val(selectedValue);

            $('#parent2-show').show();

            $.ajax({
                type: 'GET',
                data: { menuid: selectedValue},
                url: "{{ route('menuss.child') }}",
                beforeSend: function(){
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(data) {
                
                        console.log(data);
                        // var json = JSON.parse(data);
                        // var result = $.parseJSON(data);

                        $.each(data, function(k, v) {
                            //display the key and value pair
                            console.log(k + ' is ' + v);
                            $('#parent-2').append('<option value="'+v['refid']+'">'+v['menu_name']+'</option>');
                        });
                    
                    }

            });
            
        });



        $("#parent-2").change(function () {
            
            var selectedValue = $(this).val();
            // alert(" Value: " + selectedValue);
            // return false;

            $('#parent_id').val(selectedValue);

            $('#parent3-show').show();

            $.ajax({
                type: 'GET',
                data: { menuid: selectedValue},
                url: "{{ route('menuss.child') }}",
                beforeSend: function(){
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(data) {
                
                //$('#parent-2 option').remove();

                        console.log(data);
                        // var json = JSON.parse(data);
                        // var result = $.parseJSON(data);

                        $.each(data, function(k, v) {
                            //display the key and value pair
                            console.log(k + ' is ' + v);
                            $('#parent-3').append('<option value="'+v['refid']+'">'+v['menu_name']+'</option>');
                        });
                    
                    }

            });
            
        });


        $("#parent-3").change(function () {
            
            var selectedValue = $(this).val();
            // alert(" Value: " + selectedValue);
            // return false;

            $('#parent_id').val(selectedValue);

            $('#parent4-show').show();

            $.ajax({
                type: 'GET',
                data: { menuid: selectedValue},
                url: "{{ route('menuss.child') }}",
                beforeSend: function(){
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(data) {
                
                //$('#parent-2 option').remove();

                        console.log(data);
                        // var json = JSON.parse(data);
                        // var result = $.parseJSON(data);

                        $.each(data, function(k, v) {
                            //display the key and value pair
                            console.log(k + ' is ' + v);
                            $('#parent-4').append('<option value="'+v['refid']+'">'+v['menu_name']+'</option>');
                        });
                    
                    }

            });
            
        });


        $("#parent-4").change(function () {
            
            var selectedValue = $(this).val();
            // alert(" Value: " + selectedValue);
            // return false;

            $('#parent_id').val(selectedValue);

            $('#parent5-show').show();

            $.ajax({
                type: 'GET',
                data: { menuid: selectedValue},
                url: "{{ route('menuss.child') }}",
                beforeSend: function(){
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(data) {
                
                //$('#parent-2 option').remove();

                        console.log(data);
                        // var json = JSON.parse(data);
                        // var result = $.parseJSON(data);

                        $.each(data, function(k, v) {
                            //display the key and value pair
                            console.log(k + ' is ' + v);
                            $('#parent-5').append('<option value="'+v['refid']+'">'+v['menu_name']+'</option>');
                        });
                    
                    }

            });
            
        });


        $("#parent-5").change(function () {
            
            var selectedValue = $(this).val();
            // alert(" Value: " + selectedValue);
            // return false;

            $('#parent_id').val(selectedValue);

            $('#parent6-show').show();

            $.ajax({
                type: 'GET',
                data: { menuid: selectedValue},
                url: "{{ route('menuss.child') }}",
                beforeSend: function(){
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(data) {
                
                //$('#parent-2 option').remove();

                        console.log(data);
                        // var json = JSON.parse(data);
                        // var result = $.parseJSON(data);

                        $.each(data, function(k, v) {
                            //display the key and value pair
                            console.log(k + ' is ' + v);
                            $('#parent-6').append('<option value="'+v['refid']+'">'+v['menu_name']+'</option>');
                        });
                    
                    }

            });
            
        });


        $("#parent-6").change(function () {
            
            var selectedValue = $(this).val();
            // alert(" Value: " + selectedValue);
            // return false;

            $('#parent_id').val(selectedValue);

            $('#parent7-show').show();

            $.ajax({
                type: 'GET',
                data: { menuid: selectedValue},
                url: "{{ route('menuss.child') }}",
                beforeSend: function(){
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(data) {
                
                //$('#parent-2 option').remove();

                        console.log(data);
                        // var json = JSON.parse(data);
                        // var result = $.parseJSON(data);

                        $.each(data, function(k, v) {
                            //display the key and value pair
                            console.log(k + ' is ' + v);
                            $('#parent-7').append('<option value="'+v['refid']+'">'+v['menu_name']+'</option>');
                        });
                    
                    }

            });
            
        });





        $('.submit').click(function() {

            if($('#menu_name').val()=="" || $('#refid').val()=="" || $('#parent_id').val()=="") {
                alert("Menu details info missing or Type should not blank !!!");
                 return false;
            }

        });

        // Multi Select
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }
       
    });
</script>
@endpush