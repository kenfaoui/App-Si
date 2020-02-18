<?php
 require_once('non_connect.php');

$conn=new mysqli('localhost','root','','gestion') or die(mysqli_error($conn));
$id=0;
        $update=false;
      $id="";
      $nom="";
      $prenom="";
      $username="";
      $password="";
      $region="";

    
      if(isset($_GET['editer_profile']))
    {
      $id=$_GET['editer_profile'];
      $update=true;
      $res=$conn->query("SELECT * FROM users WHERE id=$id") or die($conn->error());
      $eml=$conn->query("SELECT * FROM user_email WHERE id_fk=$id") or die($conn->error());
      $phn=$conn->query("SELECT * FROM user_phone WHERE id_user=$id") or die($conn->error());

      if(mysqli_num_rows($res))
      {

        $row=$res->fetch_array();
        $row_eml=$eml->fetch_array();
        $row_phn=$phn->fetch_array();
          $id=$row['id'];
          $nom=$row['nom'];
          $prenom=$row['prenom'];
          $username=$row['Username'];
          $password=$row['Userpass'];
          $region=$row['Region'];
          $number=$row_phn['Phone_number'];
          $email=$row_eml['email'];
         }
    }
    if(isset($_POST['modifier_profile']))
    {
          $id=$_SESSION['id'];
          $nom=$_POST['nom'];
          $prenom=$_POST['prenom'];
          $username=$_POST['username'];
          $password=$_POST['password'];
          $region=$_POST['region'];
          $number=$_POST['number'];
          $email=$_POST['email'];
      $conn->query("UPDATE users SET nom='$nom',prenom='$prenom',Username='$username',Userpass='$password',Region='$region' WHERE id='$id'") or die($conn->error());
      $conn->query("UPDATE email SET email='$email'WHERE id_fk='$id'") or die($conn->error());
      $conn->query("UPDATE user_phone SET phone.number='$number'WHERE id_fk='$id'") or die($conn->error());
      $_SESSION['message']="profile bien modifié";
      $_SESSION['msg_type']="warning";
      header("location:acceuil.php");

    }
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

  <title>Modifier profile</title>
  
</head>
<body>
 
  <div class="container">
    <center>
      <h1>Modifier Votre profile</h1>
   
    
</center>
<div class="row justify-content-center">
<form action="editer_profile.php" method="POST">
 
  <div class="form-group">
  <label>nom</label>
  <input type="text" name="nom" class="form-control"value="<?php echo $nom ?>" required="required" readonly>
  </div>
  <div class="form-group">
  <label>prenom</label>
  <input type="text" name="prenom" class="form-control"value="<?php echo $prenom ?>" required="required" readonly>
  </div>
  <div class="form-group">
  <label>username</label>
  <input type="text" name="username" class="form-control MapLat"value="<?php echo $username ?>" required="required"readonly>
  </div>
  <div class="form-group">
  <label>password</label>
  <input type="password" name="password" class="form-control MapLon"value="<?php echo $password ?>" required="required">
  </div>
  <div class="form-group">
  <label>Region</label>
  <input type="text" name="region" class="form-control MapLat"value="<?php echo $region ?>" required="required"readonly>
  </div>
  <?php if(mysqli_num_rows($phn)): ?>
  <div class="form-group">
  <label>Phone Number</label>
  <input type="number" name="number" class="form-control MapLat"value="<?php echo $number ?>" required="required">
  </div>

<?php endif; ?>
<?php if(mysqli_num_rows($eml)): ?>
  <div class="form-group">
  <label>Email</label>
  <input type="email" name="email" class="form-control MapLat"value="<?php echo $email ?>" required="required">
  </div>
  <?php endif; ?>
  <div class="form-group">

      <button type="submit" name="modifier_profile"class="btn btn-primary">Modifier</button>
    
  </div>
</form>
</div>
</div>
<script src="js/main.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.js"></script>

</body>
</html>