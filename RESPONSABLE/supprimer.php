<?php
require_once('non_connect.php');
$conn=new mysqli('localhost','root','rootpassword','gestion') or die(mysqli_error($conn));

if(isset($_GET['supprimer'])){
	
	
    	$idp=$_GET['supprimer'];
    	$conn->query("DELETE FROM place WHERE idp=$idp") or die($conn->error());

    	$_SESSION['message']="Place bien supprimé!";
    	$_SESSION['msg_type']="danger";
    	header("location:acceuil.php");

    }
?>