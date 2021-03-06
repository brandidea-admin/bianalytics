@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css">
<link rel="stylesheet" href="{{ asset('assets/dist/css/leaflet-search.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
@endpush

@section('content')

<div class="dashboard-section">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to BrandIdea</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">

            <button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
                <i class="btn-icon-prepend" data-feather="download"></i>
                Import
            </button>
            <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="printer"></i>
                Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Download Report
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">New Customers</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-6">
                                    <h3 class="mb-2">3,897</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>+3.3%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">New Orders</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-6">
                                    <h3 class="mb-1">35,084</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-danger">
                                            <span>-2.8%</span>
                                            <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Growth</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-6">
                                    <h3 class="mb-2">89.87%</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>+2.8%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Summary</h6>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Details</h6>
                        <div class="dropdown mb-2">
                            <button class="btn p-0" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Other Info.</h6>
                        <div class="dropdown mb-2">
                            <button class="btn p-0" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<div class="row ">

    <div class="col-lg-7 col-xl-6 map-section" style="height: 50ch; border-style: ridge;" id="map">

        <script type="text/javascript" src="./maps/KML/world-countries.js"></script>
        <script type="text/javascript" src="./maps/KML/world-outline.js"></script>

        <script type="text/javascript">
            var map = L.map('map', { zoomControl: false }).setView([41.771312, 8.684994], 1);

            map.doubleClickZoom.disable();

            var maplevel = 0;
            var contid = 0;
            var distid2 = 0;
            var distid3 = 0;
            var distid4 = 0;
            var distid5 = 0;
            var distid6 = 0;
            window.fitcenter = "";

            // control that shows state info on hover
            var info = L.control();

            info.setPosition('bottomright');
            // console.log(info.getPosition());

            info.onAdd = function(map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };

            info.update = function(props) {
                this._div.innerHTML = '' + (props ?
                    '<span style="color:blue; font-weight: bold;">' + props.Name + ' (' + props.DB_ID + ')</span>' :
                    '');
                if (props === undefined) {
                    //console.log(maplevel+" <<=== "+'null');	
                } else {
                    //console.log(maplevel+" <<=== "+props.OBJECTID);	
                    window.contid = props.DB_ID;
                }

            };

            info.addTo(map);

            window.mapType = "S"; ///// Outline or Division
            console.log(window.contid + " <<<<=== " + window.maplevel + " <<<<=== " + window.mapType);

            // get color depending on population density value
            function getColor(d) {
                return d > 1000 ? '#800026' :
                    d > 500 ? '#BD0026' :
                    d > 200 ? '#E31A1C' :
                    d > 100 ? '#FC4E2A' :
                    d > 50 ? '#FD8D3C' :
                    d > 20 ? '#FEB24C' :
                    d > 10 ? '#FED976' :
                    '#FFEDA0';
            }

            function style(feature) {
                return {
                    fillColor: 'white',
                    fillOpacity: 0.8,
                    weight: 0.5,
                    opacity: 1,
                    stroke: 0.7,
                    dashArray: '0'
                };
            }

            function highlightFeature(e) {
                var layer = e.target;

                layer.setStyle({
                    fillColor: 'red',
                    fillOpacity: 0.5,
                    color: "blue",
                    weight: 0.7,
                    opacity: 0.5,
                    stroke: 0.1,
                    dashArray: '0'
                });


                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

                info.update(layer.feature.properties);
            }

            function resetHighlight(e) {
                geojson.resetStyle(e.target);
                info.update();
            }

            function zoomToFeature(e) {
                map.removeLayer(geojson);

                window.mapType = "D"; ///// Outline or Division
                console.log(window.contid + " <<<<=== " + window.maplevel + " <<<<=== " + window.mapType);

                var geojson2;


                var geojson2 = new L.GeoJSON(countriesData, {
                    style: function(feature) {
                        return {
                            fillColor: 'white',
                            color: 'blue',
                            weight: 0.5,
                            stroke: 0.7,
                            fillOpacity: 0.8
                        };
                    },
                    // onEachFeature: function(feature, marker) {
                    //     marker.bindPopup('Name : '+feature.properties.Name+' ('+ feature.properties.DB_ID+')');
                    // }
                    onEachFeature: onEachFeature2
                });

                map.addLayer(geojson2);

                L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
                    maxZoom: 4,
                    minZoom: 1,
                    attribution: '',
                    id: 'mapbox.light'
                }).addTo(map);

                // map.fitBounds(geojson2.getBounds());
                map.setView([41.771312, 8.684994], 1);

                var searchControl2 = new L.Control.Search({
                    layer: geojson2,
                    propertyName: 'Name',
                    marker: false,
                    moveToLocation: function(latlng, title, map) {
                        //map.fitBounds( latlng.layer.getBounds() );
                        var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                        map.setView(latlng, zoom); // access the zoom
                    }
                });

                searchControl2.on('search:locationfound', function(e) {
                    e.layer.setStyle({
                        position:'topright',
                        fillColor: 'blue',
                        color: 'black',
                        weight: 0.5,
                        stroke: 0.7,
                        fillOpacity: 0.8
                    });
                    if (e.layer._popup)
                        e.layer.openPopup();
                }).on('search:collapsed', function(e) {
                    // geojson2.eachLayer(function(layer) {   //restore feature color
                    //     geojson2.resetStyle(layer);
                    // }); 
                });

                //console.log(map.hasLayer(geojson2)+" <<<====");
                map.addControl(searchControl2); //inizialize search control





                ///// Starts Back button1

                var backbut1 = L.easyButton({
                    position: 'topright',
                    states: [{
                        stateName: 'globe-layer',
                        icon: 'fa-arrow-left',
                        title: 'globe',
                        onClick: function(control) {
                            //console.log(control);
                            map.removeLayer(geojson2);
                            searchControl2.remove();
                            geojson.addTo(map);
                            map.setView([41.771312, 8.684994], 1);
                            backbut1.remove();

                        }
                    }]
                });

                map.addControl(backbut1);

                ///// Ends Back button1

                function onEachFeature2(feature2, layer2) {
                    layer2.on({
                        mouseover: highlightFeature2,
                        mouseout: resetHighlight2,
                        dblclick: zoomToFeature2
                    });
                }

                function highlightFeature2(e) {
                    var layer2 = e.target;

                    layer2.setStyle({
                        fillColor: 'red',
                        fillOpacity: 0.5,
                        color: "blue",
                        weight: 0.7,
                        opacity: 0.5,
                        stroke: 0.1,
                        dashArray: '0'
                    });


                    if (!L.Browser.ie && !L.Browser.opera) {
                        layer2.bringToFront();
                    }

                    info.update(layer2.feature.properties);
                }

                function resetHighlight2(e) {
                    geojson2.resetStyle(e.target);
                    info.update();
                }

                function zoomToFeature2(e) {

                    window.regSelected = window.contid;

                    window.mapType = "S"; ///// Outline or Division
                    console.log(window.contid + " <<<<=== " + window.maplevel + " <<<<=== " + window.mapType);

                    //e.target.setStyle({fillColor: 'blue', color: 'black', weight: 0.5,  stroke: 0.7, fillOpacity: 0.8});

                    ////////// Starts India Level Code 1

                    if (window.contid == 1 && window.maplevel == 0 && window.mapType == "S") {

                        map.removeLayer(geojson2);
                        map.removeControl(searchControl2);

                        load('./maps/KML/1/O_1.js');

                        maplevel = 1;

                        var geojson3;

                        var geojson3 = new L.GeoJSON(O_1, {
                            style: function(feature) {
                                return {
                                    fillColor: 'white',
                                    color: 'blue',
                                    weight: 0.5,
                                    stroke: 0.7,
                                    fillOpacity: 0.8
                                };
                            },
                            onEachFeature: onEachFeature3
                        });

                        map.addLayer(geojson3);


                        L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
                            maxZoom: 6,
                            minZoom: 1,
                            attribution: '',
                            id: 'mapbox.light'
                        }).addTo(map);

                        // map.fitBounds(geojson3.getBounds());
                        map.setView([24.910353, 79.719117], 4);

                        var bounds3 = geojson3.getBounds();
                        var latLng3 = bounds3.getCenter();

                        //map.fitBounds(bounds3);
                        window.fitcenter = latLng3;

                        var element = document.getElementById("myDIV");
                        if (element != null) {
                            element.classList.add("mystyle");
                        } else {
                            element = null;
                        }


                        var searchControl3 = new L.Control.Search({
                            layer: geojson3,
                            propertyName: 'Name',
                            marker: false,
                            moveToLocation: function(latlng, title, map) {
                                //map.fitBounds( latlng.layer.getBounds() );
                                var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                                map.setView(latlng, zoom); // access the zoom
                            }
                        });

                        searchControl3.on('search:locationfound', function(e) {
                            e.layer.setStyle({
                                fillColor: 'blue',
                                color: 'black',
                                weight: 0.5,
                                stroke: 0.7,
                                fillOpacity: 0.8
                            });
                            if (e.layer._popup)
                                e.layer.openPopup();
                        }).on('search:collapsed', function(e) {

                            geojson3.eachLayer(function(layer) { //restore feature color
                                geojson3.resetStyle(layer);
                            });
                        });

                        map.addControl(searchControl3); //inizialize search control


                        ///// Starts Back button2

                        backbut1.remove();

                        var backbut2 = L.easyButton({
                            position: 'topright',
                            states: [{
                                stateName: 'countries-layer',
                                icon: 'fa-arrow-left',
                                title: 'countries',
                                id: 'countriesLayer',
                                onClick: function(control) {
                                    //console.log(control);
                                    map.removeLayer(geojson3);
                                    searchControl3.remove();
                                    geojson2.addTo(map);
                                    map.addControl(searchControl2);
                                    window.maplevel = 0;
                                    map.setView([41.771312, 8.684994], 1);
                                    backbut2.remove();
                                    $('.leaflet-marker-pane').hide();
                                    $('.chart-section').hide();
                                    $('.grid-section').hide();
                                    map.addControl(backbut1);

                                }
                            }]
                        });

                        map.addControl(backbut2);

                        ///// Ends Back button2

                        // var bounds = geojson3.getBounds();
                        // var latLng = bounds.getCenter();


                        //   var legend = L.control({position: 'bottomleft'});

                        //         legend.onAdd = function (map) {

                        //         	var div = L.DomUtil.create('div', 'info legend'),
                        //         		grades = [100, 200, 500, 1000],
                        //         		labels = ['Apples', 'Oranges', 'AAAA', 'BBBBB'],
                        //         		from, to;

                        //         	for (var i = 0; i < grades.length; i++) {
                        //         		from = grades[i];
                        //         		to = grades[i + 1];

                        //         		labels.push(
                        //         			'<i style="background: red"></i> ' +
                        //         			from + (to ? '&ndash;' + to : '+'));
                        //         	}

                        //         	div.innerHTML = labels.join('<br>');
                        //         	return div;
                        //         };

                        //         legend.addTo(map);

                        function onEachFeature3(feature3, layer3) {
                            layer3.on({
                                mouseover: highlightFeature3,
                                mouseout: resetHighlight3,
                                dblclick: zoomToFeature3
                            });

                            var pokLabel = L.marker([36.102376, 74.166826], {
                                icon: L.divIcon({
                                    className: 'cokLabel',
                                    html: "<span style='color:grey;'>POK</span>",
                                    iconSize: [0, 0]
                                })
                            }).addTo(map);

                            var cokLabel = L.marker([35.398006, 78.487318], {
                                icon: L.divIcon({
                                    className: 'cokLabel',
                                    html: "<span style='color:grey;'>COK</span>",
                                    iconSize: [0, 0]
                                })
                            }).addTo(map);
                        }

                        function highlightFeature3(e) {
                            var layer3 = e.target;

                            layer3.setStyle({
                                fillColor: 'red',
                                fillOpacity: 0.5,
                                color: "blue",
                                weight: 0.7,
                                opacity: 0.5,
                                stroke: 0.1,
                                dashArray: '0'
                            });


                            if (!L.Browser.ie && !L.Browser.opera) {
                                layer3.bringToFront();
                            }

                            info.update(layer3.feature.properties);
                        }

                        function resetHighlight3(e) {
                            geojson3.resetStyle(e.target);
                            info.update();
                        }



                        function zoomToFeature3(e) {

                            map.removeLayer(geojson3);
                            map.removeControl(searchControl3);

                            window.regSelected = window.contid;

                            load('./maps/KML/1/S_1.js');
                            window.mapType = "D"; ///// Outline or Division
                            console.log(window.contid + " <<<<=== " + window.maplevel + " <<<<=== " + window.mapType);

                            var geojson4;

                            var geojson4 = new L.GeoJSON(S_1, {
                                style: function(feature) {
                                    return {
                                        fillColor: 'white',
                                        color: 'blue',
                                        weight: 0.5,
                                        stroke: 0.7,
                                        fillOpacity: 0.8
                                    };
                                },
                                // onEachFeature: function(feature, marker) {
                                //     marker.bindPopup('Name : '+feature.properties.Name+' ('+ feature.properties.DB_ID+')');
                                // }
                                onEachFeature: onEachFeature4
                            });

                            L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
                                maxZoom: 5,
                                minZoom: 2,
                                attribution: '',
                                id: 'mapbox.light'
                            }).addTo(map);

                            // map.fitBounds(geojson4.getBounds());

                            var searchControl4 = new L.Control.Search({
                                layer: geojson4,
                                propertyName: 'Name',
                                marker: false,
                                moveToLocation: function(latlng, title, map) {
                                    //map.fitBounds( latlng.layer.getBounds() );
                                    var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                                    map.setView(latlng, zoom); // access the zoom
                                }
                            });

                            searchControl4.on('search:locationfound', function(e) {
                                e.layer.setStyle({
                                    fillColor: 'blue',
                                    color: 'black',
                                    weight: 0.5,
                                    stroke: 0.7,
                                    fillOpacity: 0.8
                                });
                                if (e.layer._popup)
                                    e.layer.openPopup();
                            }).on('search:collapsed', function(e) {

                                geojson4.eachLayer(function(layer) { //restore feature color
                                    geojson4.resetStyle(layer);
                                });
                            });

                            map.addControl(searchControl4); //inizialize search control


                            ///// Starts Back button3
                            backbut2.remove();

                            var backbut3 = L.easyButton({
                                position: 'topright',
                                states: [{
                                    stateName: 'states-layer',
                                    icon: 'fa-arrow-left',
                                    title: 'states',
                                    id: 'statesLayer',
                                    onClick: function(control) {
                                        //   console.log(control);
                                        map.removeLayer(geojson4);
                                        searchControl4.remove();
                                        geojson3.addTo(map);
                                        map.addControl(searchControl3);
                                        $('.leaflet-marker-pane').hide();
                                        $('.chart-section').hide();
                                        $('.grid-section').hide();
                                        backbut3.remove();
                                        map.addControl(backbut2);

                                    }
                                }]
                            });

                            map.addControl(backbut3);
                            ///// Ends Back button3


                            function onEachFeature4(feature4, layer4) {
                                layer4.on({
                                    mouseover: highlightFeature4,
                                    mouseout: resetHighlight4,
                                    dblclick: zoomToFeature4
                                });
                            }

                            function highlightFeature4(e) {
                                var layer4 = e.target;

                                layer4.setStyle({
                                    fillColor: 'red',
                                    fillOpacity: 0.5,
                                    color: "blue",
                                    weight: 0.7,
                                    opacity: 0.5,
                                    stroke: 0.1,
                                    dashArray: '0'
                                });


                                if (!L.Browser.ie && !L.Browser.opera) {
                                    layer4.bringToFront();
                                }

                                info.update(layer4.feature.properties);
                            }

                            function resetHighlight4(e) {
                                geojson4.resetStyle(e.target);
                                info.update();
                            }



                            function zoomToFeature4(e) {

                                map.removeLayer(geojson4);
                                map.removeControl(searchControl4);
                                // $('.cokLabel').hide();

                                ///// Starts India ==> States Karnataka (17)
                                window.maplevel = 2;
                                window.mapType = "S"; ///// Outline or Division
                                console.log(window.contid + " <<<<=== " + window.maplevel + " <<<<=== " + window.mapType);

                                var distid2 = parseInt(window.contid);

                                file_info4 = './maps/KML/1/' + distid2 + '/O_' + distid2 + '.js';
                                //file_info2 = './maps/KML/1/21/O_21.js';
                                load(file_info4);

                                var myVariable4 = 'O_' + distid2;
                                console.log(file_info4 + " <<<=== " + myVariable4);

                                var geojson5;

                                var geojson5 = new L.GeoJSON(eval(myVariable4), {
                                    style: function(feature) {
                                        return {
                                            fillColor: 'white',
                                            color: 'blue',
                                            weight: 0.5,
                                            stroke: 0.7,
                                            fillOpacity: 0.8
                                        };
                                    },
                                    // onEachFeature: function(feature, marker) {
                                    //     marker.bindPopup('Name : '+feature.properties.Name+' ('+ feature.properties.DB_ID+')');
                                    // }
                                    onEachFeature: onEachFeature5
                                });

                                L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
                                    maxZoom: 7,
                                    minZoom: 3,
                                    attribution: '',
                                    id: 'mapbox.light'
                                }).addTo(map);

                                var bounds5 = geojson5.getBounds();
                                var latLng5 = bounds5.getCenter();

                                map.fitBounds(bounds5);
                                window.fitcenter = latLng5;

                                var element = document.getElementById("myDIV");
                                if (element != null) {
                                    element.classList.add("mystyle");
                                } else {
                                    element = null;
                                }

                                var searchControl5 = new L.Control.Search({
                                    layer: geojson5,
                                    propertyName: 'Name',
                                    marker: false,
                                    moveToLocation: function(latlng, title, map) {
                                        //map.fitBounds( latlng.layer.getBounds() );
                                        var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                                        map.setView(latlng, zoom); // access the zoom
                                    }
                                });

                                searchControl5.on('search:locationfound', function(e) {
                                    e.layer.setStyle({
                                        fillColor: 'blue',
                                        color: 'black',
                                        weight: 0.5,
                                        stroke: 0.7,
                                        fillOpacity: 0.8
                                    });
                                    if (e.layer._popup)
                                        e.layer.openPopup();
                                }).on('search:collapsed', function(e) {
                                    geojson5.eachLayer(function(layer) { //restore feature color
                                        geojson5.resetStyle(layer);
                                    });
                                });

                                map.addControl(searchControl5); //inizialize search control



                                backbut3.remove();

                                var backbut4 = L.easyButton({
                                    position: 'topright',
                                    states: [{
                                        stateName: 'states-layer',
                                        icon: 'fa-arrow-left',
                                        title: 'states',
                                        id: 'statesLayer',
                                        onClick: function(control) {
                                            //console.log(control);
                                            map.removeLayer(geojson5);
                                            searchControl5.remove();
                                            geojson4.addTo(map);
                                            map.addControl(searchControl4);
                                            //map.fitBounds(geojson4.getBounds());
                                            map.setView([24.910353, 79.719117], 4);
                                            backbut4.remove();
                                            //$('.cokLabel').hide();
                                            map.addControl(backbut3);

                                        }
                                    }]
                                });

                                map.addControl(backbut4);





                                function onEachFeature5(feature5, layer5) {
                                    layer5.on({
                                        mouseover: highlightFeature5,
                                        mouseout: resetHighlight5,
                                        dblclick: zoomToFeature5
                                    });
                                }

                                function highlightFeature5(e) {
                                    var layer5 = e.target;

                                    layer5.setStyle({
                                        fillColor: 'red',
                                        fillOpacity: 0.5,
                                        color: "blue",
                                        weight: 0.7,
                                        opacity: 0.5,
                                        stroke: 0.1,
                                        dashArray: '0'
                                    });


                                    if (!L.Browser.ie && !L.Browser.opera) {
                                        layer5.bringToFront();
                                    }

                                    info.update(layer5.feature.properties);
                                }

                                function resetHighlight5(e) {
                                    geojson5.resetStyle(e.target);
                                    info.update();
                                }

                                function zoomToFeature5(e) {
                                    map.removeLayer(geojson5);
                                    map.removeControl(searchControl5);

                                    window.mapType = "D"; ///// Outline or Division
                                    console.log(window.contid + " <<<<=== " + window.maplevel + " <<<<=== " + window.mapType);

                                    file_info5 = './maps/KML/1/' + distid2 + '/D_' + distid2 + '.js';

                                    load(file_info5);
                                    var myVariable5 = 'D_' + distid2;
                                    console.log(file_info5 + "  " + myVariable5);

                                    var geojson6;
                                    var geojson6 = new L.GeoJSON(eval(myVariable5), {
                                        style: function(feature) {
                                            return {
                                                fillColor: 'white',
                                                color: 'blue',
                                                weight: 0.5,
                                                stroke: 0.7,
                                                fillOpacity: 0.8
                                            };
                                        },
                                        // onEachFeature: function(feature, marker) {
                                        //     marker.bindPopup('Name : '+feature.properties.Name+' ('+ feature.properties.DB_ID+')');
                                        // }
                                        onEachFeature: onEachFeature6
                                    });

                                    L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
                                        maxZoom: 9,
                                        minZoom: 1,
                                        attribution: '',
                                        id: 'mapbox.light'
                                    }).addTo(map);

                                    // map.fitBounds(geojson6.getBounds());

                                    var searchControl6 = new L.Control.Search({
                                        layer: geojson6,
                                        propertyName: 'Name',
                                        marker: false,
                                        moveToLocation: function(latlng, title, map) {
                                            //map.fitBounds( latlng.layer.getBounds() );
                                            var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                                            map.setView(latlng, zoom); // access the zoom
                                        }
                                    });

                                    searchControl6.on('search:locationfound', function(e) {
                                        e.layer.setStyle({
                                            fillColor: 'blue',
                                            color: 'black',
                                            weight: 0.5,
                                            stroke: 0.7,
                                            fillOpacity: 0.8
                                        });
                                        if (e.layer._popup)
                                            e.layer.openPopup();
                                    }).on('search:collapsed', function(e) {
                                        geojson6.eachLayer(function(layer) { //restore feature color
                                            geojson6.resetStyle(layer);
                                        });
                                    });

                                    map.addControl(searchControl6); //inizialize search control



                                    backbut4.remove();

                                    var backbut5 = L.easyButton({
                                        position: 'topright',
                                        states: [{
                                            stateName: 'states-layer',
                                            icon: 'fa-arrow-left',
                                            title: 'states',
                                            id: 'statesLayer',
                                            onClick: function(control) {
                                                //console.log(control);
                                                map.removeLayer(geojson6);
                                                searchControl6.remove();
                                                geojson5.addTo(map);
                                                map.addControl(searchControl5);
                                                map.fitBounds(geojson5.getBounds());
                                                backbut5.remove();
                                                map.addControl(backbut4);

                                            }
                                        }]
                                    });

                                    map.addControl(backbut5);




                                    function onEachFeature6(feature6, layer6) {
                                        layer6.on({
                                            mouseover: highlightFeature6,
                                            mouseout: resetHighlight6,
                                            dblclick: zoomToFeature6
                                        });
                                    }

                                    function highlightFeature6(e) {
                                        var layer6 = e.target;

                                        layer6.setStyle({
                                            fillColor: 'red',
                                            fillOpacity: 0.5,
                                            color: "blue",
                                            weight: 0.7,
                                            opacity: 0.5,
                                            stroke: 0.1,
                                            dashArray: '0'
                                        });


                                        if (!L.Browser.ie && !L.Browser.opera) {
                                            layer6.bringToFront();
                                        }

                                        info.update(layer6.feature.properties);
                                    }

                                    function resetHighlight6(e) {
                                        geojson6.resetStyle(e.target);
                                        info.update();
                                    }

                                    function zoomToFeature6(e) {

                                        map.removeLayer(geojson6);
                                        map.removeControl(searchControl6);

                                        var distid3 = parseInt(window.contid);

                                        window.maplevel = 3; ///// District level
                                        window.mapType = "S"; ///// Outline or Division
                                        console.log(window.contid + " <<<<=== " + window.maplevel + " <<<<=== " + window.mapType);

                                        file_info6 = './maps/KML/1/' + distid2 + '/' + distid3 + '/O_' + distid3 + '.js';
                                        load(file_info6);
                                        var myVariable6 = 'O_' + distid3;
                                        console.log(file_info6 + " <<=== " + myVariable6);

                                        var geojson7;
                                        var geojson7 = new L.GeoJSON(eval(myVariable6), {
                                            style: function(feature) {
                                                return {
                                                    fillColor: 'white',
                                                    color: 'blue',
                                                    weight: 0.5,
                                                    stroke: 0.7,
                                                    fillOpacity: 0.8
                                                };
                                            },
                                            // onEachFeature: function(feature, marker) {
                                            //     marker.bindPopup('Name : '+feature.properties.Name+' ('+ feature.properties.DB_ID+')');
                                            // }
                                            onEachFeature: onEachFeature7
                                        });

                                        L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
                                            maxZoom: 11,
                                            minZoom: 1,
                                            attribution: '',
                                            id: 'mapbox.light'
                                        }).addTo(map);

                                        map.fitBounds(geojson7.getBounds());

                                        var searchControl7 = new L.Control.Search({
                                            layer: geojson7,
                                            propertyName: 'Name',
                                            marker: false,
                                            moveToLocation: function(latlng, title, map) {
                                                //map.fitBounds( latlng.layer.getBounds() );
                                                var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                                                map.setView(latlng, zoom); // access the zoom
                                            }
                                        });

                                        searchControl7.on('search:locationfound', function(e) {
                                            e.layer.setStyle({
                                                fillColor: 'blue',
                                                color: 'black',
                                                weight: 0.5,
                                                stroke: 0.7,
                                                fillOpacity: 0.8
                                            });
                                            if (e.layer._popup)
                                                e.layer.openPopup();
                                        }).on('search:collapsed', function(e) {
                                            geojson7.eachLayer(function(layer) { //restore feature color
                                                geojson7.resetStyle(layer);
                                            });
                                        });

                                        map.addControl(searchControl7); //inizialize search control


                                        backbut5.remove();

                                        var backbut6 = L.easyButton({
                                            position: 'topright',
                                            states: [{
                                                stateName: 'states-layer',
                                                icon: 'fa-arrow-left',
                                                title: 'states',
                                                id: 'statesLayer',
                                                onClick: function(control) {
                                                    //console.log(control);
                                                    map.removeLayer(geojson7);
                                                    searchControl7.remove();
                                                    geojson6.addTo(map);
                                                    map.addControl(searchControl6);
                                                    map.fitBounds(geojson6.getBounds());
                                                    backbut6.remove();
                                                    map.addControl(backbut5);

                                                }
                                            }]
                                        });

                                        map.addControl(backbut6);


                                        function onEachFeature7(feature7, layer7) {
                                            layer7.on({
                                                mouseover: highlightFeature7,
                                                mouseout: resetHighlight7,
                                                dblclick: zoomToFeature7
                                            });
                                        }

                                        function highlightFeature7(e) {
                                            var layer7 = e.target;

                                            layer7.setStyle({
                                                fillColor: 'red',
                                                fillOpacity: 0.5,
                                                color: "blue",
                                                weight: 0.7,
                                                opacity: 0.5,
                                                stroke: 0.1,
                                                dashArray: '0'
                                            });


                                            if (!L.Browser.ie && !L.Browser.opera) {
                                                layer7.bringToFront();
                                            }

                                            info.update(layer7.feature.properties);
                                        }

                                        function resetHighlight7(e) {
                                            geojson7.resetStyle(e.target);
                                            info.update();
                                        }


                                        function zoomToFeature7(e) {

                                            map.removeLayer(geojson7);
                                            map.removeControl(searchControl7);

                                            window.mapType = "D"; ///// Outline or Division
                                            console.log(window.contid + " <<<<=== " + window.maplevel + " <<<<=== " + window.mapType);

                                            //// Checking City (73 Bangalore, 676 Mumbai) for Wards and Taluk Separation
                                            ///// If City and District are same for Places like Blore,Mumbai,Chennai etc.. next level wards and ends
                                            ///// For district level places next level Taluk (SubDist) ===> Village last level and ends

                                            if (distid3 == 73 || distid3 == 676) {
                                                var str2 = "W_"
                                            } else {
                                                var str2 = "T_"
                                            }

                                            file_info7 = './maps/KML/1/' + distid2 + '/' + distid3 + '/' + str2 + distid3 + '.js';

                                            load(file_info7);
                                            var myVariable7 = str2 + distid3;
                                            console.log(file_info7 + " <<<=== " + myVariable7);


                                            var geojson8;
                                            var geojson8 = new L.GeoJSON(eval(myVariable7), {
                                                style: function(feature) {
                                                    return {
                                                        fillColor: 'white',
                                                        color: 'blue',
                                                        weight: 0.5,
                                                        stroke: 0.7,
                                                        fillOpacity: 0.8
                                                    };
                                                },
                                                // onEachFeature: function(feature, marker) {
                                                //     marker.bindPopup('Name : '+feature.properties.Name+' ('+ feature.properties.DB_ID+')');
                                                // }
                                                onEachFeature: onEachFeature8
                                            });

                                            L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
                                                maxZoom: 13,
                                                minZoom: 1,
                                                attribution: '',
                                                id: 'mapbox.light'
                                            }).addTo(map);

                                            map.fitBounds(geojson8.getBounds());

                                            var searchControl8 = new L.Control.Search({
                                                layer: geojson8,
                                                propertyName: 'Name',
                                                marker: false,
                                                moveToLocation: function(latlng, title, map) {
                                                    //map.fitBounds( latlng.layer.getBounds() );
                                                    var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                                                    map.setView(latlng, zoom); // access the zoom
                                                }
                                            });

                                            searchControl8.on('search:locationfound', function(e) {
                                                e.layer.setStyle({
                                                    fillColor: 'blue',
                                                    color: 'black',
                                                    weight: 0.5,
                                                    stroke: 0.7,
                                                    fillOpacity: 0.8
                                                });
                                                if (e.layer._popup)
                                                    e.layer.openPopup();
                                            }).on('search:collapsed', function(e) {
                                                geojson8.eachLayer(function(layer) { //restore feature color
                                                    geojson8.resetStyle(layer);
                                                });
                                            });

                                            map.addControl(searchControl8);



                                            backbut6.remove();

                                            var backbut7 = L.easyButton({
                                                position: 'topright',
                                                states: [{
                                                    stateName: 'states-layer',
                                                    icon: 'fa-arrow-left',
                                                    title: 'states',
                                                    id: 'statesLayer',
                                                    onClick: function(control) {
                                                        //console.log(control);
                                                        map.removeLayer(geojson8);
                                                        searchControl8.remove();
                                                        geojson7.addTo(map);
                                                        map.addControl(searchControl7);
                                                        map.fitBounds(geojson7.getBounds());
                                                        backbut7.remove();
                                                        map.addControl(backbut6);

                                                    }
                                                }]
                                            });

                                            map.addControl(backbut7);


                                            function onEachFeature8(feature8, layer8) {
                                                layer8.on({
                                                    mouseover: highlightFeature8,
                                                    mouseout: resetHighlight8,
                                                    dblclick: zoomToFeature8
                                                });
                                            }


                                            function highlightFeature8(e) {
                                                var layer8 = e.target;

                                                layer8.setStyle({
                                                    fillColor: 'red',
                                                    fillOpacity: 0.5,
                                                    color: "blue",
                                                    weight: 0.7,
                                                    opacity: 0.5,
                                                    stroke: 0.1,
                                                    dashArray: '0'
                                                });


                                                if (!L.Browser.ie && !L.Browser.opera) {
                                                    layer8.bringToFront();
                                                }

                                                info.update(layer8.feature.properties);
                                            }

                                            function resetHighlight8(e) {
                                                geojson8.resetStyle(e.target);
                                                info.update();
                                            }

                                            function zoomToFeature8(e) {
                                                map.removeLayer(geojson8);
                                                map.removeControl(searchControl8);

                                                //// India ==> Karnataka ==> Bangalore ==> Ward Gandhi Nagar
                                                var distid4 = parseInt(window.contid);

                                                window.maplevel = 4; ///// Ward or Taluk level
                                                window.mapType = "S"; ///// Outline or Division
                                                console.log(window.contid + " <<<<=== " + window.maplevel + " <<<<=== " + window.mapType);

                                                if (distid3 == 73 || distid3 == 676) {
                                                    var str3 = "W"
                                                } else {
                                                    var str3 = "T"
                                                }

                                                file_info8 = './maps/KML/1/' + distid2 + '/' + distid3 + '/' + str3 + '/O_' + distid4 + '.js';
                                                load(file_info8);
                                                var myVariable8 = 'O_' + distid4;
                                                console.log(file_info8 + "<<<====" + myVariable8);

                                                var geojson9;

                                                if (distid3 == 73 || distid3 == 676) {
                                                    var geojson9 = new L.GeoJSON(eval(myVariable8), {
                                                        style: function(feature) {
                                                            return {
                                                                fillColor: 'white',
                                                                color: 'blue',
                                                                weight: 0.5,
                                                                stroke: 0.7,
                                                                fillOpacity: 0.8
                                                            };
                                                        }
                                                    });
                                                } else {
                                                    var geojson9 = new L.GeoJSON(eval(myVariable8), {
                                                        style: function(feature) {
                                                            return {
                                                                fillColor: 'white',
                                                                color: 'blue',
                                                                weight: 0.5,
                                                                stroke: 0.7,
                                                                fillOpacity: 0.8
                                                            };
                                                        },
                                                        onEachFeature: onEachFeature9
                                                    });
                                                }

                                                // map.fitBounds(geojson9.getBounds());

                                                // var geojson9;
                                                // var geojson9 = new L.GeoJSON(eval(myVariable8), {
                                                //     style: function(feature) {
                                                //         return {fillColor: 'white', color: 'blue', weight: 0.5,  stroke: 0.7, fillOpacity: 0.8};
                                                //     },
                                                //     // onEachFeature: function(feature, marker) {
                                                //     //     marker.bindPopup('Name : '+feature.properties.Name+' ('+ feature.properties.DB_ID+')');
                                                //     // }
                                                //     onEachFeature: onEachFeature9
                                                // });

                                                L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
                                                    maxZoom: 15,
                                                    minZoom: 1,
                                                    attribution: '',
                                                    id: 'mapbox.light'
                                                }).addTo(map);

                                                map.fitBounds(geojson9.getBounds());

                                                var searchControl9 = new L.Control.Search({
                                                    layer: geojson9,
                                                    propertyName: 'Name',
                                                    marker: false,
                                                    moveToLocation: function(latlng, title, map) {
                                                        //map.fitBounds( latlng.layer.getBounds() );
                                                        var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                                                        map.setView(latlng, zoom); // access the zoom
                                                    }
                                                });

                                                searchControl9.on('search:locationfound', function(e) {
                                                    e.layer.setStyle({
                                                        fillColor: 'blue',
                                                        color: 'black',
                                                        weight: 0.5,
                                                        stroke: 0.7,
                                                        fillOpacity: 0.8
                                                    });
                                                    if (e.layer._popup)
                                                        e.layer.openPopup();
                                                }).on('search:collapsed', function(e) {
                                                    geojson9.eachLayer(function(layer) { //restore feature color
                                                        geojson9.resetStyle(layer);
                                                    });
                                                });

                                                map.addControl(searchControl9);





                                                backbut7.remove();

                                                var backbut8 = L.easyButton({
                                                    position: 'topright',
                                                    states: [{
                                                        stateName: 'states-layer',
                                                        icon: 'fa-arrow-left',
                                                        title: 'states',
                                                        id: 'statesLayer',
                                                        onClick: function(control) {
                                                            //console.log(control);
                                                            // map.removeLayer(geojson9);
                                                            // geojson8.addTo(map);
                                                            // map.fitBounds(geojson8.getBounds());
                                                            // backbut8.remove();
                                                            // map.addControl(backbut7);

                                                            map.removeLayer(geojson9);
                                                            searchControl9.remove();
                                                            geojson8.addTo(map);
                                                            map.addControl(searchControl8);
                                                            map.fitBounds(geojson8.getBounds());
                                                            backbut8.remove();
                                                            map.addControl(backbut7);

                                                        }
                                                    }]
                                                });

                                                map.addControl(backbut8);

                                                function onEachFeature9(feature9, layer9) {
                                                    layer9.on({
                                                        mouseover: highlightFeature9,
                                                        mouseout: resetHighlight9,
                                                        dblclick: zoomToFeature9
                                                    });
                                                }

                                                function highlightFeature9(e) {
                                                    var layer9 = e.target;

                                                    layer9.setStyle({
                                                        fillColor: 'red',
                                                        fillOpacity: 0.5,
                                                        color: "blue",
                                                        weight: 0.7,
                                                        opacity: 0.5,
                                                        stroke: 0.1,
                                                        dashArray: '0'
                                                    });


                                                    if (!L.Browser.ie && !L.Browser.opera) {
                                                        layer9.bringToFront();
                                                    }

                                                    info.update(layer9.feature.properties);
                                                }


                                                function resetHighlight9(e) {
                                                    geojson9.resetStyle(e.target);
                                                    info.update();
                                                }


                                                function zoomToFeature9(e) {

                                                    map.removeLayer(geojson9);
                                                    map.removeControl(searchControl9);

                                                    var distid5 = parseInt(window.contid);

                                                    window.maplevel = 5; ///// Village level
                                                    window.mapType = "D"; ///// Outline or Division
                                                    console.log(window.contid + " <<<<=== " + window.maplevel + " <<<<=== " + window.mapType);

                                                    file_info9 = './maps/KML/1/' + distid2 + '/' + distid3 + '/' + str3 + '/V_' + distid5 + '.js';
                                                    load(file_info9);
                                                    var myVariable9 = 'V_' + distid5;
                                                    console.log(file_info9 + "<<<===" + myVariable9);

                                                    var geojson10;
                                                    var geojson10 = new L.GeoJSON(eval(myVariable9), {
                                                        style: function(feature) {
                                                            return {
                                                                fillColor: 'white',
                                                                color: 'blue',
                                                                weight: 0.5,
                                                                stroke: 0.7,
                                                                fillOpacity: 0.8
                                                            };
                                                        },
                                                        // onEachFeature: function(feature, marker) {
                                                        //     marker.bindPopup('Name : '+feature.properties.Name+' ('+ feature.properties.DB_ID+')');
                                                        // }
                                                        onEachFeature: onEachFeature10
                                                    });

                                                    L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
                                                        maxZoom: 17,
                                                        minZoom: 1,
                                                        attribution: '',
                                                        id: 'mapbox.light'
                                                    }).addTo(map);

                                                    map.fitBounds(geojson10.getBounds());

                                                    var searchControl10 = new L.Control.Search({
                                                        layer: geojson10,
                                                        propertyName: 'Name',
                                                        marker: false,
                                                        moveToLocation: function(latlng, title, map) {
                                                            //map.fitBounds( latlng.layer.getBounds() );
                                                            var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                                                            map.setView(latlng, zoom); // access the zoom
                                                        }
                                                    });

                                                    searchControl10.on('search:locationfound', function(e) {
                                                        e.layer.setStyle({
                                                            fillColor: 'blue',
                                                            color: 'black',
                                                            weight: 0.5,
                                                            stroke: 0.7,
                                                            fillOpacity: 0.8
                                                        });
                                                        if (e.layer._popup)
                                                            e.layer.openPopup();
                                                    }).on('search:collapsed', function(e) {
                                                        geojson10.eachLayer(function(layer) { //restore feature color
                                                            geojson10.resetStyle(layer);
                                                        });
                                                    });

                                                    map.addControl(searchControl10);


                                                    // var geojson10;
                                                    // geojson10 = L.geoJson(eval(myVariable6), {
                                                    //     style: style,
                                                    //     onEachFeature: onEachFeature10
                                                    // }).addTo(map);

                                                    // map.fitBounds(geojson10.getBounds());

                                                    backbut8.remove();

                                                    var backbut9 = L.easyButton({
                                                        position: 'topright',
                                                        states: [{
                                                            stateName: 'states-layer',
                                                            icon: 'fa-arrow-left',
                                                            title: 'states',
                                                            id: 'statesLayer',
                                                            onClick: function(control) {
                                                                //console.log(control);
                                                                map.removeLayer(geojson10);
                                                                searchControl10.remove();
                                                                geojson9.addTo(map);
                                                                map.addControl(searchControl9);
                                                                map.fitBounds(geojson9.getBounds());
                                                                backbut9.remove();
                                                                map.addControl(backbut8);

                                                            }
                                                        }]
                                                    });

                                                    map.addControl(backbut9);

                                                    function onEachFeature10(feature10, layer10) {
                                                        layer10.on({
                                                            mouseover: highlightFeature10,
                                                            mouseout: resetHighlight10,
                                                            dblclick: zoomToFeature10
                                                        });
                                                    }

                                                    function highlightFeature10(e) {
                                                        var layer10 = e.target;

                                                        layer10.setStyle({
                                                            fillColor: 'red',
                                                            fillOpacity: 0.5,
                                                            color: "blue",
                                                            weight: 0.7,
                                                            opacity: 0.5,
                                                            stroke: 0.1,
                                                            dashArray: '0'
                                                        });


                                                        if (!L.Browser.ie && !L.Browser.opera) {
                                                            layer10.bringToFront();
                                                        }

                                                        info.update(layer10.feature.properties);
                                                    }


                                                    function resetHighlight10(e) {
                                                        geojson10.resetStyle(e.target);
                                                        info.update();
                                                    }


                                                    function zoomToFeature10(e) {

                                                        var distid6 = parseInt(window.contid);

                                                        window.maplevel = 6; ///// Village level
                                                        window.mapType = "S"; ///// Outline or Division
                                                        console.log(window.contid + " <<<<=== " + window.maplevel + " <<<<=== " + window.mapType);

                                                        file_info6 = './maps/KML/1/' + distid2 + '/' + distid3 + '/' + str3 + '/V/O_' + distid6 + '.js';

                                                        load(file_info6);
                                                        console.log(file_info6);

                                                        var myVariable7 = 'O_' + distid6;

                                                        map.removeLayer(geojson10);

                                                        var geojson11;
                                                        geojson11 = L.geoJson(eval(myVariable7), {
                                                            style: style
                                                        }).addTo(map);

                                                        map.fitBounds(geojson11.getBounds());


                                                        backbut9.remove();

                                                        var backbut10 = L.easyButton({
                                                            position: 'topright',
                                                            states: [{
                                                                stateName: 'states-layer',
                                                                icon: 'fa-arrow-left',
                                                                title: 'states',
                                                                id: 'statesLayer',
                                                                onClick: function(control) {
                                                                    //console.log(control);
                                                                    map.removeLayer(geojson11);
                                                                    geojson10.addTo(map);
                                                                    map.fitBounds(geojson10.getBounds());
                                                                    backbut10.remove();
                                                                    map.addControl(backbut9);

                                                                }
                                                            }]
                                                        });

                                                        map.addControl(backbut10);




                                                    }


                                                }




                                            }



                                        }




                                    }


                                }


                            }

                        }

                    }

                    ///////// Ends India Level Code


                    ///////// Starts USA Country Level Code Code 233
                    //console.log(window.contid + "<<<==== " + window.maplevel);
                    else if (window.contid == 207 && window.maplevel == 0 && window.mapType == "S") {

                        map.removeLayer(geojson2);

                        load('./maps/KML/207/O-207.js');

                        maplevel = 1; ///// Country level

                        var geojson3;

                        geojson3 = L.geoJson(USOutline, {
                            style: style,
                            onEachFeature: onEachFeature3
                        }).addTo(map);

                        map.fitBounds(geojson3.getBounds());


                        ///// Starts Back button2

                        backbut1.remove();

                        var backbut2 = L.easyButton({
                            position: 'topright',
                            states: [{
                                stateName: 'countries-layer',
                                icon: 'fa-arrow-left',
                                title: 'countries',
                                id: 'countriesLayer',
                                onClick: function(control) {
                                    //console.log(control);
                                    map.removeLayer(geojson3);
                                    geojson2.addTo(map);
                                    window.maplevel = 0;
                                    map.fitBounds(geojson2.getBounds());
                                    backbut2.remove();
                                    map.addControl(backbut1);

                                }
                            }]
                        });

                        map.addControl(backbut2);

                        ///// Ends Back button2



                        function onEachFeature3(feature3, layer3) {
                            layer3.on({
                                mouseover: highlightFeature3,
                                mouseout: resetHighlight3,
                                dblclick: zoomToFeature3
                            });

                            function highlightFeature3(e) {
                                var layer3 = e.target;

                                layer3.setStyle({
                                    fillColor: 'red',
                                    fillOpacity: 0.5,
                                    color: "blue",
                                    weight: 0.7,
                                    opacity: 0.5,
                                    stroke: 0.1,
                                    dashArray: '0'
                                });


                                if (!L.Browser.ie && !L.Browser.opera) {
                                    layer3.bringToFront();
                                }

                                info.update(layer3.feature.properties);
                            }

                            function resetHighlight3(e) {
                                geojson3.resetStyle(e.target);
                                info.update();
                            }

                            function zoomToFeature3(e) {
                                map.removeLayer(geojson3);

                                load('./maps/KML/207/S-207.js');

                                var geojson4;

                                geojson4 = L.geoJson(USStates, {
                                    style: style,
                                    onEachFeature: onEachFeature4
                                }).addTo(map);

                                map.fitBounds(geojson4.getBounds());

                                ///// Starts Back button3
                                backbut2.remove();

                                var backbut3 = L.easyButton({
                                    position: 'topright',
                                    states: [{
                                        stateName: 'states-layer',
                                        icon: 'fa-arrow-left',
                                        title: 'states',
                                        id: 'statesLayer',
                                        onClick: function(control) {
                                            //console.log(control);
                                            map.removeLayer(geojson4);
                                            geojson3.addTo(map);
                                            map.fitBounds(geojson3.getBounds());
                                            backbut3.remove();
                                            map.addControl(backbut2);

                                        }
                                    }]
                                });

                                map.addControl(backbut3);
                                ///// Ends Back button3




                                function onEachFeature4(feature4, layer4) {
                                    layer4.on({
                                        mouseover: highlightFeature4,
                                        mouseout: resetHighlight4,
                                        dblclick: zoomToFeature4
                                    });
                                }

                                function highlightFeature4(e) {
                                    var layer4 = e.target;

                                    layer4.setStyle({
                                        fillColor: 'red',
                                        fillOpacity: 0.5,
                                        color: "blue",
                                        weight: 0.7,
                                        opacity: 0.5,
                                        stroke: 0.1,
                                        dashArray: '0'
                                    });


                                    if (!L.Browser.ie && !L.Browser.opera) {
                                        layer4.bringToFront();
                                    }

                                    info.update(layer4.feature.properties);
                                }

                                function resetHighlight4(e) {
                                    geojson4.resetStyle(e.target);
                                    info.update();
                                }

                                function zoomToFeature4(e) {
                                    alert(window.contid);
                                }
                            }

                        }

                    } else {
                        // alert("No Country Selected !!!");
                    }

                    ///// Ends USA Country Level Code

                }

                ///// Ends Country Level Code


            }

            var geojson;

            geojson = L.geoJson(worldOutline, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);

            // L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
            //     maxZoom: 3,
            //     minZoom: 1,
            //     attribution: '',
            //     id: 'mapbox.light'
            // }).addTo(map);

            var grayscale = L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
                    maxZoom: 3,
                    minZoom: 1,
                    attribution: '',
                    id: 'mapbox.light'
                }),
                streets = L.esri.basemapLayer('Imagery');

            var baseLayers = {
                "Map": grayscale,
                "Earth": streets
            };

            var cities = L.layerGroup();

            L.marker([12.994923, 77.605359]).bindPopup('Bengaluru').addTo(cities).on('mouseover', onClick1);
            L.marker([13.060215, 80.283344]).bindPopup('Chennai').addTo(cities).on('mouseover', onClick1);
            L.marker([19.061079, 72.870019]).bindPopup('Mumbai').addTo(cities).on('mouseover', onClick1);
            L.marker([28.611048, 77.205509]).bindPopup('New Delhi').addTo(cities).on('mouseover', onClick1);
            L.marker([22.564308, 88.373426]).bindPopup('Kolkatta').addTo(cities).on('mouseover', onClick1);

            function onClick1(ev) {
                ev.target.openPopup();
            }



            var overlays = {
                "Cities": cities
            };

            L.control.layers(baseLayers, overlays).addTo(map);

            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    dblclick: zoomToFeature
                });
            }

            //map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');
            map.attributionControl.addAttribution('');
        </script>

    </div>

    <div class="col-lg-7 col-xl-6 chart-section" style="height: 44ch; border-style: ridge;">
    </div>

    <br />

    <div class="col-12 col-xl-12 grid-section">
    </div>

