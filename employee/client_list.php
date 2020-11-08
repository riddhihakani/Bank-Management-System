<?php 
/************** Fetching all data from database ******************/
include('includes/header.php');
include('./../admin/includes/function.php');
//require database class files
require('./../admin/includes/pdocon.php');


//instatiating our database objects
$db = new Pdocon;

$db->query('SELECT * FROM customer');

$results = $db->fetchMultiple();
 


?>
<?php showmsg(); ?>
<div class="container mt-3">
<div class="jumbotron shadow-lg p-3 mb-5 bg-white rounded" >
 <h2 class="text-center">Client List</h2> <hr>
 <div class="row"> 
 </div>
 <br>
  <table class="table table-bordered table-hover text-center">
     <thead >
       <tr>
         <th class="text-center">ID</th>
         <th class="text-center">Full Name</th>
         <th class="text-center">DOB</th>
         <th class="text-center">Age</th>
         <th class="text-center">Details</th>
         <th class="text-center">Edit</th>
        
       </tr>
     </thead>
     <tbody>
 <?php  foreach($results as $result) : ?>
       <tr>
         <td><?php echo $result['customer_id'] ?></td>
         <td><?php echo $result['fname'] . " " . $result['lname'] ?></td>
         <td><?php echo $result['dob'] ?></td>
         <td><?php echo $result['age'] ?></td>
         <!-- <td><?php echo $result['salary'] ?></td> -->
         <td><a href="client_details.php?customer_id=<?php echo $result['customer_id'] ?>" class='btn btn-primary'>View Details</a></td>
         <td><a href="edit_client.php?customer_id=<?php echo $result['customer_id'] ?>" class='btn btn-success'>Edit</a></td>
       
         
       </tr>
       
       <?php endforeach ; ?>
     </tbody>
  </table>
</div>
</div>

</div>