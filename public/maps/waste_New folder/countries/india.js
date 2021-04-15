load('./maps/KML/india-outline.js');

maplevel = 1; ///// Country level

var geojson3;

geojson3 = L.geoJson(indiaOutline, {
    style: style,
    onEachFeature: onEachFeature3
}).addTo(map);

var bounds = L.latLngBounds(e.target.getBounds());
var wantedZoom = map.getBoundsZoom(bounds, true);
var center = bounds.getCenter();
map.setView(center, wantedZoom);

function onEachFeature3(feature3, layer3) {
    layer3.on({
        mouseover: highlightFeature3,
        mouseout: resetHighlight3,
        dblclick: zoomToFeature3
    });
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
        // weight: 4,
        // color: 'red',
        // dashArray: '',
        // fillOpacity: 0.7
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

    ///// Starts India States Level Code

    map.removeLayer(geojson3);

    load('./maps/KML/india-states.js');

    var geojson4;

    geojson4 = L.geoJson(indiaStates, {
        style: style,
        onEachFeature: onEachFeature4
    }).addTo(map);

    var bounds = L.latLngBounds(e.target.getBounds());
    var wantedZoom = map.getBoundsZoom(bounds, true);
    var center = bounds.getCenter();
    map.setView(center, wantedZoom);



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
        //alert(window.contid);

        switch (parseInt(window.contid)) {
            case 17: //// India State Code Karnataka

                maplevel = 2; ///// States level
                load('./maps/KML/state17.js');
                // alert(window.contid);
                map.removeLayer(geojson4);
                var geojson5;
                geojson5 = L.geoJson(state17, {
                    style: style,
                    onEachFeature: onEachFeature5
                }).addTo(map);

                var bounds = L.latLngBounds(e.target.getBounds());
                var wantedZoom = map.getBoundsZoom(bounds, true);
                var center = bounds.getCenter();
                map.setView(center, wantedZoom);

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

                    load('./maps/KML/state17-7-9.js');

                    var geojson6;
                    geojson6 = L.geoJson(state17_7_9, {
                        style: style,
                        onEachFeature: onEachFeature6
                    }).addTo(map);

                    var bounds = L.latLngBounds(e.target.getBounds());
                    var wantedZoom = map.getBoundsZoom(bounds, true);
                    var center = bounds.getCenter();
                    map.setView(center, wantedZoom);

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

                        switch (parseInt(window.contid)) {
                            case 73: //// India ==> Karnataka ==> Bangalore

                                maplevel = 3; ///// District level

                                load('./maps/KML/district73-14878-12.js');

                                map.removeLayer(geojson6);
                                var geojson7;
                                geojson7 = L.geoJson(district73_14878_12, {
                                    style: style,
                                    onEachFeature: onEachFeature7
                                }).addTo(map);

                                var bounds = L.latLngBounds(e.target.getBounds());
                                var wantedZoom = map.getBoundsZoom(bounds, true);
                                var center = bounds.getCenter();
                                map.setView(center, wantedZoom);


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
                                    //alert("KKKKKKKKKKKKKK");
                                    map.removeLayer(geojson7);

                                    load('./maps/KML/wards_73-14878-15.js');

                                    var geojson8;

                                    geojson8 = L.geoJson(wards73_14878_15, {
                                        style: style,
                                        onEachFeature: onEachFeature8
                                    }).addTo(map);

                                    var bounds = L.latLngBounds(e.target.getBounds());
                                    var wantedZoom = map.getBoundsZoom(bounds, true);
                                    var center = bounds.getCenter();
                                    map.setView(center, wantedZoom);

                                    //map.fitBounds(e.target.getBounds());

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

                                        switch (parseInt(window.contid)) {
                                            case 94: //// India ==> Karnataka ==> Bangalore ==> Ward Gandhi Nagar

                                                maplevel = 4; ///// Ward level

                                                load('./maps/KML/ward_alone_1380061.js');

                                                map.removeLayer(geojson8);


                                                var geojson9;
                                                geojson9 = L.geoJson(ward_alone_1380061, {
                                                    style: style,
                                                    onEachFeature: onEachFeature9
                                                }).addTo(map);

                                                var bounds = L.latLngBounds(e.target.getBounds());
                                                var wantedZoom = map.getBoundsZoom(bounds, true);
                                                var center = bounds.getCenter();
                                                map.setView(center, wantedZoom);

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

                                                }




                                        } ///// End of Wards level Switch










                                    }



                                }




                        }




                    }


                }


                case 21: /////////// India State Code Maharashtra

                    var contid = 233;


        }



    }

}