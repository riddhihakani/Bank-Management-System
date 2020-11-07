<?php 
    include('includes/header.php');
    include('includes/function.php'); 
?>
<?php
require('includes/pdocon.php');

//instatiating our database objects
$db = new Pdocon;

if(isset($_POST['submit_register'])){

    $raw_fname          =   cleandata($_POST['fname']);
    $raw_lname          =   cleandata($_POST['lname']);
    $raw_mname          =   cleandata($_POST['mname']);
    $raw_gender         =   cleandata($_POST['gender']);
    $raw_email          =   cleandata($_POST['email']);
    $raw_salary         =   cleandata($_POST['salary']);
    $raw_post           =   cleandata($_POST['post']);
    $raw_password       =   cleandata($_POST['password']);
    $raw_branch         =   cleandata($_POST['branch']);
    $raw_dept           =   cleandata($_POST['department']);
    $raw_address        =   cleandata($_POST['address']);
    $raw_phone          =   cleandata($_POST['phone']);
    $raw_id             =   cleandata($_POST['id']);
    
    $c_fname             =   sanitize($raw_fname);
    $c_lname             =   sanitize($raw_lname);
    $c_dept              =   sanitize($raw_dept);
    $c_mname             =   sanitize($raw_mname);
    $c_gender            =   sanitize($raw_gender);
    $c_email             =   valemail($raw_email);
    $c_salary            =   sanitize($raw_salary);
    $c_post              =   sanitize($raw_post);
    $c_password          =   sanitize($raw_password);
    $c_branch            =   sanitize($raw_branch);
    $c_address           =   sanitize($raw_address);
    $c_phone             =   sanitize($raw_phone);
    $c_id                = sanitize($raw_id);
    
    $hashed_Pass        =   hashpassword($c_password);
    
    
    
    //Collect Image
    $c_img              =   $_FILES['image']['name'];
    $c_img_tmp          =   $_FILES['image']['tmp_name'];
    
    //move image to permanent location
    move_uploaded_file($c_img_tmp, "uploaded_image/$c_img");
    
    
    $db->query("SELECT * FROM employee WHERE email = :email");
    
    $db->bindvalue(':email', $c_email, PDO::PARAM_STR);
    
    $row = $db->fetchSingle();
    
    
    if($row){
        
        echo '<div class="alert alert-danger text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Sorry!</strong> Employee already Exists. Register or Try Again
            </div>';
        
    }else{
        
        $db->query("INSERT INTO employee(emp_id, fname, mname, lname, email, post, salary, password, gender, image, branch_no, phone, dept, address) VALUES(:id, :fname, :mname, :lname, :email, :post, :salary, :password, :gender, :image, :branch, :phone, :dept, :address) ");
        
        $db->bindvalue(':id', $c_id, PDO::PARAM_INT);
        $db->bindvalue(':fname', $c_fname, PDO::PARAM_STR);
        $db->bindvalue(':lname', $c_lname, PDO::PARAM_STR);
        $db->bindvalue(':mname', $c_mname, PDO::PARAM_STR);
        $db->bindvalue(':email', $c_email, PDO::PARAM_STR);
        $db->bindvalue(':post', $c_post, PDO::PARAM_STR);
        $db->bindvalue(':phone', $c_phone, PDO::PARAM_STR);
        $db->bindvalue(':salary', $c_salary, PDO::PARAM_STR);
        $db->bindvalue(':address', $c_address, PDO::PARAM_STR);
        $db->bindvalue(':password', $hashed_Pass, PDO::PARAM_STR);
        $db->bindvalue(':gender', $c_gender, PDO::PARAM_STR);
        $db->bindvalue(':image', $c_img, PDO::PARAM_STR);
        $db->bindvalue(':branch', $c_branch, PDO::PARAM_INT);
        $db->bindvalue(':dept', $c_dept, PDO::PARAM_STR);
        
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
    <div id="main" class="row justify-content-center mt-3" style="border: 2px solid black;">
        <h3>Add an Employee</h3>
    </div>
    <div class="row justify-content-center mt-3" style="border: 2px solid black;">
    <form method="post" class="mt-3 mb-2" action="add_employee.php" enctype="multipart/form-data">
        <div class="form-group">
            <input type="number" class="form-control" id="empid" name="id" placeholder="Employee Id">
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
        <div class="form-group">
                <select id="dept" name="department" class="form-control">
                    <option value="" selected>Choose department</option>
                    <option value="Accounts">Accounts</option>
                    <option value="Insurance">Insurance</option>
                    <option value="Loan">Loan</option>
                </select>
            </div>
        <div class="form-row">
            <div class="form-group col-md-4">           
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number">
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
                <select id="branch" name="branch" class="form-control">
                    <option selected>Choose branch</option>
                    <?php 
                        $db->query('SELECT * FROM branch');
                        $results = $db->fetchMultiple();
                    ?>
                    <?php foreach($results as $result): ?>
                    <option value="<?php echo $result['Branch_id'] ?>"><?php echo $result['Address']?></option>
                    <?php endforeach ; ?>
                </select>
            </div>
            
        </div>
        <div class="form-row">
            
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="post" name="post" placeholder="Employee Post">
            </div>
            <div class="form-group col-md-4">
            <input type="text" class="form-control" id="salary" name="salary" placeholder="Employee Salary">
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
        <button type="submit" class="btn btn-primary" name="submit_register">Register Employee</button>
        </form>
    </div>
</div>