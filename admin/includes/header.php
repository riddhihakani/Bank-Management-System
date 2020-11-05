<?php 
//Open ob_start and session_start functions
    ob_start();
    session_start();
    if(isset($_SESSION['user_is_logged_in'])){
    
    
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
    <title>Greater Bank - Branch Manager Portal</title>
  </head>
  <body>
  <link rel="stylesheet" href="css/nav.css">
   <script src="js/nav.js"></script>
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="add_employee.php"><h5>Add an Employee</h5></a>
        <a href="employee_list.php"><h5>Manage employees</h5></a>
        <a href="#"><h5>Permission Requests</h5></a>
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
                <li class="nav-item dropdown">
                  <a class="nav-link" href="logout.php">
                    Logout
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">My Schedule</a>
                    <a class="dropdown-item" href="#">Attendance</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
      </div>    



