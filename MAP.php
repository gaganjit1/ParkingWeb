    <style>
      #map {
        height: 400px;
        width: 400px;
       }
    </style>

    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 37.337, lng:  -121.881594};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDlrfKeuteF5W4YT12nBSyCV9tD8KLHhk&callback=initMap">
    </script>
