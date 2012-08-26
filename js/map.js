
function initialize(){
	var latlng = new google.maps.LatLng(10.508974,-66.947299);
	var settings ={
		zoom: 18,
		center: latlng,
		mapTypeControl: true,
		mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DEFAULT},
		navigationControl: true,
		streetViewControl: true,
		navigationControlOptions: {style: google.maps.NavigationControlStyle.LARGE},
		mapTypeId: google.maps.MapTypeId.HYBRID
	};
	var map = new google.maps.Map(document.getElementById("contenido"), settings);
	var contentString = '<div id="content">'+
    '<div id="siteNotice">'+
    '</div>'+
    '<h1 id="firstHeading" class="firstHeading">Consultorio</h1>'+
    '<div id="bodyContent">'+
    '<p>Edificio bla bla bla... piso tal apto tal consultorio tal.</p>'+
    '</div>'+
    '</div>';
	var infowindow = new google.maps.InfoWindow({
		content: contentString});
	var companyPos = new google.maps.LatLng(10.508974,-66.947299);

	var companyMarker = new google.maps.Marker({
		position: companyPos,
		map: map,
		title:"ewtryhg",
		zIndex: 1});
				
	google.maps.event.addListener(companyMarker, 'click', function() {
	infowindow.open(map,companyMarker);});
}