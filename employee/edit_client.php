<?php include('includes/header.php'); 
include('./../admin/includes/function.php');


/************** Fetching data from database using id ******************/

    if(isset($_GET['customer_id'])){

        $user_id   =   $_GET['customer_id'];
     }

    //require database class files
    require('./../admin/includes/pdocon.php');

    //instatiating our database objects
    $db = new Pdocon;

    $db->query("SELECT * FROM customer WHERE customer_id =:id");

    $db->bindValue(':id', $user_id, PDO::PARAM_INT);

    $row = $db->fetchSingle();
  

?>

<?php showmsg(); ?>    
<div class="jumbotron mt-3">
    <?php  if($row) : ?>
    <h2><?php echo $row['fname'] . ' ' . $row['lname'] ?></h2>     
    <hr>
    <div class="rows justify-content-left">
    <br>
    <form class="form-horizontal" role="form" method="post" action="edit_client.php?customer_id=<?php echo $user_id ?>">
    <div class="form-row"> 
              <div class="form-group col-md-6">
                  <label class="control-label" for="name">First Name:</label>
                  <input type="text" name="fname" class="form-control" id="fname" value="<?php echo $row['fname'] ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label" for="dob">Date of Birth:</label>
                  <input type="date" name="dob" class="form-control" id="dob" value="<?php echo $row['dob'] ?>" required>
                </div>
          </div>
          <div class="form-row"> 
              <div class="form-group col-md-6">
                  <label class="control-label" for="name">Middle Name:</label>
                  <input type="text" name="mname" class="form-control" id="mname" value="<?php echo $row['mname'] ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label" for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $row['email'] ?>" required>
              </div>
          </div>
          <div class="form-row"> 
              <div class="form-group col-md-6">
                  <label class="control-label" for="name">Last Name:</label>
                  <input type="text" name="lname" class="form-control" id="lname" value="<?php echo $row['lname'] ?>" required>
              </div>
              <div class="form-group ">
                <label class="control-label" for="address">Address:</label>
                <fieldset disabled> 
                  <input type="text" name="address" class="form-control disabled" id="add" value="<?php echo $row['address'] ?>" required>
                </fieldset> 
              </div>
          </div>
          <div class="form-row"> 
              <div class="form-group ">
                <label class="control-label" for="pwd">Password:</label>
                <fieldset disabled> 
                  <input type="password" name="password" class="form-control disabled" id="pwd" placeholder="Cannot Change Password" value="<?php echo $row['password'] ?>" required>
                </fieldset> 
              </div>
          </div>
          
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-primary" name="update_customer" value="Update">
              <button type="submit" class="btn btn-danger pull-right" name="delete_customer">Delete</button>
            </div>
          </div>
          
          <?php endif ;  ?>   
         
          
    </form>
          
  </div>
</div>  

<?php 
/************** Update data to database using id ******************/  
if(isset($_POST['update_customer'])){
    
  $raw_fname           =   cleandata($_POST['fname']);
  $raw_mname           =   cleandata($_POST['mname']);
  $raw_lname           =   cleandata($_POST['lname']);
  $raw_dob             =   cleandata($_POST['dob']);
  $raw_email           =   cleandata($_POST['email']);
  $raw_address         =   cleandata($_POST['address']);

  
  $c_fname             =   sanitize($raw_fname);
  $c_mname             =   sanitize($raw_mname);
  $c_lname             =   sanitize($raw_lname);
  $c_dob               =   sanitize($raw_dob);
  $c_email             =   valemail($raw_email);
  $c_address           =   valemail($raw_address);
  
  
  $db->query('UPDATE customer SET fname=:fname, lname=:lname, mname=:mname, dob=:dob, address=:address, email=:email WHERE emp_id=:id');
  
  $db->bindValue(':id',$user_id , PDO::PARAM_INT);
  $db->bindValue(':fname',$c_fname , PDO::PARAM_STR);
  $db->bindValue(':email',$c_email , PDO::PARAM_STR);
  $db->bindValue(':lname',$c_lname , PDO::PARAM_STR);
  $db->bindValue(':mname',$c_mname , PDO::PARAM_STR);
  $db->bindValue(':dob',$c_dob , PDO::PARAM_STR);
  $db->bindValue(':address',$c_address , PDO::PARAM_STR);
  // $db->bindValue(':amount',$c_amount , PDO::PARAM_INT);
  
  
  $run_update = $db->execute();
  
  if($run_update){
      
      redirect('client_list.php');
      
      keepmsg('<div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Employee updated successfully.
              </div>');
      
      
  }else{
      
      redirect('client_list.php');
      
      keepmsg('<div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Employee Could not be updated.
              </div>');
      
  }
  
}


/************** Delete data from database using id ******************/ 

if(isset($_POST['delete_customer'])){
  
 
  
  keepmsg('<div class="alert alert-danger text-center">
            
            <strong>Confirm!</strong> Do you want to delete your account <br>
            <a href="#" class="btn btn-default" data-dismiss="alert" aria-label="close">No, Thanks</a><br>
            <form method="post" action="edit_client.php">
            <input type="hidden" value="' . $user_id .'" name="id"><br>
            <input type="submit" name="delete_user" value="Yes, Delete" class="btn btn-danger">
            </form>
          </div>');
  
}        




//If the Yes Delete (confim delete) button is click from the closable div proceed to delete


 if(isset($_POST['delete_user'])){
     
  $id = $_POST['id'];
         
  $db->query('DELETE FROM customer WHERE customer_id=:id');
     
  $db->bindValue(':id', $id, PDO::PARAM_INT);
     
  $run = $db->execute();
     
  if($run){
      
      redirect('client_list.php');
      
      keepmsg('<div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>User successfully deleted.</strong> 
              </div>');
      
  }else{
      
       keepmsg('<div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sorry </strong>User with ID ' . $id . ' Could not be deleted 
              </div>');
  }     
     
 }
?>


