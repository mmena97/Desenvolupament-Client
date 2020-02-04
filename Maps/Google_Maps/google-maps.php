<!DOCTYPE html>
<html>
<body>

<div id="googleMap" style="width:1200px;height:700px;"></div>

<script>

function myMap() {
	var mapProp= {
	  center:new google.maps.LatLng(39.5994550, 2.9726290),
	  zoom:10,
	};
	var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
				var myObj = JSON.parse(this.responseText);
				for(x in myObj){
					for(y in myObj[x]){

						var position = {lat: myObj[x][y].latitude, lng: myObj[x][y].longitude};

						var marker = new google.maps.Marker({
							position: position,
							map: map,
							title: myObj[x][y].nombre
						});

						marker.setMap(map);

					}
				}
		}
};
xmlhttp.open("GET", "lugares.json", true);
xmlhttp.send();

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCKiIqCdZGrVxx06LSbe7uG3zXOq1Cz5k&callback=myMap"></script>

</body>
</html>
