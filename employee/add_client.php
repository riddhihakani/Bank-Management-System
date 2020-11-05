<?php 
    include('includes/header.php');
    include('./../admin/includes/function.php'); 
?>
<?php
require('./../admin/includes/pdocon.php');

//instatiating our database objects
$db = new Pdocon;

if(isset($_POST['submit_register'])){

    $raw_fname          =   cleandata($_POST['fname']);
    $raw_lname          =   cleandata($_POST['lname']);
    $raw_mname          =   cleandata($_POST['mname']);
    $raw_gender         =   cleandata($_POST['gender']);
    $raw_email          =   cleandata($_POST['email']);
    $raw_dob            =   cleandata($_POST['dob']);
    // $raw_age            =   cleandata($_POST['age']);
    $raw_password       =   cleandata($_POST['password']);
    $raw_address        =   cleandata($_POST['address']);
    $raw_id             =   cleandata($_POST['id']);
    
    $c_fname             =   sanitize($raw_fname);
    $c_lname             =   sanitize($raw_lname);
    $c_mname             =   sanitize($raw_mname);
    $c_gender            =   sanitize($raw_gender);
    $c_email             =   valemail($raw_email);
    $c_dob               =   sanitize($raw_dob);
    // $c_age               =   sanitize($raw_age);
    $c_password          =   sanitize($raw_password);
    $c_address           =   sanitize($raw_address);
    $c_id                =   sanitize($raw_id);
    
    $hashed_Pass        =   hashpassword($c_password);
    
    
    
    //Collect Image
    $c_img              =   $_FILES['image']['name'];
    $c_img_tmp          =   $_FILES['image']['tmp_name'];
    
    //move image to permanent location
    move_uploaded_file($c_img_tmp, "uploaded_image/$c_img");
    
    
    $db->query("SELECT * FROM customer WHERE email = :email");
    
    $db->bindvalue(':email', $c_email, PDO::PARAM_STR);
    
    $row = $db->fetchSingle();
    
    
    if($row){
        
        echo '<div class="alert alert-danger text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Sorry!</strong> Employee already Exists. Register or Try Again
            </div>';
        
    }else{
        
        $db->query("INSERT INTO customer(customer_id, fname, mname, lname, email, dob, age, password, gender, address, image) VALUES(:id, :fname, :mname, :lname, :email, :dob, :age, :password, :gender, :address, :image) ");
        
        $db->bindvalue(':id', $c_id, PDO::PARAM_INT);
        $db->bindvalue(':fname', $c_fname, PDO::PARAM_STR);
        $db->bindvalue(':lname', $c_lname, PDO::PARAM_STR);
        $db->bindvalue(':mname', $c_mname, PDO::PARAM_STR);
        $db->bindvalue(':email', $c_email, PDO::PARAM_STR);
        $db->bindvalue(':dob', $c_dob, PDO::PARAM_STR);
        $db->bindvalue(':age', date('Y')-$c_dob, PDO::PARAM_INT);
        $db->bindvalue(':address', $c_address, PDO::PARAM_STR);
        $db->bindvalue(':password', $hashed_Pass, PDO::PARAM_STR);
        $db->bindvalue(':gender', $c_gender, PDO::PARAM_STR);
        $db->bindvalue(':image', $c_img, PDO::PARAM_STR);
    
        
        $run = $db->execute();
        
        if($run){
            
            echo '<div class="alert alert-success text-center">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong>Employee registered successfully.
                  </div>';
            
        }else{
            
             echo '<div class="alert alert-danger text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Sorry!</strong> Employee could not be registered. Please try again later
            </div>';
        }
        
        
    }   
    
  }

?>

<div class="container ">
    <div id="main" class="row">
        <h3>Add a Client</h3>
    </div>
    <div class="row justify-content-center">
    <form method="post" action="add_client.php" enctype="multipart/form-data">
        <div class="form-group">
            <input type="number" class="form-control" id="empid" name="id" placeholder="Client Id">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">           
                <input type="date" class="form-control" id="phone" name="dob" placeholder="Date of Birth">
            </div>
            <div class="form-group col-md-4">
                <select id="gender" name="gender" class="form-control">
                    <option value="" selected>Choose gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlFile1">Upload Photo</label>
                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" name="image" required>
        </div>  
        </div>
      
        <!-- <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Check me out
            </label>
            </div>
        </div> -->
        <button type="submit" class="btn btn-primary" name="submit_register">Register Client</button>
        </form>
    </div>
</div>