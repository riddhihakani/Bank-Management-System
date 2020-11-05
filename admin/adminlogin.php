
<?php 
    ob_start();
    session_start();
   
?>
<?php 
include('includes/function.php');
 require('includes/pdocon.php');  

 $db = new Pdocon;

 $db->query('SELECT * from branch');
 $results = $db->fetchMultiple();

 if(isset($_POST['submit_login'])){
    
  $raw_email          =   cleandata($_POST['email']);
  
  $raw_password       =   cleandata($_POST['password']);
  
  
  $c_email            =   valemail($raw_email);            
  
  $hashed_password    =   hashpassword($raw_password);
    
  
  $db->query('SELECT * FROM admin WHERE email=:email AND password=:password');
  
  $db->bindValue(':email', $c_email, PDO::PARAM_STR);
  $db->bindValue(':password',$hashed_password, PDO::PARAM_STR);
  
  $row = $db->fetchSingle();
  
  
  if($row){
      
      $d_image        =   $row['image'];
      
      $d_name         =   $row['fullname'];
      
      $s_image        =   "<img src='uploaded_image/$d_image' class='profile_image' />"; 
      
      $_SESSION['user_data'] = array(
      
      
      'fullname'      =>   $row['fullname'],
      'id'            =>   $row['admin_id'],
      'email'         =>   $row['email'],
      'image'         =>   $s_image

      );
      
      $_SESSION['user_is_logged_in']  =  true;
      
      redirect('adminhome.php');
      
      
      keepmsg('<div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Welcome </strong>' . $d_name . ' You are logged in as Admin 
              </div>');
      
      
      
      
  }else{
      
       echo '<div class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong> User does not exist. Register or Try Again
          </div>';

  }    
    
}

if(isset($_POST['submit_register'])){

  $raw_name           =   cleandata($_POST['fullname']);
  $raw_sex            =   cleandata($_POST['gender']);
  $raw_email          =   cleandata($_POST['email']);
  $raw_password       =   cleandata($_POST['password']);
 
  
  $c_name             =   sanitize($raw_name);
  $c_sex              =   sanitize($raw_sex);
  $c_email            =   valemail($raw_email);
  $c_password         =   sanitize($raw_password);
  $c_branch         =   sanitize($raw_branch);
  
  
  $hashed_Pass        =   hashpassword($c_password);
  
  
  
  //Collect Image
  $c_img              =   $_FILES['image']['name'];
  $c_img_tmp          =   $_FILES['image']['tmp_name'];
  
  //move image to permanent location
  move_uploaded_file($c_img_tmp, "uploaded_image/$c_img");
  
  
  $db->query("SELECT * FROM admin WHERE email = :email");
  
  $db->bindvalue(':email', $c_email, PDO::PARAM_STR);
  
  $row = $db->fetchSingle();
  
  
  if($row){
      
      echo '<div class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong> User already Exist. Register or Try Again
          </div>';
      
  }else{
      
      $db->query("INSERT INTO admin(admin_id, fullname, email, password, gender, image) VALUES(NULL, :fullname, :email, :password, :sex, :image) ");
      
      $db->bindvalue(':fullname', $c_name, PDO::PARAM_STR);
      $db->bindvalue(':email', $c_email, PDO::PARAM_STR);
      $db->bindvalue(':password', $hashed_Pass, PDO::PARAM_STR);
      $db->bindvalue(':sex', $c_sex, PDO::PARAM_STR);
      $db->bindvalue(':image', $c_img, PDO::PARAM_STR);
      
      
      $run = $db->execute();
      
      if($run){
          
          echo '<div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Admin registered successfully.  Please Login
                </div>';
          
      }else{
          
           echo '<div class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong> Admin user could not be registered. Please try again later
          </div>';
      }
      
      
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
    <link rel="stylesheet" href="css/adminlogin.css">
    <title>Greater Bank - Branch Manager Portal</title>
  </head>
  <body>
<div class="container">
    <h2 class="head mt-3">Greater Bank | Management Portal</h2>
    <div class="row mt-4" id="login">
            <div class="col-md-5">
            <h3 class="m-3">Login</h3>
            <form class="m-3" method="post" action="adminlogin.php">
                <div class="form-group">
                    <!-- <label for="exampleInputEmail1">Employee ID</label> -->
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" aria-describedby="emailHelp" name="email" required>
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <!-- <label for="exampleInputPassword1">Password</label> -->
                    <input type="password" class="form-control" placeholder="Enter your password" id="exampleInputPassword1" name="password" required>
                </div>
              
                <button type="submit" class="btn btn-primary" name="submit_login">Submit</button>
                
        </form>  
            </div>
            <div class="col-md-1 mt-1">
               <img src="assets/images/or.png">
            </div>
            <!--signup form-->
            <div class="col-md-6">
            <h3 class="m-3">Sign Up</h3>
            <form class="m-3" method="post" action="adminlogin.php" enctype="multipart/form-data">
                <div class="form-group">
                   <!-- <label class="control-label" for="name">Fullname</label> -->
                    <input type="name" name="fullname" class="form-control" id="name" placeholder="Enter Full Name" required>  
                </div>
                <div class="form-group">
                    <!-- <label for="exampleInputEmail1">Email ID</label> -->
                    <input type="text" name="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter your email" required>
                    <!-- <small id="emailHelp" class="form-text text-muted">We will never share your card number with anyone.</small> -->
                </div>
                <div class="form-group">
                    <!-- <label for="exampleInputPassword1">Password</label> -->
                    <input type="password" class="form-control" name="password" id="exampleInputPassword2" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                <!-- <label class="control-label" for="gender"></label> -->
             
                <select type="" name="gender" class="form-control" id="sex" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Secret">Other</option>
                </select>
              
                </div>

                <div class="form-group">
                  <label for="exampleFormControlFile1">Upload Photo</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" required>
                </div>
                <!-- <button type="button" class="btn btn-success btn-sm">Generate a system generated strong password </button> -->
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">I am not a robot.</label>
                </div>
                <button type="submit" class="btn btn-primary" name="submit_register">Submit</button>
              
        </form>  
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>




 