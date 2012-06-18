<html>
 <head>
  <title>Product Number 1</title>
<script type="text/javascript" src="jquery-1.5.1.js"></script>

<script type="text/javascript"> 

function pushLocation(position)
{
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    var timestamp = position.timestamp;
    var accuracy = position.coords.accuracy;

	// push our location in
    $.ajax({
    	url: "push.php?lat="+lat+"&lng="+lng+"&prod=coffee"
	});
 	
}

function getLocation() {
    navigator.geolocation.getCurrentPosition(pushLocation,
    function error(msg){
                alert('Error retrieving location.');  
      }, {maximumAge:600000, timeout:5000, enableHighAccuracy: true});      
}
  
$(document).ready(function() {
	getLocation();
});
</script>

</head>
<body> 
<h1>Product 1</h1>
<img src="http://qr.kaywa.com/img.php?s=8&d=http%3A%2F%2Fsensetecnic.com%2Fwot2012%2Fproduct1.php" alt="QRCode"/>
<p>
Product description
</p>
</body>
</html>