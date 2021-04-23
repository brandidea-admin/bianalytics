
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
    @if(strpos(Request::path(), 'user') !== false)
    @else
    <div class="period-calendar" style="padding-left: 15px; padding-top: 10px;">
        <div class="input-group date datepicker dashboard-date" id="dashboardDate">
            <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
            <input type="text" class="form-control">
        </div>
    </div>
    <hr>
    @endif

    <div class="sidebar-body">

       <ul class="nav">

        <div class="sidebar-body menu-brand-ideator" style="display:none;">

            <li class="nav-item nav-category">Discovery</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="link-icon" data-feather="eye"></i>
                            <span class="link-title">Menu 1</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="link-icon" data-feather="eye"></i>
                            <span class="link-title">Menu 2</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="link-icon" data-feather="eye"></i>
                            <span class="link-title">Menu 3</span>
                        </a>
                    </li>

                    <div style="text-align:center;">
                        <button alt="3" class="btn btn-success gen-report"> Show </button>
                    </div>
            </div>
        
        
            <div class="sidebar-body menu-mktg-pot" style="display:none;">

                <li class="nav-item nav-category">Marketing Potential</li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="eye"></i>
                                <span class="link-title">Menu 11</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="eye"></i>
                                <span class="link-title">Menu 22</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="eye"></i>
                                <span class="link-title">Menu 33</span>
                            </a>
                        </li>

                         <div style="text-align:center;">
                                <button alt="3" class="btn btn-success gen-report"> Show </button>
                            </div>
                </div>

                <div class="sidebar-body menu-sec-sales" style="display:none;">

                    <li class="nav-item nav-category">Secondary Sales</li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="link-icon" data-feather="eye"></i>
                                    <span class="link-title">Menu 111</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="link-icon" data-feather="eye"></i>
                                    <span class="link-title">Menu 222</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="link-icon" data-feather="eye"></i>
                                    <span class="link-title">Menu 333</span>
                                </a>
                            </li>

                            <div style="text-align:center;">
                                <button alt="3" class="btn btn-success gen-report"> Show </button>
                            </div>

                    </div>

    @if(Auth::user()->user_type == 'Admin')

                <li class="nav-item {{ active_class(['settings/*']) }}">
                    <a class="nav-link" data-toggle="collapse" href="#master_keyword" role="button" aria-expanded="{{ is_active_route(['master_keyword/*']) }}" aria-controls="master_keyword">
                        <i class="link-icon" data-feather="tool"></i>
                        <span class="link-title">Settings</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['master_keyword/*']) }}" id="master_keyword">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ url('/master_keyword') }}" class="nav-link {{ active_class(['master_keyword']) }}">Master Keywords</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/country') }}" class="nav-link {{ active_class(['country']) }}">Countries</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/user') }}" id="off-calendar" class="nav-link {{ active_class(['user']) }}">Users</a>
                            </li>

                        </ul>
                    </div>
                </li>

    @endif
                
            </li>   

        
        
        </ul>
        
    </div>

</nav>

