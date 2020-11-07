<?php 
/************** Fetching all data from database ******************/
include('includes/header.php');
include('includes/function.php');
//require database class files
require('includes/pdocon.php');


//instatiating our database objects
$db = new Pdocon;


$db->query('SELECT * FROM employee');

$results = $db->fetchMultiple();
 


?>


<?php showmsg(); ?>
<div class="container mt-3">
<div class="jumbotron">
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
         <!-- <th class="text-center">Delete</th> -->
       </tr>
     </thead>
     <tbody>
 <?php  foreach($results as $result) : ?>
       <tr>
         <td><?php echo $result['emp_id'] ?></td>
         <td><?php echo $result['fname'] . " " . $result['lname'] ?></td>
         <td><?php echo $result['branch_no'] ?></td>
         <td><?php echo $result['post'] ?></td>
         <td><?php echo $result['salary'] ?></td>
         <td><a href="emp_details.php?emp_id=<?php echo $result['emp_id'] ?>" class='btn btn-primary'>View Details</a></td>
         <td><a href="edit_emp.php?emp_id=<?php echo $result['emp_id'] ?>" class='btn btn-success'>Edit</a></td>
         <!-- <form  method="post" action="employee_list.php">
         <td><button class='btn btn-danger' name="delete_emp" type="submit">Delete</button></td>
        </form> -->
         
       </tr>
       
       <?php endforeach ; ?>
     </tbody>
  </table>
</div>
</div>

</div>

