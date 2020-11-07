<?php 
    ob_start();
    session_start();
if(isset($_SESSION['user_is_logged_in'])){
  
  
  $empid  = $_SESSION['user_data']['email'];
    
}else{
    
    header("Location: logout.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/320685ab56.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/header.css">
    <script src="js/header.js"></script>
    <title>Welcome to Greater Bank employee Portal</title>
  </head>
  <body>
   
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="add_client.php"><h5>Add a client</h5></a>
        <a href="client_list.php"><h5>Manage clients</h5></a>
        <a href="create_account.php"><h5>Create Account</h5></a>
        <a href="#"><h5>Grieviences</h5></a>
      </div>
      
      <!-- Use any element to open the sidenav -->
      
      <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
      <div id="main">
        <nav class="navbar navbar-expand-lg">
            <span onclick="openNav()" id="menu"><i class="fas fa-ellipsis-v fa-2x"></i></span>
            <a class="navbar-brand ml-3" href="#">Greater Bank | Employee Portal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                  <a class="nav-link " href="employeehome.php">
                    My Profile
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link " href="logout.php">
                    Logout
                  </a>
                </li>
              </ul>
            </div>
          </nav>
      