</div>
@endsection

@push('custom-scripts')

<script>
    $(function() {

        // $('.sidebar-toggler').click(function() {
        //     // alert("ZZZZZZZZZZ");
        //     $('.period-calendar').toggle();
        // });

        $('.cokLabel').attr('style', 'font-size: 0.5px;');

        $('.leaflet-marker-icon').hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.map-section').hide();
        $('.chart-section').hide();
        $('.grid-section').hide();

        //var prntmenu = ["271241", "1", "5125", "259609", "271999"];
        var prntmenu = {!! $rootmenu !!};
        //console.log(prntmenu);
        //return false;

        $('.domain-id').click(function() {
            var mid = $(this).attr("alt");
            
            for(let mm of prntmenu) {
                
            // return false;

                if (mm['refid'] == mid) {
                    //alert(mm + " <<<==== "+ mid);
                    $('#menu2-' + mid).removeClass('btn-success').addClass('btn-danger');
                    $('.submenu-' + mid).show();
                } else {
                    $('#menu2-' + mm['refid']).removeClass('btn-danger').addClass('btn-success');
                    $('.submenu-' + mm['refid']).hide();
                }

            }

            $('.dashboard-section').hide();
            $('.leaflet-piechart-icon').hide();

            $('.map-section').show();
            $('.chart-section').hide();
            $('.grid-section').hide();
            return false;
        });


    });
</script>

<script src="http://sashakavun.github.io/leaflet-canvasicon/leaflet-canvasicon.js"></script>
<!-- Load Esri Leaflet from CDN -->
<script type="text/javascript" src="{{ asset('assets/js/leaflet-piechart.js') }}"></script>
<script src="{{ asset('assets/js/leaflet-search.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/datepicker.js') }}"></script>

@endpush