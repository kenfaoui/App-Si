<?php

require_once "non_connect_admin.php";



$con=new mysqli('localhost','root','rootpassword','gestion') or die(mysqli_error($conn));
if(isset($_POST["log"]))
{
	$match=false;
 // $idu="";
  $user=$_POST['username'];
  $pass=$_POST['password'];
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $place=$_POST['place'];
  $reg=$_POST['region'];
  $phones=$_POST['phone'];
  $email=$_POST['email'];
 $quer=$con->query("SELECT  Username FROM  users   ") or die($con->error);
 $quer2=$con->query("SELECT  MAX(id) as idm FROM  users   ") or die($con->error);
 $rese=$quer2->fetch_assoc();
 $vr=$rese['idm'];
 $vr++;




while($res=$quer->fetch_assoc())
{
	if ($res['Username']==$user) {
		$match=true;
	     
  	 echo "<script type='text/javascript'>alert('User Name Or Already exicte');
    location.href='Ajoutez-users.php'</script>";
	}
}
  if(!$match)
  {
       $con->query(" INSERT INTO users (Username,Userpass,Place,Region,nom,prenom) Values  ('$user','$pass','$place','$reg','$nom','$prenom')") or die($con->error); $con->query(" INSERT INTO user_phone  Values  ('$vr','$phones')") or die($con->error);$con->query(" INSERT INTO user_email  Values  ('$vr','$email')") or die($con->error);
   header("location:manage-users.php");
  }
    
  
  
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajoutez Users </title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	 <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

	<style type="text/css">
		form{
         

	
	display: inline-block;
		}


	</style>
</head>
<body style="background-color:#595959; color: white;">
<center>
	<h2>Ajoutez Users</h2>
	<form  action="" method="post">
		
<!--<label>Id</label><input type="number" name="id" class="form-control" required="required">-->

<label>Username</label><input type="text" name="username" class="form-control"required="required">

	<label>nom</label><input type="text" name="nom" class="form-control"required="required">

	<label>prenom</label><input type="text" name="prenom" class="form-control"required="required">

<label>Password</label><input type="Password" name="password" class="form-control"required="required">

<label>Place</label><input type="text" name="place" class="form-control"required="required">

<label>Region</label><input type="text" name="region" class="form-control"required="required">

<label>Phone</label><input type="text" name="phone" class="form-control"required="required">


<label>Email</label><input type="text" name="email" class="form-control"required="required">
<div class="form-group">
<input type="submit" name="log" class="btn btn-primary" style="margin-top: 12px;"></div>




	</form>




</center>
</body>
</html>