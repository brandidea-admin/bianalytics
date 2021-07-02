<nav class="sidebar">
    <div class="sidebar-header">
        <a href="http://www.brandidea.ai" target="_blank" class="sidebar-brand">
            <img src="{{ url('/storage/brandideaAnalytics_logo_new.png') }}" width="150" height="50" alt="" title="">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

@php
if(!isset($menuarr2)){
    $menuarr2 = array();
}
@endphp

    <div class="sidebar-body">

        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
            <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
            <!-- <input type="text" size="10" class="form-control"> -->
            <input class="date-own form-control" id="set-date" style="width: 250px;" type="text">
        </div>
    
        <ul class="nav">

        <div style="padding-top: 10px;">
          @foreach($menuarr2 as $k6 => $slist)

            <div class="sidebar-body submenu-{{$k6}}" style="display:none;">
                <table border="1" bgcolor="#FF3366" style="width:100%; text-align:center; padding-top: 5px; margin-bottom: 10px;">
                <tr>
                    @foreach($slist as $k7 => $menu2)
                    <td>
                        <a href="#" class="menu3" alt="{{$k7}}" style="color:#fff; font-size:x-small;">{{$menu2}}</a>
                    </td>
                    @endforeach
                </tr></table>

               <div class="apply-menus"></div>

                <table style="width:100%; text-align:center; padding-top: 15px; padding-bottom: 5px;">
                    <tr><td style="text-align:center;">
                        <button alt="{{$k6}}" class="btn btn-success gen-report"> Combine </button>
                    </td><td style="text-align:center;">
                        <button alt="{{$k6}}" class="btn btn-success gen-report2"> Split </button>
                    </td></tr>
                </table>

            </div>

          @endforeach

        </div>

            @if(!empty(Auth::user()->user_type) && Auth::user()->user_type == 'Admin')

            <li class="nav-item {{ active_class(['settings/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#mastermenu" role="button" aria-expanded="{{ is_active_route(['master_keyword/*']) }}" aria-controls="master_keyword">
                    <i class="link-icon" data-feather="tool"></i>
                    <span class="link-title">Settings</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['mastermenu/*']) }}" id="mastermenu">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/menus') }}" class="nav-link {{ active_class(['menus']) }}">Master Menu</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/countries') }}" class="nav-link {{ active_class(['country']) }}">Countries</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/user') }}" class="nav-link {{ active_class(['user']) }}">Users</a>
                        </li>

                    </ul>
                </div>
            </li>

            @endif

        </ul>

    </div>

