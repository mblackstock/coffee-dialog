<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>WoT2012 Coffee Track</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="coffee_files/application-361b8414c3016d096882c282c808adbc.css" media="all" rel="stylesheet" type="text/css">
    <script src="coffee_files/pusher.js" type="text/javascript"></script>
    <script src="coffee_files/application-9d141c257365fbcfd1a5676f2ed41e87.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery-1.5.1.js"></script>
    <meta content="authenticity_token" name="csrf-param">
<meta content="KZH4QtfSpYzjRK37GuoZN4gRU3A8RfmCD4uSlX3XiVU=" name="csrf-token">


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

    <script type="text/javascript">
//<![CDATA[

      app.faye = new Pusher('b58a51a2266600689beb');

//]]>
</script>  </head>
  <body>
    <div id="masthead">
      <a href="/" class="brand">WoT2012 Coffee Track</a>
    </div>

    <div class="container">
      <table class="table table-striped table-bordered table-condensed">
  <tbody>
	<?php
		include_once "get_things.php";

		// This gets this particular coffee
		$results = getThing($_GET["id"]);
		$thng=json_decode($results);		
	?>

      <tr>
        <th>Coffee ID number</th>
          <td><?php echo $_GET["id"]; ?></td>
      </tr>


	<tr>
	  <th>Name</th>
	    <td><?php echo $thng->{'name'}; ?> </td>
	</tr>
	<tr>
	  <th>Description</th>
	    <td><?php echo $thng->{'description'}; ?></td>
	</tr>

	<tr>
	  <th>Public</th>
	    <td><?php echo $thng->{'is_public'}; ?></td>
	</tr>
	<tr>
	  <th>Created on</th>
	    <td><?php echo $thng->{'created_at'}; ?></td>
	</tr>
    <tr>
      <th>Produced at</th>
        <td>Long: <?php echo $thng->{'longitude'}; ?> - Lat: <?php echo $thng->{'latitude'}; ?></td>
    </tr>

<?php
// now we get all the properties of that thng
$results2 = getProps($_GET["id"]);
$thng_props=json_decode($results2);
//var_dump($thng_props);

for ($i=0; $i<sizeof($thng_props); $i++) {
    //$res = isset($arr[$i]);
    echo "<tr><th>".$i." - ".$thng_props[$i]->{'key'}."</th><td>".$thng_props[$i]->{'value'}."</td></tr>";
}

?>
				<?php
				$results = getThingList();
				
				$thngs=json_decode($results);
				//var_dump($thngs);

				?>


      <tr>
        <th>Products</th>
          <td>
            <form accept-charset="UTF-8" action="coffee.php" class="simple_form form-inline" id="new_bottle" method="get" novalidate="novalidate"><div style="margin:0;padding:0;display:inline"></div>
              <div class="input select required"><select class="select required" id="bottle_destination" name="id">
				<?php
				for ($i=0; $i<sizeof($thngs); $i++) {
//					echo $thngs[$i]->{'id'};
				    echo "<option value=\"".$thngs[$i]->{'id'}."\">".$thngs[$i]->{'id'}."</option>\n";
				}

				?>
              <input class="btn btn-primary" name="commit" value="Update" type="submit">
</form>          </td>
      </tr>


      <tr>
        <th>destination</th>
          <td>
            <form accept-charset="UTF-8" action="/bottles/4f804d0259dd018af6b32e80" class="simple_form form-inline" id="new_bottle" method="post" novalidate="novalidate"><div style="margin:0;padding:0;display:inline"><input name="utf8" value="✓" type="hidden"><input name="_method" value="put" type="hidden"><input name="authenticity_token" value="KZH4QtfSpYzjRK37GuoZN4gRU3A8RfmCD4uSlX3XiVU=" type="hidden"></div>
              <div class="input select required"><select class="select required" id="bottle_destination" name="bottle[destination]"><option value=""></option>
<option value="Phuket, Thailand">Phuket, Thailand</option>
<option value="Zurich, Switzerland" selected="selected">Zurich, Switzerland</option>
<option value="Mexico City, Mexico">Mexico City, Mexico</option>
<option value="Kiev, Ukraine">Kiev, Ukraine</option></select></div>
              <input class="btn btn-primary" name="commit" value="Update" type="submit">
</form>          </td>
      </tr>
  </tbody>
</table>

<h4>Order Location</h4>

