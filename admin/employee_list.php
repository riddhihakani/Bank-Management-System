<?php 
/************** Fetching all data from database ******************/
include('adminhome.php');
include('includes/function.php');
//require database class files
require('includes/pdocon.php');


//instatiating our database objects
$db = new Pdocon;


$db->query('SELECT * FROM employee');

$results = $db->fetchMultiple();
 


?>

<div class="container">

<?php showmsg(); ?>

<div class="jumbotron">

<small class="pull-right"><a href="add_employee.php"> Add Customer </a> </small>

<?php //echo $_SESSION['user_data']['fullname'] ?> | Admin
 
 <h2 class="text-center">Employee List</h2> <hr>
 <br>
  <table class="table table-bordered table-hover text-center">
     <thead >
       <tr>
         <th class="text-center">ID</th>
         <th class="text-center">Full Name</th>
         <th class="text-center">Branch</th>
         <th class="text-center">Post</th>
         <th class="text-center">Salary</th>
         <th class="text-center">Details</th>
         <th class="text-center">Edit</th>
         <th class="text-center">Delete</th>
       </tr>
     </thead>
     <tbody>
 <?php  foreach($results as $result) : ?>
       <tr>
         <td><?php echo $result['id'] ?></td>
         <td><?php echo $result['full_name'] ?></td>
         <td><?php echo $result['spending'] ?></td>
         <td><?php echo $result['email'] ?></td>
         <td><?php echo $result['password'] ?></td>
         <td><a href="reports.php?cus_id=<?php echo $result['id'] ?>" class='btn btn-primary'>View Details</a></td>
         <td><a href="edit.php?cus_id=<?php echo $result['id'] ?>" class='btn btn-danger'>Edit</a></td>
         <td><a href="edit.php?cus_id=<?php echo $result['id'] ?>" class='btn btn-danger'>Delete</a></td>
         
       </tr>
       
       <?php endforeach ; ?>
     </tbody>
  </table>
</div>
</div>

</div>


