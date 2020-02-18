<?php
 
 $conn=new mysqli('localhost','root','','gestion') or die(mysqli_error($conn));

if(isset($_POST['envoyer']))
{
  $username=$_POST['username'];
  $email=$_POST['email'];
  $res=$conn->query("SELECT id FROM users JOIN user_email WHERE Username='$username' AND id_fk=id AND email='$email' ");
$row=$res->fetch_assoc();
$idd=$row['id'];

  if(mysqli_num_rows($res))
  {
   $new_pass=rand(1000,9999);
   $update=$conn->query("UPDATE users SET Userpass='$new_pass' WHERE id='$idd'");
   //$msg="Votre Nouveau Mot de Pass";
   //mail($email,$msg,$new_pass);
   echo "<script type='text/javascript'>alert('votre nouveau mot de passe a ete envoye a votre email . Votre nouveau mot de pass est : $new_pass  ');
    location.href='login_page.php'</script>";
  }
  else
    echo "<script type='text/javascript'>alert('username ou email est incorrecte!');
    location.href='form_oublier.php'</script>";
}