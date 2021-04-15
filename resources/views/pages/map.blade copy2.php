<!DOCTYPE html>
<html>
<head>
<title>BrandIdeaMAP</title>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="./maps/js/leaflet.ajax.min.js"></script>
<!-- <script src="./maps/js/leaflet.ajax.min.js"></script> -->

</head>

<body oncontextmenu="return false;">

<div id="map" style="height: 380px;"></div>

<script type="text/javascript">

var map = L.map("map");
map.setView([39.639538,60.750986], 2);

var options = { attribution: "" };

var layer = L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', options)
layer.addTo(map);

function style(feature) {
    return {
        fillColor: 'white', 
        fillOpacity: 0.8,  
        weight: 1,
        opacity: 1,
        stroke: 1,
        dashArray: '0'
    };
}

var geojson1 = new L.GeoJSON.ajax("./maps/KML/1-21-21.geojson", {
	style: style,
}).addTo(map) ;

// var geojson1 = new L.GeoJSON();

// function getJson(data) {
//           console.log(data)
//           geojson1.addData(data);
//       }

//   $.ajax({
//           url: "./maps/KML/1-21-21.geojson",
//           dataType: 'geojson',
//           jsonpCallback: 'getJson',
//           success: getJson
//       });

//       map.addLayer(geojson1);

// var geojson1 = L.GeoJSON("./maps/KML/1-21-21.geojson").addTo(map) ;

// geojson1.on('data:loaded', function(){
// 	objectOut = geojson1.toGeoJSON();
//   	//console.log(objectOut['features'][0]['properties']['DB_ID']);
//   	//alert(objectOut['features'][0]['properties']['DB_ID']);
// });

geojson1.on("dblclick", function (event) {
    map.removeLayer(geojson1);
    var geojson2 = new L.GeoJSON.AJAX("./maps/KML/1-21-1.geojson", {
		  style: style,
	}).addTo(map) ;

	geojson2.on('data:loaded', function(){
		objectOut = geojson2.toGeoJSON();
	  	//console.log(objectOut['features'][0]['properties']['DB_ID']);
		//alert(objectOut['features'][0]['properties']['DB_ID']);
	});

	geojson2.on("dblclick", function (event) {
		    map.removeLayer(geojson2);

		    map.setView([22.268764,78.458609], 4);
		    var geojson3 = new L.GeoJSON.AJAX("./maps/KML/india_administrative_outline_boundary.geojson", {
				style: style,
			}).addTo(map) ;

			geojson3.on('data:loaded', function(){
				objectOut = geojson3.toGeoJSON();
			  	//console.log(objectOut['features'][0]['properties']['DB_ID']);
				//alert(objectOut['features'][0]['properties']['DB_ID']);
			});

			geojson3.on("dblclick", function (event) {
			    map.removeLayer(geojson3);

			    	map.setView([22.268764,78.458609], 4);
			    	var geojson4 = new L.GeoJSON.AJAX("./maps/KML/1-5-7.geojson", {
						style: style,
					}).addTo(map) ;

					geojson4.on('data:loaded', function(){
						objectOut = geojson4.toGeoJSON();
					  	//console.log(objectOut['features'][0]['properties']['DB_ID']);
						//alert(objectOut['features'][0]['properties']['DB_ID']);
					});

					geojson4.on("dblclick", function (event) {
					    map.removeLayer(geojson4);
					    alert("Finished ....");

					    	

					});		//// End of Level 3 layer



			});		//// End of Level 3 layer


	});   //// End of Level 2 layer


});  /// End of Level 1 Layer





// var medhhinc = new L.KML("./maps/KML/1---5---5.kml", {async: true});
// map.addLayer(medhhinc);

// medhhinc.on("click", function (event) {
//     var clickedMarker = event.layer;
//     alert("Yessssssssssss");
//     console.log(medhhinc);
//     //map.removeLayer(medhhinc)
// });


</script>
</body>
</html>
