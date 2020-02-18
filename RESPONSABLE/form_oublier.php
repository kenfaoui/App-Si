
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 
  <meta  name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style_login.css">
  <link href="https://fonts.googleapis.com/css?family=Bangers|Monoton|Permanent+Marker&display=swap" rel="stylesheet">

 <title>page d'oublie de mot de pass</title>
 </head>
 <body style="background-color: #595959;color: white;">
 <center>
 <h1 style="font-family: 'Pacifico', cursive;color: white;">Page de recuperation de mot de pass</h1>
 </center>
 <div class="row justify-content-center" >
	<form method="POST" action="oublier.php" >
    <div><img src="img/wilaya.jpg"> </div>
  <div class="form-group">
    <label >Username</label>
    <input name="username" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label >Email</label>
    <input name="email" type="text" class="form-control">
  </div>
  
  <button type="submit" class="btn btn-primary" name="envoyer">envoyer</button>
  
</form>

</div>

 <script src="js/main.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.js"></script>
 </body>
 </html>