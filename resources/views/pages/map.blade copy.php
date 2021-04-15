<!DOCTYPE html>
<html>
<head>
<title>BrandIdeaMAP</title>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
</head>

<!-- <body oncontextmenu="return false;"> To avoid right click -->
<body>
<div id="map" style="height: 380px;"></div>

<script type="text/javascript" src="./maps/KML/world-countries.js"></script>
<script type="text/javascript">
	var map = L.map('map').setView([48.458352,22.261817], 2);

L.tileLayer('https://api.maptiler.com/maps/basic/256/{z}/{x}/{y}.png?key=088HTkVkumk1ZGlBjdvX', {
	maxZoom: 8,
	attribution: '',
	id: 'mapbox.light'
}).addTo(map);


// control that shows state info on hover
var info = L.control();

info.onAdd = function (map) {
	this._div = L.DomUtil.create('div', 'info');
	this.update();
	return this._div;
};

info.update = function (props) {
	this._div.innerHTML = '<h4>World Country Selection</h4>' +  (props ?
		'<b>' + props.CNTRY_NAME + '</b> ID : ' + props.OBJECTID + ' '
		: 'Hover over a Country');
};

info.addTo(map);


// get color depending on population density value
function getColor(d) {
	return d > 1000 ? '#800026' :
		   d > 500  ? '#BD0026' :
		   d > 200  ? '#E31A1C' :
		   d > 100  ? '#FC4E2A' :
		   d > 50   ? '#FD8D3C' :
		   d > 20   ? '#FEB24C' :
		   d > 10   ? '#FED976' :
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
		// weight: 1,
		// opacity: 1,
		// color: 'white',
		// dashArray: '3',
		// fillOpacity: 0.7,
		// fillColor: getColor(feature.properties.density)
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
		// weight: 4,
		// color: 'red',
		// dashArray: '',
		// fillOpacity: 0.7
	});


	if (!L.Browser.ie && !L.Browser.opera) {
		layer.bringToFront();
	}

	info.update(layer.feature.properties);
}

var geojson;

function resetHighlight(e) {
	geojson.resetStyle(e.target);
	info.update();
}

function zoomToFeature(e) {
	map.fitBounds(e.target.getBounds());

		geojson2 = L.geoJson(countriesData, {
			style: style,
			onEachFeature: onEachFeature
		}).addTo(map);

	map.removeLayer(geojson);
}

function onEachFeature(feature, layer) {
	layer.on({
		mouseover: highlightFeature,
		mouseout: resetHighlight,
		dblclick: zoomToFeature
	});
}

geojson = L.geoJson(statesData, {
	style: style,
	onEachFeature: onEachFeature
}).addTo(map);

//map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');
map.attributionControl.addAttribution('');


// var legend = L.control({position: 'bottomright'});

// legend.onAdd = function (map) {

// 	var div = L.DomUtil.create('div', 'info legend'),
// 		grades = [0, 10, 20, 50, 100, 200, 500, 1000],
// 		labels = [],
// 		from, to;

// 	for (var i = 0; i < grades.length; i++) {
// 		from = grades[i];
// 		to = grades[i + 1];

// 		labels.push(
// 			'<i style="background:' + getColor(from + 1) + '"></i> ' +
// 			from + (to ? '&ndash;' + to : '+'));
// 	}

// 	div.innerHTML = labels.join('<br>');
// 	return div;
// };

// legend.addTo(map);

</script>
</body>
</html>
