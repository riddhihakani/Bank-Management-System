<?php

 
include('includes/header.php');  
//Include functions
include('includes/function.php');
//echo $_SESSION['user_data']['email'];
/************** Fetching data from database using id ******************/

//require database class files
require('includes/pdocon.php');


//instatiating our database objects
$db = new Pdocon;

//Create a query to select all users to display in the table
   
$db->query("SELECT * FROM admin WHERE email=:email");

$email  =   $_SESSION['user_data']['email'];

$db->bindValue(':email', $email, PDO::PARAM_STR);
    
//Fetch all data and keep in a result set
$row = $db->fetchSingle();

?>
<link rel="stylesheet" href="css/adminhome.css"> 
<?php showmsg(); ?>
<div class="container mt-4">
<div class="row justify-content-center mt-5" >

  <div class="col-md-6" >
  <?php  if($row) { ?>
          <br>
          <form class="form-horizontal" role="form" method="post" action="">
          <div class="form-group">
            <label class="control-label " for="name">Fullname:</label>
            <input type="name" name="name" class="form-control" id="name" value="<?php echo $row['fullname'] ?>" required>   
          </div>
          <div class="form-group">
            <label class="control-label " for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo $row['email'] ?>" required>
          </div>
          <div class="form-group ">
            <label class="control-label" for="pwd">Password:</label>
             <fieldset disabled> 
              <input type="password" name="password" class="form-control disabled" id="pwd" value="<?php echo $row['password'] ?>" required>
             </fieldset> 
          </div>
         <br>
          <div class="form-row"> 
            <div class="col-sm-offset-2 col-sm-10">
                <a class="btn btn-primary" href="edit_admin.php?admin_id=<?php echo $row['admin_id'] ?>">Edit</a>
                <button type="submit" class="btn btn-danger pull-right" name="delete_form">Delete</button>
            </div>
          </div>
        </form>
      </div>
       <div class="col-md-5" style="border-left: 2px solid gray;">
          <div class="card ml-3" style="width: 25rem;">
          <?php  $image = $row['image']; ?>
            <?php echo  '<img src="uploaded_image/' . $image . '" class="card-img-top" alt="..." style="padding:6px; height:15rem;">'; ?>
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['fullname'] ?></h5>
                <p class="card-text">Admin ID: <?php echo $row['admin_id'] ?></p>
                <?php 
                
                    $bid = $row['br_no'];
                    $db->query('SELECT address FROM branch WHERE branch_id=:bid');
                    $db->bindvalue(':bid',$bid,PDO::PARAM_INT);
                    $result = $db->fetchSingle();
                ?>
                 <p class="card-text">Branch: <?php echo $result['address'] ?></p>
              </div>
          </div>
       </div>
       <?php } ?>
       
  </div>  
</div>



<?php 
  
/************** Deleting data from database when delete button is clicked ******************/  
      
      
if(isset($_POST['delete_form'])){
    
    $admin_id = $_SESSION['user_data']['id'];
    
    keepmsg('<div class="alert alert-danger text-center">
              
              <strong>Confirm!</strong> Do you want to delete your account <br>
              <a href="#" class="btn btn-default" data-dismiss="alert" aria-label="close">No, Thanks</a><br>
              <form method="post" action="adminhome.php">
              <input type="hidden" value="' . $admin_id .'" name="id"><br>
              <input type="submit" name="delete_admin" value="Yes, Delete" class="btn btn-danger">
              </form>
            </div>');
    
}        




//If the Yes Delete (confim delete) button is click from the closable div proceed to delete


   if(isset($_POST['delete_admin'])){
       
    $id = $_POST['id'];
           
    $db->query('DELETE FROM admin WHERE admin_id=:id');
       
    $db->bindValue(':id', $id, PDO::PARAM_INT);
       
    $run = $db->execute();
       
    if($run){
        
        redirect('logout.php');
        
    }else{
        
         keepmsg('<div class="alert alert-danger text-center">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Sorry </strong>User with ID ' . $id . ' Could not be deleted 
                </div>');
    }
       
       
   }     
?>
  

<?php include('includes/footer.php'); ?>