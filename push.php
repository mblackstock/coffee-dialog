<?php
	// push lat, lng, product into pusher
	require('Pusher.php');
	
	echo 'push';
	
	$lat = $_REQUEST['lat'];
	$lng = $_REQUEST['lng'];
	$prod = $_REQUEST['prod'];

	$key='c281696ff7ec61fd002c';
	$secret='ec9f8a870cc5f8604e59';
	$app_id='22482';
	
	$pusher = new Pusher($key, $secret, $app_id, true);
	$pusher->trigger('test_channel', 'my_event', '{"lat":'.$lat.',"lng":'.$lng.',"prod":"'.$prod.'"}');
	echo "pushed";
?>
