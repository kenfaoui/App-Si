<?php 
require_once('non_connect.php');
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta  name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style_ajouter.css">
	<link href="https://fonts.googleapis.com/css?family=Bangers|Monoton|Permanent+Marker&display=swap" rel="stylesheet">
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<title>Ajouter une place</title>
	
</head>
<body onload="get()">
	<?php require_once'ajouter.php' ?>
	
	<div class="container">
		<center>
<?php if($update == true):?>
			<h1>Modifier une Place</h1>
		<?php else: ?>
			<h1>Ajouter une Place</h1>
		<?php endif; ?>
</center>
<div class="row justify-content-center">
<form action="ajouter.php" method="POST">
	<input type="hidden" name="idp" value="<?php echo $idp ?>">
	<!--<div class="form-group">
	 <label>idp</label>
	<input type="number" name="idp" class="form-control"value="<?php echo $idp ?>" required="required">
	</div>-->
	<div class="form-group">
	<label>type</label>
	<input type="text" name="type" class="form-control"value="<?php echo $type ?>" required="required">
	</div>
	<div class="form-group">
	<label>nom</label>
	<input type="text" name="nom" class="form-control"value="<?php echo $nom ?>" required="required">
	</div>
	<div class="form-group">
	<label>latitude</label>
	<input type="text" name="latitude" id="lat" class="form-control MapLat"value="<?php echo $latitude ?>" required="required" >
	</div>
	<div class="form-group">
	<label>longitude</label>
	<input type="text" name="longitude" id="lon" class="form-control MapLon"value="<?php echo $longitude ?>" required="required">
	</div>
	
      
   
	<div class="form-group">
		<?php if($update == true):?>
			<button type="submit" name="modifier"class="btn btn-primary">Modifier</button>
		<?php else: ?>
			<button type="submit" name="ajouter"class="btn btn-primary" style="display: inline-block;">Ajouter</button>
		<?php endif; ?>
	</div>
	
</form>
 
</div>
</div>


<script>
	var x = document.getElementById("erreur");

var lat = document.getElementById("lat");
var lon = document.getElementById("lon");


 function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);

  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}



function showPosition(position) {
	var accuracy=position.coords.accuracy;
	
   console.log(accuracy);
	if(accuracy <= 50)
	{
lat.value =position.coords.latitude ;
  lon.value = position.coords.longitude;
  }
  else
  {
  	lat.value = null;
  	lon.value = null;
  }
}
</script>


<script src="js/main.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/all.js"></script>
<button onclick="getLocation()" class="btn btn-success"  style="margin-left: 500px; display: inline-block;"> Ma position</button>
</body>
</html>