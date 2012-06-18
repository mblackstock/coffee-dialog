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
<h1>Product List</h1>
<p>

<?php
	include_once "get_things.php";
	
	$key='c281696ff7ec61fd002c';
	$secret='ec9f8a870cc5f8604e59';
	$app_id='22482';
	
	$results = getThingList();
	echo $results;
?>
</p>
</body>
</html>