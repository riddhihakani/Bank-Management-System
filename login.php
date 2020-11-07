<?php 
    ob_start();
    session_start();
    
?>
<?php 

include('./admin/includes/function.php');
include('./admin/includes/pdocon.php');

 $db = new Pdocon;

 if(isset($_POST['submit_login'])){
    
  $raw_email          =   cleandata($_POST['email']);
  
  $raw_password       =   cleandata($_POST['password']);
  
  
  $c_email            =   valemail($raw_email);            
  
  $hashed_password    =   hashpassword($raw_password);
    
  
  $db->query('SELECT * FROM customer WHERE email=:email AND password=:password');
  
  $db->bindValue(':email', $c_email, PDO::PARAM_STR);
  $db->bindValue(':password',$hashed_password, PDO::PARAM_STR);
  
  $row = $db->fetchSingle();
  
  
  if($row){
      
      $d_image        =   $row['image'];
      
      $d_name         =   $row['fname'] . ' ' . $row['lname'];
      
      $s_image        =   "<img src='uploaded_image/$d_image' class='profile_image' />"; 
      
      $_SESSION['user_data'] = array(
      
      
      'fullname'      =>   $row['fname'] . " " . $row['lname'],
      'id'            =>   $row['customer_id'],
      'email'         =>   $row['email'],
      'image'         =>   $s_image

      );
      
      $_SESSION['user_is_logged_in']  =  true;
      
      redirect('index.php');
      
      
      keepmsg('<div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Welcome </strong>' . $d_name . ' You are logged in as Customer!
              </div>');
      
      
      
      
  }else{
      
       echo '<div class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong>Your account does not exist. Pleae contact the administration department.
          </div>';

  }    
    
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login to your greater bank account</title>
  </head>
  <body>
    <div class="row" id="loginrow">
      <div class="col-md-7">

      </div>
      <div class="col-md-4 m-4" id="form">
        <form class="m-3" action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
          </div>
          <!-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> -->
          <button type="submit" class="btn btn-primary" name="submit_login">Login</button>
          <!-- <p class="mt-4">Don't have an account? <a href="">Sign Up</a></p> -->
        </form>   
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>




