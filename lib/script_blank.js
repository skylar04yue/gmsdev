//JS ang Leaflet stuff

//Variables
var mapSW = [0,4096],
	mapNE = [4096,0];


//Declare Map Object
var map = L.map('mapid').setView([0, 0], 2);

//Reference the tiles
L.tileLayer('bhay/{z}/{x}/{y}.png', {
	minZoom: 0,
	maxZoom: 4,
	continuousWorld: false,
	noWrap: true,
	crs: L.CRS.Simple,
	attribution: 'Map data &copy; ',
}).addTo(map);

map.setMaxBounds(new L.LatLngBounds(
	map.unproject(mapSW,map.getMaxZoom()),
	map.unproject(mapNE,map.getMaxZoom())
));


//Add some GeoJSON