<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Leaflet</title>
    <!-- //CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="crossorigin=""/>
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
    <!-- JS -->
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="   crossorigin=""></script>
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <div id="miMapa" style="width:1200px;height:700px;"></div>
    <script>
    // -----------------------------------------------------------
          obj = { "table":"ciudades"};
          dbParam = JSON.stringify(obj);
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  var myObj = JSON.parse(this.responseText);
                  for(x in myObj){
                   var circulo = L.circle([myObj[x].longitud,myObj[x].latitud],{
                       color: 'red',
                       opacity: 0,
                       fillColor: 'red',
                       fillOpacity: 0.2,
                       radius: 3000
                   }).addTo(mapa).addTo(mapa).bindPopup("<b>"+myObj[x].nombre+"</b>");
                  }
              }
          };
          xmlhttp.open("GET", "lugares.php?x=" + dbParam, true);
          xmlhttp.send();
    // -----------------------------------------------------------

      var mapa = L.map('miMapa',{
        //FULLSCREEN
        fullscreenControl:{
          fullscreenCrontol: true
        }
      }).setView([39.5994550, 2.9726290],10);

      L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    	    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    	    maxZoom: 20,
    	    id: 'mapbox.light',
          accessToken: 'pk.eyJ1IjoibWVuYTciLCJhIjoiY2szeThhZHUyMGlwNDNscDZoYmc1ZnMweiJ9.lTy9NAE_I_tyg7Xt04pihw'
    	}).addTo(mapa);

      //ICONOS
      var iconoBotiga = L.icon({
            iconUrl: 'botiga.png',
            iconSize:     [22,18],
            popupAnchor:  [-3, -76]
      });

      var iconoInstituto = L.icon({
            iconUrl: 'escuela.png',
            iconSize:     [30,25],
            popupAnchor:  [-3, -76]
      });

      var botiga = L.marker([39.7186751000,2.9058837800], {icon: iconoBotiga}).addTo(mapa);

    </script>
  </body>
</html>