<div style="position: relative;" class=" leaflet-container leaflet-fade-anim" id="bottle-map" data-lat="64.06412880784077" data-lon="120.50312249298895"><div style="left: 0px; top: 0px;" class="leaflet-map-pane"><div class="leaflet-tile-pane"><div class="leaflet-layer"><img src="coffee_files/82941_005.png" style="width: 256px; height: 256px; left: 345px; top: -181px;" class="leaflet-tile leaflet-tile-loaded"><img src="coffee_files/82941_004.png" style="width: 256px; height: 256px; left: 601px; top: -181px;" class="leaflet-tile leaflet-tile-loaded"><img src="coffee_files/82942_004.png" style="width: 256px; height: 256px; left: 345px; top: 75px;" class="leaflet-tile leaflet-tile-loaded"><img src="coffee_files/82942_005.png" style="width: 256px; height: 256px; left: 601px; top: 75px;" class="leaflet-tile leaflet-tile-loaded"><img src="coffee_files/82941_002.png" style="width: 256px; height: 256px; left: 89px; top: -181px;" class="leaflet-tile leaflet-tile-loaded"><img src="coffee_files/82941_006.png" style="width: 256px; height: 256px; left: 857px; top: -181px;" class="leaflet-tile leaflet-tile-loaded"><img src="coffee_files/82942_003.png" style="width: 256px; height: 256px; left: 89px; top: 75px;" class="leaflet-tile leaflet-tile-loaded"><img src="coffee_files/82942_006.png" style="width: 256px; height: 256px; left: 857px; top: 75px;" class="leaflet-tile leaflet-tile-loaded"><img src="coffee_files/82941_003.png" style="width: 256px; height: 256px; left: -167px; top: -181px;" class="leaflet-tile leaflet-tile-loaded"><img src="coffee_files/82941.png" style="width: 256px; height: 256px; left: 1113px; top: -181px;" class="leaflet-tile leaflet-tile-loaded"><img src="coffee_files/82942.png" style="width: 256px; height: 256px; left: -167px; top: 75px;" class="leaflet-tile leaflet-tile-loaded"><img src="coffee_files/82942_002.png" style="width: 256px; height: 256px; left: 1113px; top: 75px;" class="leaflet-tile leaflet-tile-loaded"></div></div><div class="leaflet-objects-pane"><div class="leaflet-shadow-pane"><img style="margin-left: -13px; margin-top: -41px; width: 41px; height: 41px; left: 2.27648e+7px; top: -3362880px;" class="leaflet-marker-shadow " src="coffee_files/marker-shadow.png"><img style="margin-left: -13px; margin-top: -41px; width: 41px; height: 41px; left: 585px; top: 150px;" class="leaflet-marker-shadow " src="coffee_files/marker-shadow.png"></div><div class="leaflet-overlay-pane"><svg viewBox="-585 -150 2340 600" height="600" width="2340" style="left: -585px; top: -150px;"><g><path d="M585,96A54,54,0,1,1,584.9,96 z" class="leaflet-clickable" fill-opacity="0.2" fill="#0033ff" stroke-width="5" stroke-opacity="0.5" stroke="#0033ff" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path></g></svg></div><div class="leaflet-marker-pane"><img style="margin-left: -13px; margin-top: -41px; width: 25px; height: 41px; opacity: 1; left: 2.27648e+7px; top: -3362880px; z-index: -3362885;" class="leaflet-marker-icon  leaflet-clickable" src="coffee_files/marker-icon.png"><img style="margin-left: -13px; margin-top: -41px; width: 25px; height: 41px; opacity: 1; left: 585px; top: 150px; z-index: 150;" class="leaflet-marker-icon  leaflet-clickable" src="coffee_files/marker-icon.png"></div><div class="leaflet-popup-pane"></div></div></div><div class="leaflet-control-container"><div class="leaflet-top leaflet-left"><div class="leaflet-control-zoom leaflet-control"><a title="Zoom in" href="#" class="leaflet-control-zoom-in"></a><a title="Zoom out" href="#" class="leaflet-control-zoom-out"></a></div></div><div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-left"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control">Powered by <a href="http://leaflet.cloudmade.com/">Leaflet</a> — Map data © 2012 OpenStreetMap contributors</div></div></div></div>

<div class="report-buttons">
  <a href="#" class="btn btn-primary">Report Conterfeit</a>
  <a href="#" class="btn btn-primary">Report Incorrect Geo</a>
  <a href="/party/index" class="btn btn-primary">View Campaign</a>
</div>

    </div>
  

</body></html>