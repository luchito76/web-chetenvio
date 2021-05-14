var map;
const fenway = { lat: 40.73061, lng: -73.935242 };
var latlng = new google.maps.LatLng(40.73061, -73.935242);
var stylez = [
	{
		featureType: 'all',
		elementType: 'all',
		stylers: [
			{
				saturation: -10
			}
		]
	}
];
var mapOptions = {
	zoom: 16,
	center: latlng,
	scrollwheel: false,
	scaleControl: true,
	disableDefaultUI: false,
	mapTypeControlOptions: {
		mapTypeIds: [ google.maps.MapTypeId.ROADMAP, 'gMap' ]
	}
};
map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
var geocoder_map = new google.maps.Geocoder();
var address = 'Nuequen';

geocoder_map.geocode(
	{
		address: address
	},
	function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			map.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker({
				map: map,
				position: map.getCenter()
			});

			const flightPlanCoordinates = [
				{ lat: -38.95493810681803, lng: -68.06199827118881 },
				{ lat: -38.95160075654477, lng: -68.05075445099838 },
				{ lat: -38.958408784391004, lng: -68.04011144562729 },
				{ lat: -38.97382454720356, lng: -68.03959646149643 },
				{ lat: -38.97252334621961, lng: -68.06384363099106 }
			];

			const bermudaTriangle = new google.maps.Polygon({
				paths: flightPlanCoordinates,
				strokeColor: '#73d2c0',
				strokeOpacity: 0.8,
				strokeWeight: 2,
				fillColor: '#9fe0d4',
				fillOpacity: 0.35
			});
			bermudaTriangle.setMap(map);
		} else {
			alert('Geocode was not successful for the following reason: ' + status);
		}
	}
);
var mapType = new google.maps.StyledMapType(stylez, {
	name: 'Grayscale'
});
map.mapTypes.set('gMap', mapType);
map.setMapTypeId('gMap');