@push('custom-scripts')
<script>
    $(function() {

        $('#off-calendar').click(function() {
            // alert("ZZZZZZZZZZ");
            $('.period-calendar').hide();
        });

        $('.gen-report').click(function() {

            console.log(window.regSelected+" <<==== "+window.maplevel+" <<==== "+window.mapType);

            $('.mystyle').show();
            // $('.chart-section').show();
            // $('.grid-section').show();

            if(window.mapType == "D" && window.regSelected == 1)
            {
                //alert("Yesssssssssss");
                var indstates = new Array(5);
                indstates[17] = {"name" : "Karnataka", "coords" : {lat: "14.417656", lng: "75.727984"}};
                indstates[21] = {"name" : "Maharashtra", "coords" : {lat: "19.394068", lng: "75.912796"}};
                indstates[18] = {"name" : "Kerala", "coords" : {lat: "9.851969", lng: "76.666816"}};
                indstates[31] = {"name" : "Tamil Nadu", "coords" : {lat: "10.798774", lng: "78.302230"}};
                indstates[2] = {"name" : "Andhra Pradesh", "coords" : {lat: "15.029686", lng: "78.900674"}};
                indstates[69] = {"name" : "Telangana", "coords" : {lat: "17.861655", lng: "79.143047"}};
                indstates[26] = {"name" : "Orissa", "coords" : {lat: "20.336386", lng: "84.471465"}};
                console.log(indstates);
                
                indstates.forEach(function(value, index) {
                    //console.log(value.name + " <<<=== " + value.coords + " <<<=== " + index);
               
                    var piecht1 = L.piechartMarker(
                    L.latLng(value.coords),
                    //L.latLng([21.861499,78.695625]),
                        {
                        radius: 20,
                            data: [
                                { name: 'Apples', value: 25, style: { fillStyle: 'red', lineWidth: 1 } },
                                { name: 'Oranges', value: 35, style: { fillStyle: 'blue', lineWidth: 1 } },
                                { name: 'Bananas', value: 20, style: { fillStyle: 'black', lineWidth: 1 } },
                                { name: 'Pines', value: 30, style: { fillStyle: 'green', lineWidth: 1 } },
                                { name: 'Fig', value: 70, style: { fillStyle: 'violet', lineWidth: 1 } }
                                //{ name: 'Fig', value: 70, style: { fillStyle: 'rgba(0,127,0,.6)', strokeStyle: 'rgba(0,127,0,.95)', lineWidth: 10 } }
                            ],
                        }
                    );
                    piecht1.addTo(map);

                    piecht1.on('mouseover', function(e) {
                    //open popup;
                    var popup1 = L.popup()
                    .setLatLng(e.latlng)
                    .setContent('<b>'+value.name+'</b></br><span style="color:blue;">Apples : 25<br/>Oranges : 35<br/>Bananas : 20<br/>Pines : 30<br/>Fig : 70<br/></span>')
                    .openOn(map);

                        piecht1.on('mouseout', function(e) {
                            //alert("Yesssssssss");
                            popup1.remove();
                            //piecht1.remove();
                        });
                        
                    });
                });
            }
            else if(window.mapType == "S" && window.regSelected == 1)
            {    
                //alert("QQQQQQQQQQQQQ");
                var country = new Array(1);
                country[1] = {"name" : "India", "coords" : {lat: "22.073424", lng: "79.092675"}};

                country.forEach( function(value, index) {
                    var piecht1 = L.piechartMarker(
                        L.latLng(value.coords),
                    //L.latLng([21.861499,78.695625]),
                        {
                        radius: 50,
                            data: [
                                { name: 'Apples', value: 25, style: { fillStyle: 'red', lineWidth: 1 } },
                                { name: 'Oranges', value: 35, style: { fillStyle: 'blue', lineWidth: 1 } },
                                { name: 'Bananas', value: 20, style: { fillStyle: 'black', lineWidth: 1 } },
                                { name: 'Pines', value: 30, style: { fillStyle: 'green', lineWidth: 1 } },
                                { name: 'Fig', value: 70, style: { fillStyle: 'violet', lineWidth: 1 } }
                                //{ name: 'Fig', value: 70, style: { fillStyle: 'rgba(0,127,0,.6)', strokeStyle: 'rgba(0,127,0,.95)', lineWidth: 10 } }
                            ],
                        }
                    );
                    piecht1.addTo(map);

                    piecht1.on('mouseover', function(e) {
                    //open popup;
                    var popup1 = L.popup()
                    .setLatLng(e.latlng)
                    .setContent('<b>'+value.name+'</b></br><span style="color:blue;">Apples : 25<br/>Oranges : 35<br/>Bananas : 20<br/>Pines : 30<br/>Fig : 70<br/></span>')
                    .openOn(map);

                        piecht1.on('mouseout', function(e) {
                            //alert("Yesssssssss");
                            popup1.remove();
                            //piecht1.remove();
                        });
                        
                    });
                });

                // console.log(window.fitcenter);
                // var piecht1 = L.piechartMarker(
                // L.latLng(window.fitcenter),
                // //L.latLng([21.861499,78.695625]),
                //     {
                //     radius: 50,
                //         data: [
                //             { name: 'Apples', value: 25, style: { fillStyle: 'red', lineWidth: 1 } },
                //             { name: 'Oranges', value: 35, style: { fillStyle: 'blue', lineWidth: 1 } },
                //             { name: 'Bananas', value: 20, style: { fillStyle: 'black', lineWidth: 1 } },
                //             { name: 'Pines', value: 30, style: { fillStyle: 'green', lineWidth: 1 } },
                //             { name: 'Fig', value: 70, style: { fillStyle: 'violet', lineWidth: 1 } }
                //             //{ name: 'Fig', value: 70, style: { fillStyle: 'rgba(0,127,0,.6)', strokeStyle: 'rgba(0,127,0,.95)', lineWidth: 10 } }
                //         ],
                //     }
                // );
                // piecht1.addTo(map);

                // piecht1.on('mouseover', function(e) {
                // //open popup;
                // var popup1 = L.popup()
                // .setLatLng(e.latlng)
                // .setContent('<span style="color:blue;">Apples : 25<br/>Oranges : 35<br/>Bananas : 20<br/>Pines : 30<br/>Fig : 70<br/></span>')
                // .openOn(map);

                //     piecht1.on('mouseout', function(e) {
                //         //alert("Yesssssssss");
                //         popup1.remove();
                //         //piecht1.remove();
                //     });
                    
                // });
            }

            
           

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

            if(curmod == 1) {
                var ctype = "pie";
            } else if(curmod == 2) {
                var ctype = "bar";
            }  else {
                var ctype = "column";
            }

            $.ajax({
                type: 'POST', 
                url : "{{url('/chart')}}/" + curmod + "/viewchart", 
                data: {
                        "_token": "{{ csrf_token() }}",
                        "chtype": ctype,
                        "module" : curmod
                    },
                success : function (data) {
                    $(".chart-section").html(data);
                }
            });

            $('.grid-section').show();

            $.ajax({
                type: 'get', 
                url : "{{url('/grid')}}", 
                success : function (data) {
                    $(".grid-section").html(data);
                }
            });

            return false;
        });
    });
</script>

<style>
    .datepicker {
        background-color: #aaa ;
        color: #333 ;
    }
    
</style>
@endpush