<?php
 require_once('non_connect.php');

$conn=new mysqli('localhost','root','rootpassword','gestion') or die(mysqli_error($conn));
$idp=0;
        $update=false;
      $idp="";
    	$type="";
    	$nom="";
    	$latitude="";
    	$longitude="";
    	$id_fk="";
 if(isset($_POST['ajouter']))
    {
    	//$idp=$_POST['idp'];
    	$type=$_POST['type'];
    	$nom=$_POST['nom'];
    	$latitude=$_POST['latitude'];
    	$longitude=$_POST['longitude'];
    	$id_fk=$_SESSION['id']; /*$_POST['id_fk']*/

        $test=$conn->query("SELECT * FROM place where Latitude='$latitude' AND Longitude='$longitude' ") or die($conn->error());
        if (mysqli_num_rows($test) != 0)
        {
        	echo "<script type='text/javascript'> alert(' cette place deja existe');
        	location.href='form_ajouter.php' </script> ";
        }
        else{
    	$conn->query("INSERT INTO place (idp,type,nom,Latitude,Longitude,id_fk) VALUES ('$idp','$type','$nom','$latitude','$longitude','$id_fk')") or die($conn->error);

    	$_SESSION['message']="Place bien ajouté !";
    	$_SESSION['msg_type']="success";
    	header("location:acceuil.php");
}
    }
      if(isset($_GET['editer']))
    {
    	$idp=$_GET['editer'];
    	$update=true;
    	$res=$conn->query("SELECT * FROM place WHERE idp=$idp") or die($conn->error());

    	if(mysqli_num_rows($res))
    	{

    		$row=$res->fetch_array();
    	    $idp=$row['idp'];
    	    $type=$row['type'];
    	    $nom=$row['nom'];
    	    $latitude=$row['latitude'];
    	    $longitude=$row['longitude'];
    	    $id_fk=$row['id_fk'];
         }
    }
    if(isset($_POST['modifier']))
    {
    	    $idp=$_POST['idp'];
    	    $type=$_POST['type'];
    	    $nom=$_POST['nom'];
    	    $latitude=$_POST['latitude'];
    	    $longitude=$_POST['longitude'];
    	    $id_fk=$_SESSION['id'];//$_POST['id_fk'];
    	$conn->query("UPDATE place SET idp='$idp',type='$type',nom='$nom',latitude='$latitude',longitude='$longitude',id_fk='$id_fk' WHERE idp=$idp") or die($conn->error());
    	$_SESSION['message']="Place bien modifié";
    	$_SESSION['msg_type']="warning";
    	header("location:acceuil.php");

    }
?>