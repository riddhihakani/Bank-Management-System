<?php include('includes/header.php'); ?>

<?php

include('./../admin/includes/pdocon.php');
include('./../admin/includes/function.php');

$db = new Pdocon;
$email = $_SESSION['user_data']['email'];
//echo $email;
// $branchid->query('SELECT branch_no FROM employee WHERE email=:email');
// $branchid->bindvalue(':email', $email, PDO::PARAM_STR);
// $branchid = $branchid->fetchSingle();
// echo $branchid;
// $dept->query('SELECT dept,emp_id FROM employee WHERE email=:email');
// $listofcust->query('SELECT fname,lname FROM customer WHERE branch_no=:branchid ');

if(isset($_POST['create_acc'])){

    $raw_accno          =   cleandata($_POST['accno']);
    $raw_acct           =   cleandata($_POST['acctype']);
    $raw_accb           =   cleandata($_POST['accbalance']);
    $raw_empid          =   cleandata($_POST['empid']);
    $raw_custid         =   cleandata($_POST['custid']);
    
    
    $c_accno             =   sanitize($raw_accno);
    $c_acct              =   sanitize($raw_acct);
    $c_accb              =   valint($raw_accb);
    $c_empid             =   valint($raw_empid);
    $c_custid            =   valint($raw_custid);

    
    
   

    
    
    $db->query("SELECT * FROM accounts WHERE acc_type=:acctype");
    
    $db->bindvalue(':acctype', $c_acct, PDO::PARAM_STR);
    
    $row = $db->fetchSingle();
    
    
    if($row){
        
        echo '<div class="alert alert-danger text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Sorry!</strong> User already Exist. Register or Try Again
            </div>';
        
    }else{
        
        $db->query("INSERT INTO accounts(acc_no, acc_type, emp_id, cust_id, balance) VALUES(:accno, :acctype, :balance, :empid, :custid) ");
        
        $db->bindvalue(':accno', $c_accno, PDO::PARAM_STR);
        $db->bindvalue(':acctype', $c_acct, PDO::PARAM_STR);
        $db->bindvalue(':balance', $c_accb, PDO::PARAM_INT);
        $db->bindvalue(':empid', $c_empid, PDO::PARAM_INT);
        $db->bindvalue(':custid', $c_custid, PDO::PARAM_INT);
      
        
        $run = $db->execute();
        
        if($run){
            
            echo '<div class="alert alert-success text-center">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Account created successfully!
                  </div>';
            
        }else{
            
             echo '<div class="alert alert-danger text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Sorry!</strong> Account could not be registered. Try Again!
            </div>';
        }
        
        
    } 
    
  }
  
?>

<div class="container ">
    <div id="main" class="row">
        <h3>Create an account</h3>
    </div>
    <div class="row justify-content-center">
    <form method="post" action="create_acc.php" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" id="accno" name="accno" placeholder="Account Number">
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <input type="text" class="form-control" id="acctype" name="acctype" placeholder="Account type">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <input type="integer" class="form-control" id="accb" name="accbalance" placeholder="Account balance">
            </div>
        </div>
        <div class="form-group col-md-4">
                <select id="empid" name="empid" class="form-control">
                    <option selected>Choose your ID</option>
                    <?php 
                        $db->query('SELECT * FROM employee');
                        $results = $db->fetchMultiple();
                    ?>
                    <?php foreach($results as $result): ?>
                    <option value="<?php echo $result['emp_id'] ?>"><?php echo $result['emp_id']?></option>
                    <?php endforeach ; ?>
                </select>
        </div>
        <div class="form-group col-md-4">
                <select id="custid" name="custid" class="form-control">
                    <option selected>Choose customer ID</option>
                    <?php 
                        $db->query('SELECT * FROM customer');
                        $results = $db->fetchMultiple();
                    ?>
                    <?php foreach($results as $result): ?>
                    <option value="<?php echo $result['customer_id'] ?>"><?php echo $result['customer_id']?></option>
                    <?php endforeach ; ?>
                </select>
        </div>
      
        <button type="submit" class="btn btn-primary" name="create_acc">Register Account</button>
        </form>
    </div>
</div>   

