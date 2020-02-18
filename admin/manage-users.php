
<?php

require_once "non_connect_admin.php";


include'dbconnection.php';
// checking session is valid for not 
/*if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } */
 

// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
//mysqli_query($con,"delete from place where id_fk='$adminid'");

if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">


  </head>

   
  <body style="background-color: grey ; color: white;">

  <section id="container" >
      <header class="header black-bg ">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Deconecter</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/wilaya.jpg" class="img-circle" width="80"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Changer le mot de pass</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Gérer les Responsables</span>
                      </a>
                   
                  </li>
                    <li class="sub-menu">
                      <a href="Ajoutez-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Ajouter Responsables </span>
                      </a>
                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Gérer les Responsables</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                     <h4><i class="fa fa-angle-right"></i> Info sur Responsable</h4>
                            <hr>
                            <form action="manage-users.php" method="post">
                            <input type="text" name="search"  style="display: inline-block; ">
                          <button class="fa fa-search btn btn-primary"> <input type="submit" name="submit"  value="Chercher"></button> 
                          </form>
                      <div class="content-panel my-custom-scrollbar table-wrapper-scroll-y 

 ">
                          <table class="table   table-dark" style="background-color:black;">
	                  	  	 
                              <thead style="background-color:#43494E;">
                              <tr>
                                  <th>Id.</th>
                                  <th class="hidden-phone">Username</th>
                                  <th> nom</th>
                                  <th> prenom</th>
                                  <th> userpass</th>
                                  <th>place</th>
                                  <th>region</th>
                                   <th>action</th>

                              </tr>
                              </thead>
                              <tbody  >
                              <?php
                               if(!isset($_POST['submit']))
                               $ret=mysqli_query($con,"select * from users");
                             else{
                              $sep=$_POST['search'];
                               $ret=mysqli_query($con,"select * from users where id='$sep'");
                               if(mysqli_num_rows($ret)==0)
                               {
                                 $ret=mysqli_query($con,"select * from users");
                               }
                             }
						
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr style="color: white;">
                              <td><?php echo $row['id'];?></td>
                                  <td ><?php echo $row['Username'];?></td>
                                   <td ><?php echo $row['nom'];?></td>
                                    <td ><?php echo $row['prenom'];?></td>
                                  <td><?php echo $row['Userpass'];?></td>
                                  <td><?php echo $row['Place'];?></td>
                                 <td><?php echo $row['Region'];?></td>
                                 
                                  <td> 
                                     <a href="update-profile.php?uid=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     <a href="manage-users.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                      <a href="show_places.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-bars "></i></button></a>
                                  </td>
                              </tr>
                              <?php }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
