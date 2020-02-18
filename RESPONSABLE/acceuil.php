<?php 
require_once('non_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta  name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style_acceuil.css">
	<link href="https://fonts.googleapis.com/css?family=Bangers|Monoton|Permanent+Marker&display=swap" rel="stylesheet">

	<title>ACCEUIL</title>
	
</head>
<body style="color: white;" >
	
<!--<div> <img src=""></div>-->
	<?php require_once'supprimer.php' ?>
	

	<?php if(isset($_SESSION['message'])):	?>
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
		<?php
		echo $_SESSION['message'];
		unset($_SESSION['message']);

		?>
	</div>
    <?php endif ?>
    
	<div class="container">


	<center id="h1decor" ><?php echo "<h1>BIENVENUE &quot; ".$_SESSION['username']." &quot;</h1>"; ?></center>	
	<h1 id="h2decor" style="display: inline-block;margin-bottom:25px;">Listes des places</h1>
	
	<a href="logout.php" name="logout" class="btn btn-danger" style="float: right; display: inline-block;">Se Deconnecter
	</a>

    <?php/* 
    ob_start();
    include 'login.php';
    ob_end_clean(); */?>
	<?php 
	 $conn=new mysqli('localhost','root','rootpassword','gestion') or die(mysqli_error($conn));

	 
     /* $res=$conn->query("SELECT * FROM place ") or die($conn->error);*/
   $id=$_SESSION['id'];
   $etat=false;
    if(isset($_POST['search']) and !empty($_POST['search_input']))
    {
    	
    	$inp=$_POST['search_input'];
    	$res=$conn->query("SELECT idp,type,place.nom,Latitude,Longitude,id_fk FROM place JOIN users WHERE users.id='$id' AND users.id=place.id_fk AND place.nom LIKE '$inp%' order by idp DESC") or die($conn->error);
        $etat=true;
    }
    else
    {

	 $res=$conn->query("SELECT idp,type,place.nom,Latitude,Longitude,id_fk FROM place JOIN users WHERE users.id='$id' AND users.id=place.id_fk order by idp DESC") or die($conn->error);
     }
	 //idp,type,place.nom,latitude,longitude,id_fk
	 //pre_r($res);
	 //pre_r(res$->fetch_assoc());
	 ?>



	 <div class="row justify-content-center" >
	 	
	 <form method="POST" action="acceuil.php">
	 	<input type="text" name="search_input" style="margin-bottom: 20px; ">
	 	<input type="submit" value="chercher" name="search"class="btn btn-primary" style="">
	 </form>

	 </div>

	 <div class="row justify-content-center ">
	 	<div class="table-wrapper-scroll-y my-custom-scrollbar">
<div class="table-responsive">
	 	<table class="table table-striped table-hover table-dark">
	 		
	 		<thead class="thead-dark">
	 			<th scope="col">idp</th>
	 			<th scope="col">type</th>
	 			<th scope="col">nom</th>
	 			<th scope="col">latitude</th>
	 			<th scope="col">longitude</th>
	 			<!--<th scope="col">id_fk</th>-->
	 			<th scope="col" colspan="2" >action</th>
	 		</thead>
	 		<?php
	 		while ($row=$res->fetch_assoc()):?> 
	 			
	 			<tr scope="row">
	 				<td><?php echo $row['idp']; ?></td>
	 				<td><?php echo $row['type']; ?></td>
	 				<td><?php echo $row['nom']; ?></td>
	 				<td><?php echo $row['Latitude']; ?></td>
	 				<td><?php echo $row['Longitude']; ?></td>
	 				<!--<td><?php //echo $row['id_fk']; ?></td>-->
	 				<td>
	 					<a href="form_ajouter.php?editer=<?php echo $row['idp']; ?>"
	 						class="btn btn-info" >Editer</a>
	 					<a href="supprimer.php?supprimer=<?php echo $row['idp']; ?>"
	 					onclick="return confirm('êtes-vous sûr de vouloir supprimer ce lieu?')"	class="btn btn-warning" >Supprimer</a>
	 				</td>
	 			</tr>
	 		<?php endwhile; ?>
	 		
	 	</table>
	 	</div>
	 </div>
</div>

	 <center>
	 	
	 <a href="form_ajouter.php" id="ajouter" name="ajouter" class="btn btn-success">Ajouter une place
	</a>
	
</center>
</div>
     <?php
	 /*function pre_r( $array )
	 {
	 	echo '<pre>';
	 	print_r($array);
	 	echo '</pre>';
	 }*/
	 ?>




<script src="js/main.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.js"></script>
</body>
</html>