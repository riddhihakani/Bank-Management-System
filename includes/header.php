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
              <li class="nav-item mr-3">
               
              <a class="nav-link" href="#"><?php echo $fullname ?>
                </a>
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
            <a class="nav-link active mt-1 " href="#"><h6>Home</h6></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mt-1" href="#"><h6>Pay</h6></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mt-1" href="#"><h6>Save</h6></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mt-1" href="#"><h6>Invest</h6></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mt-1" href="#"><h6>Insure</h6></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mt-1" href="#"><h6>Borrow</h6></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mt-1" href="#"><h6>Shop</h6></a>
          </li>
        </ul>
      </div>