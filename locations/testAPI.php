
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Street View</title>
  </head>
  <body>
    <div id="street-view"></div>
    <script>
      var panorama;
      function initialize() {
        panorama = new google.maps.StreetViewPanorama(
            document.getElementById('street-view'),
            {
              position: {lat: 37.869260, lng: -122.254811},
              pov: {heading: 165, pitch: 0},
              zoom: 1
            });
      }
    </script>
    <script async defer
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR77cFxxe06TlBNbAAAgEty48353uubUQ&callback=initialize">
    </script>
  </body>
</html>
