<?php 
session_start();
include('dbconnection.php');


 ?>
 <!DOCTYPE html>

 <html>
 <head>
 	<title> Show places </title>
 	 <link href="assets/css/bootstrap.css" rel="stylesheet">
 	 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 	 
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
 </head>

 <body>

 	<section id="main-content">
 		 <section class="wrapper">
 		 	<div class="row">
 		 		 <div class="col-md-12">
 		 		 	<div class="content-panel">
 <table class="table table-striped table-dark table-hover ">
 	<th scope="col">Id_p</th>
 	<th scope="col">Type</th>
 	<th scope="col">Name</th>
 	<th scope="col">Latitude</th>
 	<th scope="col">Longitude</th>

<?php 
$idconnect=$_GET['id'];
$query=$con->query("SELECT *from place WHERE id_fk='$idconnect'");
while ($res=$query->fetch_assoc()) {?>

<tr>
	<td><?php echo $res['idp'] ?></td>
	<td><?php echo $res['type'] ?></td>
	<td><?php echo $res['nom'] ?></td>
	<td><?php echo $res['latitude'] ?></td>
	<td><?php echo $res['longitude'] ?></td>


</tr>




<?php } ?>

 </table>
</div>
</div>
</div>
</section>
</section>


 </body>
 </html>