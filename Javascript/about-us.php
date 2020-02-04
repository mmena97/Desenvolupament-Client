<?php require '../views/layouts/head.php'; ?>
<body>
	<div class="container wrap row justify-content-center boder shadow" style="margin-top: 20px;">
		<h1 class="mb-4 mt-4">About us</h1>
		<p class="ml-4"><?= $lang[$displayLang]['aboutUsText'];?></p>
		<div class="mb-4 mt-4"id="MyMap" style="width:950px;height:400px;"></div>
	</div>
	<script>
		$(document).ready(function(){

				var map = L.map('MyMap').setView([39.5994550, 2.9726290],9);

	      L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
	    	    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	    	    maxZoom: 20,
	    	    id: 'mapbox.light',
	          accessToken: 'pk.eyJ1IjoibWVuYTciLCJhIjoiY2szeThhZHUyMGlwNDNscDZoYmc1ZnMweiJ9.lTy9NAE_I_tyg7Xt04pihw'
	    	}).addTo(map);

				const url = (window.location.pathname.split('/')[3]) ? '/api/directions/'+window.location.pathname.split('/')[3] : '/api/directions' ;
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var directions = JSON.parse(this.responseText);
							console.log(directions);
							for(x in directions){
							 var point = L.marker([directions[x].latitude,directions[x].longitude]).addTo(map);
							}
						}
					}
					xmlhttp.open("GET", url, false);
					xmlhttp.send();

		});

	</script>
<?php require '../views/layouts/footer.php';?>
