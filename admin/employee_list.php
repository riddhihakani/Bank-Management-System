<?php 
/************** Fetching all data from database ******************/
include('includes/header.php');
include('includes/function.php');
//require database class files
require('includes/pdocon.php');


//instatiating our database objects
$db = new Pdocon;
$bid = $_SESSION['user_data']['branch_no'];

if(isset($_POST['dept_search'])){

  $raw_dept = cleandata($_POST['dept']);
  $c_dept = sanitize($raw_dept);
  $db->query('SELECT * FROM employee WHERE branch_no=:bno AND dept=:dept');
  $db->bindvalue(':bno',$bid,PDO::PARAM_INT);
  $db->bindvalue(':dept',$c_dept,PDO::PARAM_STR);
  $results = $db->fetchMultiple();

}else{
$db->query('SELECT * FROM employee WHERE branch_no=:bno');
$db->bindvalue(':bno',$bid,PDO::PARAM_STR);

$results = $db->fetchMultiple();
}


?>


<?php showmsg(); ?>
<div class="container mt-3">
<div class="jumbotron shadow-lg p-3 mb-5 bg-white rounded">
<div class="row">
  <div class="col-md-9">
    <h2>Employee list</h2>
  </div>
  <div class="col-md-3">
    <form class="form-inline" method="post" action="employee_list.php">
    <select class="form-control form-control-sm" name="dept">
        <option>Select a department</option>
        <option value="Loan">Loan</option>
        <option value="Accounts">Accounts</option>
        <option value="Insurance">Insurance</option>
    </select>
      <button class="btn btn-sm btn-outline-primary my-2 my-sm-0" type="submit" name="dept_search">Search</button>
    </form>
 
    </div>
</div>
<hr>

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

