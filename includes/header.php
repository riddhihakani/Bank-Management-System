<?php 
    ob_start();
    session_start();
    
?>

<?php 

if(isset($_SESSION['user_is_logged_in'])){
  
  $fullname  = $_SESSION['user_data']['fullname'];
  $image     = $_SESSION['user_data']['image']; 

    
}else{
    
    //header("Location: logout.php");
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
    <title>Greater Bank - Online Banking Made Easy</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="#">Greater Bank</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <form class="form-inline mr-5">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <li class="nav-item active mr-3">
              <a class="nav-link" href="#">Personal<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link" href="#">NRI</a>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link" href="#">Business</a>
            </li>
            <?php if(isset($_SESSION['user_is_logged_in'])){?>
              <li class="nav-item dropdown" id="dropdown">
                <a class="nav-link dropdown-toggle" id="dropbtn" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <?php echo $fullname ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="dropdown-content">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </li>
            <?php }else{?>
              <li class="nav-item mr-3">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            
            
            <?php }?>
            
          </ul>
        </div>
      </nav>
      <div class="head fixed-top">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pay</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Save</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Invest</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Insure</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Borrow</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Shop</a>
          </li>
        </ul>
      </div>