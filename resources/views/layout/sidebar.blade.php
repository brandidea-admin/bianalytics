
<nav class="sidebar"> 
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <a target="_blank" href="http://www.brandidea.ai" class="noble-ui-logo d-block mb-2"><img src="{{ url('/storage/brandideaAnalytics_logo.png') }}" width="200" height="50" alt="" title=""></a></span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>


    <div class="sidebar-body">
        <ul class="nav">
            <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
                <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
                <input type="text" class="form-control">
            </div>
        <hr>

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

                    <div style="text-align:right;">
                         <button alt="1" class="btn btn-success gen-report" value=""> Show Result </button>
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

                        <div style="text-align:right;">
                                <button alt="2" class="btn btn-success gen-report" value=""> Show Result </button>
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

                            <div style="text-align:right;">
                                <button alt="3" class="btn btn-success gen-report"> Show Result </button>
                            </div>

                    </div>        
        
        </ul>
    </div>

</nav>

@push('custom-scripts')
<script>
    $(function() {

        $('.gen-report').click(function() {
            console.log(window.contid+" <<==== "+window.maplevel+" <<==== ");
            console.log(window.fitcenter);
            //return false;
            // $('.map-section').show();
            // $.ajax({
            //     type: 'get', 
            //     url : "{{url('/map')}}", 
            //     success : function (data) {
            //         $(".map-section").html(data);
            //     }
            // });

            $('.mystyle').show();

            var piecht1 = L.piechartMarker(
            L.latLng(window.fitcenter),
            //L.latLng([21.861499,78.695625]),
                {
                radius: 50,
                    data: [
                        { name: 'Apples', value: 25, style: { fillStyle: 'red', lineWidth: 1 } },
                        { name: 'Oranges', value: 35, style: { fillStyle: 'blue', lineWidth: 1 } },
                        { name: 'Bananas', value: 20, style: { fillStyle: 'black', lineWidth: 1 } },
                        { name: 'Pineapples', value: 30, style: { fillStyle: 'green', lineWidth: 1 } },
                        { name: 'Fig', value: 70, style: { fillStyle: 'violet', lineWidth: 1 } }
                        //{ name: 'Fig', value: 70, style: { fillStyle: 'rgba(0,127,0,.6)', strokeStyle: 'rgba(0,127,0,.95)', lineWidth: 10 } }
                    ],
                }
            );
            piecht1.addTo(map);
            

            piecht1.on('mouseover', function(e) {
            //open popup;
            var popup = L.popup()
            .setLatLng(e.latlng)
            .setContent('<p>Hello world!<br />This is a nice popup.</p>')
            .openOn(map);
            });

            // var markerOptions = {
            //     title: "MyLocation",
            //     clickable: true,
            //     draggable: true
            // }

            


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