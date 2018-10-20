<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      var service;
      var infowindow;
      var address
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 39.189349, lng: -96.594686},
          zoom: 18
        });
        var request = {
        	query: "<?php echo $_SESSION['address']";
        	fields: ['formatted_address']
        };
        service = new google.maps.places.PlaceService(map);
        service.findPlaceFromQuery(request, callback);
      }
      function callback(results, status) {
      	if (status == google.maps.places.PlacesServiceStatus.OK) {
      		for (var i = 0; i < results.length; i++) {
      			var place = results[i];
      			createMarker(results[i]);
      		}
      	}
      }
	</script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwKmMUBftnXzkff12lIYjIySng4OJTDVs&libraries=places"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwKmMUBftnXzkff12lIYjIySng4OJTDVs&callback=initMap"
    async defer></script>
  </body>
</html>