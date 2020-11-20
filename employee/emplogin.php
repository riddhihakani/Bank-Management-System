<?php 
    ob_start();
    session_start();
    
?>
<?php 

include('./../admin/includes/function.php');
include('./../admin/includes/pdocon.php');

 $db = new Pdocon;

 if(isset($_POST['submit_login'])){
    
  $raw_email          =   cleandata($_POST['email']);
  
  $raw_password       =   cleandata($_POST['password']);
  
  
  $c_email            =   valemail($raw_email);            
  
  $hashed_password    =   hashpassword($raw_password);
    
  
  $db->query('SELECT * FROM employee WHERE email=:email AND password=:password');
  
  $db->bindValue(':email', $c_email, PDO::PARAM_STR);
  $db->bindValue(':password',$hashed_password, PDO::PARAM_STR);
  
  $row = $db->fetchSingle();
  
  
  if($row){
      
      $d_image        =   $row['image'];
      
      $d_name         =   $row['fname'] . ' ' . $row['lname'];
      
      $s_image        =   "<img src='uploaded_image/$d_image' class='profile_image' />"; 
      
      $_SESSION['user_data'] = array(
      
      
      'fullname'      =>   $row['fname'] . " " . $row['lname'],
      'id'            =>   $row['emp_id'],
      'email'         =>   $row['email'],
      'post'          =>   $row['post'],
      'image'         =>   $s_image
      //'branch_no'     =>   $row['branch_no']

      );
      
      $_SESSION['user_is_logged_in']  =  true;
      
      redirect('employeehome.php');
      
      
      keepmsg('<div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Welcome </strong>' . $d_name . ' You are logged in as Employee
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
    <link rel="stylesheet" href="css/emplogin.css">
    <title>Greater Bank - Employee Portal</title>
  </head>
  <body>
<div class="container">
    <h2 class="head mt-3">Greater Bank | Employee Portal</h2>
    <div class="row mt-4" id="login">
            <div class="col-md-5">
            <h3 class="m-3">Login</h3>
            <form class="m-3" method="post" action="emplogin.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <!-- <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <button type="submit" class="btn btn-primary" name="submit_login">Submit</button>
                
        </form>  
            </div>
            <div class="col-md-7">
              <div class="row justify-content-center mt-3">
                 <h3>We are because of our employees!</h3>
              </div>
              <div class="row m-3">
                <img src="assets/images/employee.jpg" style="width:600px">
              </div>
            </div>
           
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