</nav>

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {

        $('.gen-report').click(function() {

            var mid = $(this).attr("alt");

                console.log(mid + " <<==== " + window.regSelected + " <<==== " + window.maplevel + " <<==== " + window.mapType);

            $('.mystyle').show();
            // $('.chart-section').show();
            // $('.grid-section').show();

            if (window.mapType == "D" && window.regSelected == 1) {
                //alert("Yesssssssssss");
                var indstates = new Array(5);
                indstates[17] = {
                    "name": "Karnataka",
                    "coords": {
                        lat: "14.417656",
                        lng: "75.727984"
                    }
                };
                indstates[21] = {
                    "name": "Maharashtra",
                    "coords": {
                        lat: "19.394068",
                        lng: "75.912796"
                    }
                };
                indstates[18] = {
                    "name": "Kerala",
                    "coords": {
                        lat: "9.851969",
                        lng: "76.666816"
                    }
                };
                indstates[31] = {
                    "name": "Tamil Nadu",
                    "coords": {
                        lat: "10.798774",
                        lng: "78.302230"
                    }
                };
                indstates[2] = {
                    "name": "Andhra Pradesh",
                    "coords": {
                        lat: "15.029686",
                        lng: "78.900674"
                    }
                };
                indstates[69] = {
                    "name": "Telangana",
                    "coords": {
                        lat: "17.861655",
                        lng: "79.143047"
                    }
                };
                indstates[26] = {
                    "name": "Orissa",
                    "coords": {
                        lat: "20.336386",
                        lng: "84.471465"
                    }
                };
                console.log(indstates);

                indstates.forEach(function(value, index) {
                    //console.log(value.name + " <<<=== " + value.coords + " <<<=== " + index);

                    var piecht1 = L.piechartMarker(
                        L.latLng(value.coords),
                        //L.latLng([21.861499,78.695625]),
                        {
                            radius: 20,
                            data: [{
                                    name: 'Apples',
                                    value: 25,
                                    style: {
                                        fillStyle: 'red',
                                        lineWidth: 1
                                    }
                                },
                                {
                                    name: 'Oranges',
                                    value: 35,
                                    style: {
                                        fillStyle: 'blue',
                                        lineWidth: 1
                                    }
                                },
                                {
                                    name: 'Bananas',
                                    value: 20,
                                    style: {
                                        fillStyle: 'black',
                                        lineWidth: 1
                                    }
                                },
                                {
                                    name: 'Pines',
                                    value: 30,
                                    style: {
                                        fillStyle: 'green',
                                        lineWidth: 1
                                    }
                                },
                                {
                                    name: 'Fig',
                                    value: 70,
                                    style: {
                                        fillStyle: 'violet',
                                        lineWidth: 1
                                    }
                                }
                                //{ name: 'Fig', value: 70, style: { fillStyle: 'rgba(0,127,0,.6)', strokeStyle: 'rgba(0,127,0,.95)', lineWidth: 10 } }
                            ],
                        }
                    );
                    piecht1.addTo(map);

                    piecht1.on('mouseover', function(e) {
                        //open popup;
                        var popup1 = L.popup()
                            .setLatLng(e.latlng)
                            .setContent('<b>' + value.name + '</b></br><span style="color:blue;">Apples : 25<br/>Oranges : 35<br/>Bananas : 20<br/>Pines : 30<br/>Fig : 70<br/></span>')
                            .openOn(map);

                        piecht1.on('mouseout', function(e) {
                            //alert("Yesssssssss");
                            popup1.remove();
                            //piecht1.remove();
                        });

                    });
                });
            } else if (window.mapType == "S" && window.regSelected == 1) {
                //alert("QQQQQQQQQQQQQ");
                var country = new Array(1);
                country[1] = {
                    "name": "India",
                    "coords": {
                        lat: "22.073424",
                        lng: "79.092675"
                    }
                };

                country.forEach(function(value, index) {
                    var piecht1 = L.piechartMarker(
                        L.latLng(value.coords),
                        //L.latLng([21.861499,78.695625]),
                        {
                            radius: 50,
                            data: [{
                                    name: 'Apples',
                                    value: 25,
                                    style: {
                                        fillStyle: 'red',
                                        lineWidth: 1
                                    }
                                },
                                {
                                    name: 'Oranges',
                                    value: 35,
                                    style: {
                                        fillStyle: 'blue',
                                        lineWidth: 1
                                    }
                                },
                                {
                                    name: 'Bananas',
                                    value: 20,
                                    style: {
                                        fillStyle: 'black',
                                        lineWidth: 1
                                    }
                                },
                                {
                                    name: 'Pines',
                                    value: 30,
                                    style: {
                                        fillStyle: 'green',
                                        lineWidth: 1
                                    }
                                },
                                {
                                    name: 'Fig',
                                    value: 70,
                                    style: {
                                        fillStyle: 'violet',
                                        lineWidth: 1
                                    }
                                }
                                //{ name: 'Fig', value: 70, style: { fillStyle: 'rgba(0,127,0,.6)', strokeStyle: 'rgba(0,127,0,.95)', lineWidth: 10 } }
                            ],
                        }
                    );
                    piecht1.addTo(map);

                    piecht1.on('mouseover', function(e) {
                        //open popup;
                        var popup1 = L.popup()
                            .setLatLng(e.latlng)
                            .setContent('<b>' + value.name + '</b></br><span style="color:blue;">Apples : 25<br/>Oranges : 35<br/>Bananas : 20<br/>Pines : 30<br/>Fig : 70<br/></span>')
                            .openOn(map);

                        piecht1.on('mouseout', function(e) {
                            //alert("Yesssssssss");
                            popup1.remove();
                            //piecht1.remove();
                        });

                    });
                });


            }

        // $('.sidebar-toggler').click(function() {
        //     $('#toggle-calendar').hide();
        // });

        $('.menu3').click(function() {
            var menuid = $(this).attr("alt");
            alert(menuid);
            $.ajax({
                type: 'POST',
                url: "{{ url('/approvedeny.php?mid=') }}"+menuid,
                complete: function() {
                    $('#psdatasourcSpinner').hide();
                },
                success: function(data) {
                    //alert(data);
                    $(".apply-menus").html(data);
                }
            });
        });




            $(".leaflet-interactive").dblclick();
            var curmod = $(this).attr("alt");
            // alert(curmod);
            // return false;
            $('.chart-section').show();
            // $.ajax({
            //     type: 'get', 
            //     url : "{{url('/chart')}}", 
            //     success : function (data) {
            //         $(".chart-section").html(data);
            //     }
            // });

            if (curmod == 1) {
                var ctype = "pie";
            } else if (curmod == 2) {
                var ctype = "bar";
            } else {
                var ctype = "column";
            }

            $.ajax({
                type: 'POST',
                url: "{{url('/chart')}}/" + curmod + "/viewchart",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "chtype": ctype,
                    "module": curmod
                },
                success: function(data) {
                    $(".chart-section").html(data);
                }
            });

            $('.grid-section').show();

            $.ajax({
                type: 'get',
                url: "{{url('/grid')}}",
                success: function(data) {
                    $(".grid-section").html(data);
                }
            });

            return false;
        });

        $('.date-own').datepicker({
            minViewMode: 2,
            format: 'yyyy',
            autoclose: true
        }).on('changeDate', function(e) {
            console.log(e.format());
            var yr = e.format();
            var minDate = new Date(e.date.valueOf());
            var fyear = yr-1 + "-" + yr;
            //alert(fyear);
            $('#set-date').val("2020-2021");
        });

        var currentTime = new Date();
        var year = currentTime.getFullYear();
        var finyear = year-1 + "-" + year;
        $('#set-date').val(finyear);
        
    });
</script>

<style>
    .datepicker {
        background-color: #d3f9d8;
        color: blue;
        margin-left: 10px;;
    }
</style>
@endpush