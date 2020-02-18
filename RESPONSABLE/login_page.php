<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta charset="utf-8">
 
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style_login.css">
	<title>login page</title>
</head>
<body style="background-color: #595959;color: white;">
  <div id="content">
<div class="half"></div>
<!--<div class="foot">
  <p>cette application est dediée aux responsables d'agadir afin d'ajouter les places publiques et privées pour but d'organiser et de facilité la gestion de ces places.</p>
  
</div>-->

 <center>
	<div class="row justify-content" id="frm">
	<form method="POST" action="login.php" >
    <div><img src="img/wilaya.jpg" style="width: 90%; height: 70%;"> </div>
  <div class="form-group">
    <label >Username</label>
    <input name="username" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label >Password</label>
    <input name="password" type="password" class="form-control">
  </div>
  
  <button type="submit" class="btn btn-primary" name="login">Login</button>

</form>

</div>
</center>

</div>
<script src="js/main.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.js"></script>
</body>
</html>